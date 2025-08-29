<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Analytics;
use App\Models\Configuration;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class AnalyticsController extends Controller
{
    /**
     * Display the analytics dashboard
     */
    public function index(Request $request)
    {
        $period = $request->get('period', 30);
        $analyticsData = Analytics::getDashboardData($period);
        $configuration = Configuration::getCurrent();
        
        try {
            // Create charts
            $visitorChart = $this->createVisitorChart($analyticsData['visitor_trend']);
            $channelChart = $this->createChannelChart($analyticsData['top_channels']);
            $deviceChart = $this->createDeviceChart($analyticsData['device_distribution']);
            $countryChart = $this->createCountryChart($analyticsData['country_distribution']);
        } catch (\Exception $e) {
            // Fallback if charts fail
            $visitorChart = $this->createSimpleChart($analyticsData['visitor_trend'], 'Visitor Analytics', 'line');
            $channelChart = $this->createSimpleChart($analyticsData['top_channels'], 'Top Channels', 'bar');
            $deviceChart = $this->createSimpleChart($analyticsData['device_distribution'], 'Sessions By Device', 'doughnut');
            $countryChart = $this->createSimpleChart($analyticsData['country_distribution'], 'Customers Demographic', 'bar');
            
            \Log::error('Charts creation failed: ' . $e->getMessage());
        }
        
        return view('analytics.dashboard', compact(
            'analyticsData',
            'configuration',
            'visitorChart',
            'channelChart',
            'deviceChart',
            'countryChart',
            'period'
        ));
    }

    /**
     * Track a pageview
     */
    public function track(Request $request)
    {
        $pageTitle = $request->get('title');
        Analytics::trackPageview($request, $pageTitle);
        
        return response()->json(['success' => true]);
    }

    /**
     * Get analytics data via AJAX
     */
    public function getData(Request $request)
    {
        $period = $request->get('period', 30);
        $analyticsData = Analytics::getDashboardData($period);
        
        return response()->json($analyticsData);
    }

    /**
     * Create visitor trend chart
     */
    private function createVisitorChart($data)
    {
        $labels = $data->pluck('date')->toArray();
        $values = $data->pluck('visitors')->toArray();
        
        $chart = new Chart();
        $chart->labels($labels);
        $chart->dataset('Visitors', 'line', $values)
            ->color('#3b82f6')
            ->backgroundColor('rgba(59, 130, 246, 0.1)');
        $chart->title('Visitor Analytics');
        $chart->height(300);
            
        return $chart;
    }

    /**
     * Create channel distribution chart
     */
    private function createChannelChart($data)
    {
        $labels = $data->pluck('source')->toArray();
        $values = $data->pluck('visitors')->toArray();
        
        $chart = new Chart();
        $chart->labels($labels);
        $chart->dataset('Visitors', 'bar', $values)
            ->color(['#10b981', '#3b82f6', '#f59e0b', '#ef4444', '#8b5cf6'])
            ->backgroundColor(['rgba(16, 185, 129, 0.8)', 'rgba(59, 130, 246, 0.8)', 'rgba(245, 158, 11, 0.8)', 'rgba(239, 68, 68, 0.8)', 'rgba(139, 92, 246, 0.8)']);
        $chart->title('Top Channels');
        $chart->height(300);
            
        return $chart;
    }

    /**
     * Create device distribution chart
     */
    private function createDeviceChart($data)
    {
        $labels = $data->pluck('device')->toArray();
        $values = $data->pluck('sessions')->toArray();
        
        $chart = new Chart();
        $chart->labels($labels);
        $chart->dataset('Sessions', 'doughnut', $values)
            ->color(['#3b82f6', '#10b981', '#f59e0b'])
            ->backgroundColor(['rgba(59, 130, 246, 0.8)', 'rgba(16, 185, 129, 0.8)', 'rgba(245, 158, 11, 0.8)']);
        $chart->title('Sessions By Device');
        $chart->height(300);
            
        return $chart;
    }

    /**
     * Create country distribution chart
     */
    private function createCountryChart($data)
    {
        $labels = $data->pluck('country')->toArray();
        $values = $data->pluck('visitors')->toArray();
        
        $chart = new Chart();
        $chart->labels($labels);
        $chart->dataset('Visitors', 'bar', $values)
            ->color(['#8b5cf6', '#06b6d4', '#84cc16', '#f97316', '#ec4899'])
            ->backgroundColor(['rgba(139, 92, 246, 0.8)', 'rgba(6, 182, 212, 0.8)', 'rgba(132, 204, 22, 0.8)', 'rgba(249, 115, 22, 0.8)', 'rgba(236, 72, 153, 0.8)']);
        $chart->title('Customers Demographic');
        $chart->height(300);
            
        return $chart;
    }

    /**
     * Create a simple HTML chart as fallback
     */
    private function createSimpleChart($data, $title, $type)
    {
        $labels = $data->pluck($type === 'line' ? 'date' : ($type === 'doughnut' ? 'device' : 'source'))->toArray();
        $values = $data->pluck($type === 'line' ? 'visitors' : ($type === 'doughnut' ? 'sessions' : 'visitors'))->toArray();
        
        $chart = new \stdClass();
        $chart->container = function() use ($labels, $values, $title, $type) {
            $html = '<div class="chart-container" style="position: relative; height: 300px;">';
            $html .= '<h4 class="text-center mb-4">' . $title . '</h4>';
            
            if ($type === 'line') {
                $html .= '<div class="flex items-end justify-between h-48 border-b-2 border-l-2 border-gray-300">';
                foreach ($values as $index => $value) {
                    $height = $value > 0 ? ($value / max($values)) * 100 : 0;
                    $html .= '<div class="flex flex-col items-center">';
                    $html .= '<div class="bg-blue-500 w-4 rounded-t" style="height: ' . $height . '%"></div>';
                    $html .= '<span class="text-xs mt-1">' . $labels[$index] . '</span>';
                    $html .= '</div>';
                }
                $html .= '</div>';
            } else {
                $html .= '<div class="grid grid-cols-2 gap-4">';
                foreach ($labels as $index => $label) {
                    $percentage = $values[$index] > 0 ? ($values[$index] / array_sum($values)) * 100 : 0;
                    $html .= '<div class="flex justify-between items-center p-2 bg-gray-50 rounded">';
                    $html .= '<span class="text-sm">' . $label . '</span>';
                    $html .= '<span class="text-sm font-bold">' . number_format($values[$index]) . ' (' . round($percentage, 1) . '%)</span>';
                    $html .= '</div>';
                }
                $html .= '</div>';
            }
            
            $html .= '</div>';
            return $html;
        };
        
        $chart->script = function() {
            return '<script>console.log("Simple chart loaded");</script>';
        };
        
        return $chart;
    }
}
