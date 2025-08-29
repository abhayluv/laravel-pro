# 📊 Analytics Dashboard System

A comprehensive analytics dashboard system for Laravel applications, inspired by the [TailAdmin Analytics Dashboard](https://demo.tailadmin.com/analytics). This system provides real-time tracking, beautiful visualizations, and detailed insights into your application's usage.

## 🚀 Features

### 📈 **Analytics Metrics**
- **Unique Visitors** - Track distinct users with growth percentage
- **Total Pageviews** - Monitor total page visits with trend analysis
- **Bounce Rate** - Measure single-page sessions with change tracking
- **Visit Duration** - Average session time with growth indicators

### 📊 **Interactive Charts**
- **Visitor Analytics** - Line chart showing daily visitor trends
- **Top Channels** - Bar chart displaying traffic sources
- **Sessions By Device** - Doughnut chart for device distribution
- **Customers Demographic** - Bar chart for country-based visitors

### 📋 **Data Tables**
- **Top Pages** - Most visited pages with pageview counts
- **Recent Activity** - Live user activity feed
- **Traffic Sources** - Detailed channel breakdown
- **Device Analytics** - Device and browser statistics

### 🔄 **Real-time Features**
- **Auto-refresh** - Dashboard updates every 5 minutes
- **Period Selector** - 7, 30, or 90-day analysis
- **Live Tracking** - Automatic pageview tracking
- **Responsive Design** - Works on all devices

## 🛠️ Installation & Setup

### 1. **Install Dependencies**
```bash
composer require consoletvs/charts
```

### 2. **Run Migrations**
```bash
php artisan migrate
```

### 3. **Seed Sample Data**
```bash
php artisan db:seed --class=AnalyticsSeeder
```

### 4. **Access Dashboard**
Visit `/analytics` in your application

## 📁 File Structure

```
app/
├── Models/
│   └── Analytics.php              # Analytics data model
├── Http/
│   ├── Controllers/
│   │   └── AnalyticsController.php # Dashboard controller
│   └── Middleware/
│       └── TrackAnalytics.php     # Auto-tracking middleware
├── database/
│   ├── migrations/
│   │   └── create_analytics_table.php
│   └── seeders/
│       └── AnalyticsSeeder.php
└── resources/
    └── views/
        └── analytics/
            └── dashboard.blade.php # Dashboard view
```

## 🗄️ Database Schema

### Analytics Table
```sql
CREATE TABLE analytics (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    session_id VARCHAR(255) NULL,
    user_id VARCHAR(255) NULL,
    page_url VARCHAR(255) NOT NULL,
    page_title VARCHAR(255) NULL,
    referrer VARCHAR(255) NULL,
    user_agent TEXT NULL,
    ip_address VARCHAR(45) NULL,
    country VARCHAR(100) NULL,
    city VARCHAR(100) NULL,
    device_type VARCHAR(50) NULL,
    browser VARCHAR(100) NULL,
    os VARCHAR(100) NULL,
    utm_source VARCHAR(100) NULL,
    utm_medium VARCHAR(100) NULL,
    utm_campaign VARCHAR(100) NULL,
    utm_term VARCHAR(100) NULL,
    utm_content VARCHAR(100) NULL,
    time_on_page INT NULL,
    is_bounce BOOLEAN DEFAULT TRUE,
    is_new_visitor BOOLEAN DEFAULT TRUE,
    event_type VARCHAR(100) NULL,
    event_category VARCHAR(100) NULL,
    event_action VARCHAR(100) NULL,
    event_label VARCHAR(255) NULL,
    event_value INT NULL,
    visited_at TIMESTAMP NOT NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    
    INDEX idx_visited_at (visited_at),
    INDEX idx_page_url (page_url),
    INDEX idx_user_id (user_id),
    INDEX idx_session_id (session_id),
    INDEX idx_utm_source (utm_source),
    INDEX idx_device_type (device_type),
    INDEX idx_country (country)
);
```

## 🔧 Configuration

### Middleware Registration
The analytics tracking middleware is automatically registered in `bootstrap/app.php`:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        \App\Http\Middleware\ApplyConfiguration::class,
        \App\Http\Middleware\TrackAnalytics::class,  // Analytics tracking
    ]);
})
```

### Routes
```php
// Analytics routes
Route::get('/analytics', [AnalyticsController::class, 'index'])->middleware('verified')->name('analytics.index');
Route::post('/analytics/track', [AnalyticsController::class, 'track'])->name('analytics.track');
Route::get('/analytics/data', [AnalyticsController::class, 'getData'])->middleware('verified')->name('analytics.data');
```

## 📊 Dashboard Components

### 1. **Metrics Cards**
- **Unique Visitors**: Shows total unique sessions with growth percentage
- **Total Pageviews**: Displays total page visits with trend
- **Bounce Rate**: Single-page session percentage
- **Visit Duration**: Average session time in minutes and seconds

### 2. **Charts**
- **Visitor Analytics**: Line chart showing daily visitor trends
- **Top Channels**: Bar chart of traffic sources (Google, Facebook, etc.)
- **Sessions By Device**: Doughnut chart for desktop/mobile/tablet
- **Customers Demographic**: Bar chart showing visitor countries

### 3. **Data Tables**
- **Top Pages**: Most visited pages with pageview counts
- **Recent Activity**: Live feed of user actions

## 🔍 Analytics Model Methods

### Core Analytics Methods
```php
// Get comprehensive dashboard data
Analytics::getDashboardData($period = 30)

// Individual metrics
Analytics::getUniqueVisitors($startDate)
Analytics::getTotalPageviews($startDate)
Analytics::getBounceRate($startDate)
Analytics::getAvgSessionDuration($startDate)

// Chart data
Analytics::getVisitorTrend($startDate)
Analytics::getTopChannels($startDate)
Analytics::getTopPages($startDate)
Analytics::getDeviceDistribution($startDate)
Analytics::getCountryDistribution($startDate)

// Activity tracking
Analytics::trackPageview($request, $pageTitle)
```

## 🎨 Customization

### Chart Colors
Modify chart colors in `AnalyticsController.php`:

```php
private function createVisitorChart($data)
{
    $chart = Charts::create('line', 'chartjs')
        ->setColors(['#3b82f6'])  // Customize colors here
        ->setHeight(300);
    return $chart;
}
```

### Dashboard Layout
Customize the dashboard layout in `resources/views/analytics/dashboard.blade.php`:

```blade
<!-- Add custom metrics cards -->
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6">
        <h3 class="text-lg font-medium text-gray-900">Custom Metric</h3>
        <!-- Your custom content -->
    </div>
</div>
```

## 📱 Responsive Design

The dashboard is fully responsive and works on:
- **Desktop** - Full layout with all charts
- **Tablet** - Optimized grid layout
- **Mobile** - Stacked layout for better readability

## 🔄 Auto-Refresh

The dashboard automatically refreshes every 5 minutes to show the latest data:

```javascript
// Auto-refresh every 5 minutes
setInterval(function() {
    refreshData();
}, 300000);
```

## 📈 Sample Data

The `AnalyticsSeeder` creates realistic sample data including:
- **7,500+ pageviews** over 30 days
- **Multiple traffic sources** (Google, Facebook, Twitter, etc.)
- **Device diversity** (Desktop, Mobile, Tablet)
- **Geographic distribution** (8 countries)
- **Browser variety** (Chrome, Firefox, Safari, Edge)

## 🚀 Performance Optimization

### Database Indexes
The analytics table includes optimized indexes for:
- `visited_at` - Date-based queries
- `session_id` - Session tracking
- `page_url` - Page analytics
- `utm_source` - Traffic source analysis

### Caching
Consider implementing Redis caching for frequently accessed analytics data:

```php
// Example caching implementation
$analyticsData = Cache::remember('analytics_dashboard_30', 300, function () {
    return Analytics::getDashboardData(30);
});
```

## 🔒 Security Features

- **Authentication Required** - Dashboard access requires login
- **CSRF Protection** - All forms protected
- **Input Validation** - All user inputs validated
- **Error Handling** - Graceful error handling for tracking failures

## 📊 Integration with Configuration System

The analytics dashboard integrates with your existing configuration system:

```php
// In AnalyticsController
$configuration = Configuration::getCurrent();
```

This allows the dashboard to use your custom styling and branding.

## 🎯 Future Enhancements

### Planned Features
- **Real-time WebSocket updates**
- **Custom event tracking**
- **A/B testing analytics**
- **Conversion funnel analysis**
- **Export functionality (PDF, CSV)**
- **Email reports**
- **Custom date ranges**
- **Advanced filtering**

### API Endpoints
```php
// Future API endpoints
GET /api/analytics/metrics
GET /api/analytics/charts
GET /api/analytics/export
POST /api/analytics/events
```

## 🐛 Troubleshooting

### Common Issues

1. **Charts not displaying**
   - Check if Chart.js is loaded
   - Verify the charts package is installed
   - Clear application cache

2. **No data showing**
   - Run the seeder: `php artisan db:seed --class=AnalyticsSeeder`
   - Check if middleware is registered
   - Verify database connection

3. **Performance issues**
   - Add database indexes
   - Implement caching
   - Optimize queries

### Debug Commands
```bash
# Clear all caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Check analytics data
php artisan tinker
>>> App\Models\Analytics::count()
```

## 📞 Support

For issues or questions:
1. Check the Laravel logs: `storage/logs/laravel.log`
2. Verify database migrations ran successfully
3. Ensure all dependencies are installed
4. Check middleware registration

---

**🎉 Your analytics dashboard is now ready! Visit `/analytics` to see your beautiful, interactive dashboard in action!**
