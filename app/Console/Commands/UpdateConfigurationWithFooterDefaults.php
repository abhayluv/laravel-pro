<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Configuration;

class UpdateConfigurationWithFooterDefaults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'configurations:update-footer-defaults';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update existing configurations with footer default values';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Updating configurations with footer defaults...');

        $config = Configuration::first();
        
        if ($config) {
            $config->update([
                'footer_text' => '© 2024 Your Company. All rights reserved.',
                'footer_font_size' => '14px',
                'footer_font_color' => '#6b7280',
                'footer_font_hover_color' => '#374151',
                'footer_font_weight' => 'normal',
                'footer_line_height' => '1.5',
                'footer_background_color' => '#f9fafb',
                'footer_border' => '0px',
                'footer_border_radius' => '0px',
                'footer_box_shadow' => 'none',
                'footer_padding' => '20px 0px 20px 0px',
                'footer_margin' => '0px 0px 0px 0px'
            ]);
            
            $this->info('Configuration updated successfully!');
        } else {
            $this->info('No configuration found, creating new one...');
            Configuration::createDefault();
            $this->info('Default configuration created!');
        }
    }
}
