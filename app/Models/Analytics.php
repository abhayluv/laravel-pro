<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Analytics extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'page_url',
        'page_title',
        'referrer',
        'user_agent',
        'ip_address',
        'country',
        'city',
        'device_type',
        'browser',
        'os',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'utm_term',
        'utm_content',
        'time_on_page',
        'is_bounce',
        'is_new_visitor',
        'event_type',
        'event_category',
        'event_action',
        'event_label',
        'event_value',
        'visited_at'
    ];

    protected $casts = [
        'visited_at' => 'datetime',
        'is_bounce' => 'boolean',
        'is_new_visitor' => 'boolean',
        'time_on_page' => 'integer',
        'event_value' => 'integer'
    ];

    /**
     * Get analytics data for dashboard
     */
    public static function getDashboardData($period = 30)
    {
        $startDate = Carbon::now()->subDays($period);
        
        return [
            'unique_visitors' => self::getUniqueVisitors($startDate),
            'total_pageviews' => self::getTotalPageviews($startDate),
            'bounce_rate' => self::getBounceRate($startDate),
            'avg_session_duration' => self::getAvgSessionDuration($startDate),
            'visitor_trend' => self::getVisitorTrend($startDate),
            'top_channels' => self::getTopChannels($startDate),
            'top_pages' => self::getTopPages($startDate),
            'device_distribution' => self::getDeviceDistribution($startDate),
            'country_distribution' => self::getCountryDistribution($startDate),
            'recent_activity' => self::getRecentActivity($startDate)
        ];
    }

    /**
     * Get unique visitors count
     */
    public static function getUniqueVisitors($startDate)
    {
        $current = self::where('visited_at', '>=', $startDate)
            ->distinct('session_id')
            ->count('session_id');
            
        $previous = self::where('visited_at', '>=', $startDate->copy()->subDays(30))
            ->where('visited_at', '<', $startDate)
            ->distinct('session_id')
            ->count('session_id');
            
        $growth = $previous > 0 ? (($current - $previous) / $previous) * 100 : 0;
        
        return [
            'current' => number_format($current),
            'growth' => round($growth, 1),
            'trend' => $growth >= 0 ? 'up' : 'down'
        ];
    }

    /**
     * Get total pageviews
     */
    public static function getTotalPageviews($startDate)
    {
        $current = self::where('visited_at', '>=', $startDate)->count();
        $previous = self::where('visited_at', '>=', $startDate->copy()->subDays(30))
            ->where('visited_at', '<', $startDate)
            ->count();
            
        $growth = $previous > 0 ? (($current - $previous) / $previous) * 100 : 0;
        
        return [
            'current' => number_format($current),
            'growth' => round($growth, 1),
            'trend' => $growth >= 0 ? 'up' : 'down'
        ];
    }

    /**
     * Get bounce rate
     */
    public static function getBounceRate($startDate)
    {
        $total_sessions = self::where('visited_at', '>=', $startDate)
            ->distinct('session_id')
            ->count('session_id');
            
        $bounce_sessions = self::where('visited_at', '>=', $startDate)
            ->where('is_bounce', true)
            ->distinct('session_id')
            ->count('session_id');
            
        $current_rate = $total_sessions > 0 ? ($bounce_sessions / $total_sessions) * 100 : 0;
        
        // Previous period
        $prev_total = self::where('visited_at', '>=', $startDate->copy()->subDays(30))
            ->where('visited_at', '<', $startDate)
            ->distinct('session_id')
            ->count('session_id');
            
        $prev_bounce = self::where('visited_at', '>=', $startDate->copy()->subDays(30))
            ->where('visited_at', '<', $startDate)
            ->where('is_bounce', true)
            ->distinct('session_id')
            ->count('session_id');
            
        $previous_rate = $prev_total > 0 ? ($prev_bounce / $prev_total) * 100 : 0;
        $change = $previous_rate > 0 ? $current_rate - $previous_rate : 0;
        
        return [
            'current' => round($current_rate, 1) . '%',
            'change' => round($change, 2),
            'trend' => $change <= 0 ? 'up' : 'down'
        ];
    }

    /**
     * Get average session duration
     */
    public static function getAvgSessionDuration($startDate)
    {
        $avg_duration = self::where('visited_at', '>=', $startDate)
            ->whereNotNull('time_on_page')
            ->avg('time_on_page');
            
        $minutes = floor($avg_duration / 60);
        $seconds = $avg_duration % 60;
        
        $current = $minutes . 'm ' . $seconds . 's';
        
        // Previous period
        $prev_avg = self::where('visited_at', '>=', $startDate->copy()->subDays(30))
            ->where('visited_at', '<', $startDate)
            ->whereNotNull('time_on_page')
            ->avg('time_on_page');
            
        $growth = $prev_avg > 0 ? (($avg_duration - $prev_avg) / $prev_avg) * 100 : 0;
        
        return [
            'current' => $current,
            'growth' => round($growth, 1),
            'trend' => $growth >= 0 ? 'up' : 'down'
        ];
    }

    /**
     * Get visitor trend data for charts
     */
    public static function getVisitorTrend($startDate)
    {
        return self::selectRaw('DATE(visited_at) as date, COUNT(DISTINCT session_id) as visitors')
            ->where('visited_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function($item) {
                return [
                    'date' => $item->date,
                    'visitors' => $item->visitors
                ];
            });
    }

    /**
     * Get top traffic channels
     */
    public static function getTopChannels($startDate)
    {
        return self::selectRaw('utm_source, COUNT(DISTINCT session_id) as visitors')
            ->where('visited_at', '>=', $startDate)
            ->whereNotNull('utm_source')
            ->groupBy('utm_source')
            ->orderByDesc('visitors')
            ->limit(10)
            ->get()
            ->map(function($item) {
                return [
                    'source' => $item->utm_source ?: 'Direct',
                    'visitors' => $item->visitors
                ];
            });
    }

    /**
     * Get top pages
     */
    public static function getTopPages($startDate)
    {
        return self::selectRaw('page_url, COUNT(*) as pageviews')
            ->where('visited_at', '>=', $startDate)
            ->groupBy('page_url')
            ->orderByDesc('pageviews')
            ->limit(10)
            ->get()
            ->map(function($item) {
                return [
                    'page' => $item->page_url,
                    'pageviews' => $item->pageviews
                ];
            });
    }

    /**
     * Get device distribution
     */
    public static function getDeviceDistribution($startDate)
    {
        return self::selectRaw('device_type, COUNT(DISTINCT session_id) as sessions')
            ->where('visited_at', '>=', $startDate)
            ->whereNotNull('device_type')
            ->groupBy('device_type')
            ->get()
            ->map(function($item) {
                return [
                    'device' => $item->device_type ?: 'Unknown',
                    'sessions' => $item->sessions
                ];
            });
    }

    /**
     * Get country distribution
     */
    public static function getCountryDistribution($startDate)
    {
        return self::selectRaw('country, COUNT(DISTINCT session_id) as visitors')
            ->where('visited_at', '>=', $startDate)
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('visitors')
            ->limit(10)
            ->get()
            ->map(function($item) {
                return [
                    'country' => $item->country,
                    'visitors' => $item->visitors
                ];
            });
    }

    /**
     * Get recent activity
     */
    public static function getRecentActivity($startDate)
    {
        return self::with('user')
            ->where('visited_at', '>=', $startDate)
            ->orderByDesc('visited_at')
            ->limit(10)
            ->get()
            ->map(function($item) {
                return [
                    'page' => $item->page_url,
                    'user' => $item->user ? $item->user->name : 'Guest',
                    'time' => $item->visited_at->diffForHumans(),
                    'device' => $item->device_type ?: 'Unknown'
                ];
            });
    }

    /**
     * Track a pageview
     */
    public static function trackPageview($request, $pageTitle = null)
    {
        $userAgent = $request->header('User-Agent');
        $deviceType = self::detectDeviceType($userAgent);
        
        return self::create([
            'session_id' => $request->session()->getId(),
            'user_id' => auth()->id(),
            'page_url' => $request->fullUrl(),
            'page_title' => $pageTitle,
            'referrer' => $request->header('referer'),
            'user_agent' => $userAgent,
            'ip_address' => $request->ip(),
            'device_type' => $deviceType,
            'browser' => self::detectBrowser($userAgent),
            'os' => self::detectOS($userAgent),
            'utm_source' => $request->get('utm_source'),
            'utm_medium' => $request->get('utm_medium'),
            'utm_campaign' => $request->get('utm_campaign'),
            'utm_term' => $request->get('utm_term'),
            'utm_content' => $request->get('utm_content'),
            'visited_at' => now()
        ]);
    }

    /**
     * Detect device type from user agent
     */
    private static function detectDeviceType($userAgent)
    {
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($userAgent))) {
            return 'tablet';
        }
        
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($userAgent))) {
            return 'mobile';
        }
        
        return 'desktop';
    }

    /**
     * Detect browser from user agent
     */
    private static function detectBrowser($userAgent)
    {
        if (preg_match('/Chrome/i', $userAgent)) return 'Chrome';
        if (preg_match('/Firefox/i', $userAgent)) return 'Firefox';
        if (preg_match('/Safari/i', $userAgent)) return 'Safari';
        if (preg_match('/Edge/i', $userAgent)) return 'Edge';
        if (preg_match('/MSIE|Trident/i', $userAgent)) return 'Internet Explorer';
        
        return 'Unknown';
    }

    /**
     * Detect OS from user agent
     */
    private static function detectOS($userAgent)
    {
        if (preg_match('/Windows/i', $userAgent)) return 'Windows';
        if (preg_match('/Mac/i', $userAgent)) return 'macOS';
        if (preg_match('/Linux/i', $userAgent)) return 'Linux';
        if (preg_match('/Android/i', $userAgent)) return 'Android';
        if (preg_match('/iOS/i', $userAgent)) return 'iOS';
        
        return 'Unknown';
    }

    /**
     * Relationship with User model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
