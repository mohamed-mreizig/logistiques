@extends('test.admintest.app')

@section('content')
   
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Views Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Views</h3>
                    <p class="text-2xl font-semibold text-gray-800 mt-1">721K</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-green-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +11.01%
                </span>
                <span class="text-gray-500 text-sm ml-2">vs last week</span>
            </div>
        </div>
    
        <!-- Visits Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Visits</h3>
                    <p class="text-2xl font-semibold text-gray-800 mt-1">367K</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-green-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    +9.15%
                </span>
                <span class="text-gray-500 text-sm ml-2">vs last week</span>
            </div>
        </div>
    
        <!-- New Users Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">New Users</h3>
                    <p class="text-2xl font-semibold text-gray-800 mt-1">1,156</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-red-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    -0.56%
                </span>
                <span class="text-gray-500 text-sm ml-2">vs last week</span>
            </div>
        </div>
    
        <!-- Active Users Card -->
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500">Active Users</h3>
                    <p class="text-2xl font-semibold text-gray-800 mt-1">239K</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
            </div>
            <div class="mt-4 flex items-center">
                <span class="text-red-600 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                    -1.48%
                </span>
                <span class="text-gray-500 text-sm ml-2">vs last week</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
        <!-- Total Users Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <h2 class="text-xl font-bold text-gray-900 mb-5 flex items-center">
                <svg class="w-5 h-5 text-blue-500 mr-2" fill="currentColor" viewBox="0 0 20 20">...</svg>
                Total Users
            </h2>
            <ul class="space-y-3">
                <li class="flex justify-between items-center py-2 border-b border-gray-100">
                    <span class="text-gray-600">Total Projects</span>
                    <span class="font-medium text-gray-900">24</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Operating Status</span>
                    <span class="text-green-600 font-medium">Active</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Current Week</span>
                    <span class="font-medium">1,234</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Previous Week</span>
                    <span class="font-medium">1,012</span>
                </li>
            </ul>
        </div>

        <!-- Trams Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <h2 class="text-xl font-bold text-gray-900 mb-5">Weekly Trams</h2>
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div class="w-3 h-3 rounded-full bg-blue-500 mr-2"></div>
                        <span class="text-gray-800 font-medium">Wed</span>
                    </div>
                    <span class="text-gray-900 font-semibold">1,234</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-gray-800">Thu</span>
                    <span class="text-gray-800">1,012</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-gray-800">Fri</span>
                    <span class="text-gray-800">1,456</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-gray-800">Sat</span>
                    <span class="text-gray-800">1,789</span>
                </div>
                <div class="flex justify-between mt-2">
                    <span class="text-gray-800">Sun</span>
                    <span class="text-gray-800">1,234</span>
                </div>
            </div>
        </div>

        <!-- Traffic by Website Card -->
        <div class="bg-white rounded-xl shadow-lg p-6 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <h2 class="text-xl font-bold text-gray-900 mb-5">Traffic Sources</h2>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-gray-600 font-medium">Google</span>
                        <span class="text-gray-900 font-semibold">24%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 24%"></div>
                    </div>
                </div>
                <li class="flex justify-between">
                    <span class="text-gray-600">Youtube</span>
                    <span class="font-medium">18%</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Instagram</span>
                    <span class="font-medium">15%</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Pinterest</span>
                    <span class="font-medium">12%</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Facebook</span>
                    <span class="font-medium">10%</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Twitter</span>
                    <span class="font-medium">8%</span>
                </li>
                <li class="flex justify-between">
                    <span class="text-gray-600">Tumblr</span>
                    <span class="font-medium">5%</span>
                </li>
            </ul>
        </div>
    </div>
@endsection