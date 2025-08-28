<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendTestMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-test-mail {to? : Email address to send the test message to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a simple test email to verify SMTP configuration';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $toAddress = $this->argument('to') ?: config('mail.from.address') ?: env('MAIL_USERNAME');

        if (empty($toAddress)) {
            $this->error('No recipient resolved. Provide {to} or set MAIL_FROM_ADDRESS/MAIL_USERNAME.');
            return self::FAILURE;
        }

        try {
            Mail::raw('This is a test email from Laravel to verify SMTP configuration.', function ($message) use ($toAddress) {
                $message->to($toAddress)->subject('Laravel SMTP Test');
            });

            $this->info("Test email dispatched to {$toAddress}.");
            return self::SUCCESS;
        } catch (\Throwable $e) {
            $this->error('Failed to send test email: ' . $e->getMessage());
            return self::FAILURE;
        }
    }
}



