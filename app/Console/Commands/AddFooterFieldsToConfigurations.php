<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddFooterFieldsToConfigurations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'configurations:add-footer-fields';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add footer design fields to configurations table if they do not exist';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Checking and adding footer fields to configurations table...');

        $footerFields = [
            'footer_text' => 'TEXT NULL',
            'footer_font_size' => 'VARCHAR(8) DEFAULT "14px"',
            'footer_font_color' => 'VARCHAR(7) DEFAULT "#6b7280"',
            'footer_font_hover_color' => 'VARCHAR(7) DEFAULT "#374151"',
            'footer_font_weight' => 'VARCHAR(10) DEFAULT "normal"',
            'footer_line_height' => 'VARCHAR(5) DEFAULT "1.5"',
            'footer_background_color' => 'VARCHAR(7) DEFAULT "#f9fafb"',
            'footer_border' => 'TEXT DEFAULT "0px"',
            'footer_border_radius' => 'VARCHAR(8) DEFAULT "0px"',
            'footer_box_shadow' => 'TEXT DEFAULT "none"',
            'footer_padding' => 'TEXT DEFAULT "20px 0px 20px 0px"',
            'footer_margin' => 'TEXT DEFAULT "0px 0px 0px 0px"'
        ];

        $this->info('Checking for missing footer fields...');
        $missingFields = [];
        
        foreach ($footerFields as $fieldName => $fieldDefinition) {
            if (!Schema::hasColumn('configurations', $fieldName)) {
                $missingFields[] = $fieldName;
                $this->info("Missing column: {$fieldName}");
            }
        }

        if (empty($missingFields)) {
            $this->info('All footer fields already exist!');
            return;
        }

        $this->info('Adding missing footer fields...');
        
        foreach ($missingFields as $fieldName) {
            $fieldDefinition = $footerFields[$fieldName];
            $this->info("Adding column: {$fieldName}");
            DB::statement("ALTER TABLE configurations ADD COLUMN {$fieldName} {$fieldDefinition}");
        }

        $this->info('Footer fields check completed!');
    }
}
