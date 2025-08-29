<?php

namespace Database\Seeders;

use App\Models\Analytics;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AnalyticsSeeder extends Seeder
{
    public function run(): void
    {
        $sources = ['google', 'facebook', 'twitter', 'linkedin', 'direct', 'email', 'organic'];
        $pages = [
            '/dashboard' => 'Dashboard',
            '/configurations' => 'Configurations',
            '/users' => 'Users',
            '/roles' => 'Roles',
            '/master-forms' => 'Master Forms',
            '/analytics' => 'Analytics',
            '/profile' => 'Profile'
        ];
        $devices = ['desktop', 'mobile', 'tablet'];
        $browsers = ['Chrome', 'Firefox', 'Safari', 'Edge'];
        $countries = ['USA', 'Canada', 'UK', 'Germany', 'France', 'Australia', 'India', 'Brazil'];
        
        // Generate data for the last 30 days
        for ($i = 30; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            
            // Generate 50-200 pageviews per day
            $pageviews = rand(50, 200);
            
            for ($j = 0; $j < $pageviews; $j++) {
                $sessionId = 'session_' . $date->format('Y-m-d') . '_' . $j;
                $page = array_rand($pages);
                $pageTitle = $pages[$page];
                
                Analytics::create([
                    'session_id' => $sessionId,
                    'user_id' => rand(1, 10), // Assuming you have users with IDs 1-10
                    'page_url' => $page,
                    'page_title' => $pageTitle,
                    'referrer' => rand(0, 1) ? 'https://google.com' : null,
                    'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                    'ip_address' => '192.168.1.' . rand(1, 255),
                    'country' => $countries[array_rand($countries)],
                    'city' => 'Sample City',
                    'device_type' => $devices[array_rand($devices)],
                    'browser' => $browsers[array_rand($browsers)],
                    'os' => 'Windows',
                    'utm_source' => $sources[array_rand($sources)],
                    'utm_medium' => rand(0, 1) ? 'cpc' : 'organic',
                    'utm_campaign' => rand(0, 1) ? 'summer2024' : null,
                    'time_on_page' => rand(30, 600), // 30 seconds to 10 minutes
                    'is_bounce' => rand(0, 1),
                    'is_new_visitor' => rand(0, 1),
                    'event_type' => 'pageview',
                    'visited_at' => $date->addSeconds(rand(0, 86400)) // Random time during the day
                ]);
            }
        }
        
        $this->command->info('Analytics sample data created successfully!');
    }
}
