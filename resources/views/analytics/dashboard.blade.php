<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Analytics Dashboard') }}
            </h2>
            <div class="flex items-center space-x-4">
                <select id="period-selector" class="border border-gray-300 rounded-md px-3 py-2 text-sm">
                    <option value="7" {{ $period == 7 ? 'selected' : '' }}>Last 7 days</option>
                    <option value="30" {{ $period == 30 ? 'selected' : '' }}>Last 30 days</option>
                    <option value="90" {{ $period == 90 ? 'selected' : '' }}>Last 90 days</option>
                </select>
                <button onclick="refreshData()" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                    Refresh
                </button>
            </div>
        </div>
    </x-slot>

    <div>
        <div class="mx-auto">
            
            <!-- Row 1: All 4 Key Metrics in Single Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                
                <!-- Unique Visitors Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-gradient-to-r from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-500">Unique Visitors</h4>
                                    <div class="flex items-center">
                                        <p class="text-2xl font-bold text-gray-900">{{ $analyticsData['unique_visitors']['current'] }}</p>
                                        <span class="ml-2 text-sm {{ $analyticsData['unique_visitors']['trend'] == 'up' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $analyticsData['unique_visitors']['growth'] >= 0 ? '+' : '' }}{{ $analyticsData['unique_visitors']['growth'] }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Pageviews Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-gradient-to-r from-green-500 to-green-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-500">Total Pageviews</h4>
                                    <div class="flex items-center">
                                        <p class="text-2xl font-bold text-gray-900">{{ $analyticsData['total_pageviews']['current'] }}</p>
                                        <span class="ml-2 text-sm {{ $analyticsData['total_pageviews']['trend'] == 'up' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $analyticsData['total_pageviews']['growth'] >= 0 ? '+' : '' }}{{ $analyticsData['total_pageviews']['growth'] }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bounce Rate Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-gradient-to-r from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-500">Bounce Rate</h4>
                                    <div class="flex items-center">
                                        <p class="text-2xl font-bold text-gray-900">{{ $analyticsData['bounce_rate']['current'] }}</p>
                                        <span class="ml-2 text-sm {{ $analyticsData['bounce_rate']['trend'] == 'up' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $analyticsData['bounce_rate']['change'] >= 0 ? '+' : '' }}{{ $analyticsData['bounce_rate']['change'] }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Visit Duration Card -->
                <div class="bg-white overflow-hidden shadow-lg rounded-xl border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-500">Visit Duration</h4>
                                    <div class="flex items-center">
                                        <p class="text-2xl font-bold text-gray-900">{{ $analyticsData['avg_session_duration']['current'] }}</p>
                                        <span class="ml-2 text-sm {{ $analyticsData['avg_session_duration']['trend'] == 'up' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $analyticsData['avg_session_duration']['growth'] >= 0 ? '+' : '' }}{{ $analyticsData['avg_session_duration']['growth'] }}%
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 2: Visitor Analytics and Sessions By Device -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                
                <!-- Visitor Analytics Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Visitor Analytics</h3>
                        <div class="h-80">
                            @if($visitorChart)
                                @if(method_exists($visitorChart, 'container'))
                                    {!! $visitorChart->container() !!}
                                @else
                                    {!! $visitorChart->container !!}
                                @endif
                            @else
                                <div class="flex items-center justify-center h-full text-gray-500">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <p class="mt-2">Chart data unavailable</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Sessions By Device -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Sessions By Device</h3>
                        <div class="h-80">
                            @if($deviceChart)
                                @if(method_exists($deviceChart, 'container'))
                                    {!! $deviceChart->container() !!}
                                @else
                                    {!! $deviceChart->container !!}
                                @endif
                            @else
                                <div class="flex items-center justify-center h-full text-gray-500">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <p class="mt-2">Chart data unavailable</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 3: Top Channels and Customers Demographic -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                
                <!-- Top Channels Chart -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Channels</h3>
                        <div class="h-80">
                            @if($channelChart)
                                @if(method_exists($channelChart, 'container'))
                                    {!! $channelChart->container() !!}
                                @else
                                    {!! $channelChart->container !!}
                                @endif
                            @else
                                <div class="flex items-center justify-center h-full text-gray-500">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <p class="mt-2">Chart data unavailable</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Customers Demographic -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Customers Demographic</h3>
                        <div class="h-80">
                            @if($countryChart)
                                @if(method_exists($countryChart, 'container'))
                                    {!! $countryChart->container() !!}
                                @else
                                    {!! $countryChart->container !!}
                                @endif
                            @else
                                <div class="flex items-center justify-center h-full text-gray-500">
                                    <div class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                        </svg>
                                        <p class="mt-2">Chart data unavailable</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row 4: Top Pages and Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                
                <!-- Top Pages -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Top Pages</h3>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View More</button>
                        </div>
                        <div class="space-y-3">
                            @foreach($analyticsData['top_pages'] as $index => $page)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center">
                                    <span class="text-sm font-medium text-gray-500 w-6">{{ $index + 1 }}</span>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">{{ Str::limit($page['page'], 30) }}</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-gray-900">{{ number_format($page['pageviews']) }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                            <button class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">View All</button>
                        </div>
                        <div class="space-y-4">
                            @foreach($analyticsData['recent_activity'] as $activity)
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0">
                                    <div class="h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                        <svg class="h-4 w-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900">{{ $activity['user'] }}</p>
                                    <p class="text-sm text-gray-500">{{ Str::limit($activity['page'], 30) }}</p>
                                    <p class="text-xs text-gray-400 mt-1">{{ $activity['time'] }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if($visitorChart)
        @if(method_exists($visitorChart, 'script'))
            {!! $visitorChart->script() !!}
        @else
            {!! $visitorChart->script !!}
        @endif
    @endif
    @if($channelChart)
        @if(method_exists($channelChart, 'script'))
            {!! $channelChart->script() !!}
        @else
            {!! $channelChart->script !!}
        @endif
    @endif
    @if($deviceChart)
        @if(method_exists($deviceChart, 'script'))
            {!! $deviceChart->script() !!}
        @else
            {!! $deviceChart->script !!}
        @endif
    @endif
    @if($countryChart)
        @if(method_exists($countryChart, 'script'))
            {!! $countryChart->script() !!}
        @else
            {!! $countryChart->script !!}
        @endif
    @endif
    <script>
        function refreshData() {
            const period = document.getElementById('period-selector').value;
            window.location.href = `{{ route('analytics.index') }}?period=${period}`;
        }

        // Auto-refresh every 5 minutes
        setInterval(function() {
            refreshData();
        }, 300000);

        // Period selector change
        document.getElementById('period-selector').addEventListener('change', function() {
            refreshData();
        });
    </script>
    @endpush
</x-app-layout>
