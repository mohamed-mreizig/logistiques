@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-end items-start md:items-center mb-6 gap-4">
       
   
            <a href="{{route('users.index')}}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Gérer les utilisateurs
            </a>
       
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Document Card -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h6 class="font-semibold text-gray-700">Document</h6>
                    <p class="text-sm text-gray-500">Document Totale</p>
                </div>
                <h4 class="text-xl font-bold text-blue-600">{{ $doc }}</h4>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                <div class="bg-blue-600 h-1.5 rounded-full w-full"></div>
            </div>
        </div>

        <!-- Actualite Card -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h6 class="font-semibold text-gray-700">Actualite</h6>
                    <p class="text-sm text-gray-500">Actualite Totale</p>
                </div>
                <h4 class="text-xl font-bold text-green-600">{{ $act }}</h4>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                <div class="bg-green-600 h-1.5 rounded-full w-full"></div>
            </div>
        </div>

        <!-- Evenement Card -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h6 class="font-semibold text-gray-700">Evenement</h6>
                    <p class="text-sm text-gray-500">Evenement Totale</p>
                </div>
                <h4 class="text-xl font-bold text-red-600">{{ $Evn }}</h4>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                <div class="bg-red-600 h-1.5 rounded-full w-full"></div>
            </div>
        </div>

        <!-- Projets Card -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <h6 class="font-semibold text-gray-700">Projets</h6>
                    <p class="text-sm text-gray-500">Projets Totale</p>
                </div>
                <h4 class="text-xl font-bold text-gray-600">{{ $Proj }}</h4>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                <div class="bg-gray-600 h-1.5 rounded-full w-full"></div>
            </div>
        </div>
    </div>

    <!-- Recent Content Section -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Latest Actualites -->
        <div class="bg-white rounded-lg shadow overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="px-4 py-3 border-b border-gray-200">
                <h4 class="font-semibold text-gray-800">Derniers Actualites</h4>
            </div>
            <div class="p-4 space-y-4">
                @foreach ($actualites as $actualite)
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0 w-14 h-14 rounded-md overflow-hidden">
                        <img src="{{ s3Asset($actualite->imgUrl) }}" alt="{{ $actualite->titleFR }}" class="w-full h-full object-cover">
                    </div>
                    <div class="flex-1">
                        <p class="font-medium text-gray-700">{{ $actualite->titleFR }}</p>
                        <p class="text-sm text-gray-500">{{ $actualite->created_at->format('l | F d, Y') }}</p>
                    </div>
                    <a href="{{ url('actualite/' . $actualite->id)}}" class="px-3 py-1 bg-green-600 text-white rounded text-sm hover:bg-green-700 transition-colors">
                        View
                    </a>
                </div>
                @if (!$loop->last)
                <div class="border-b border-gray-200"></div>
                @endif
                @endforeach
            </div>
        </div>

        <!-- Recent Events -->
        <div class="bg-white rounded-lg shadow overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h4 class="font-semibold text-gray-800">Événement récent</h4>
                <div class="relative">
                    {{-- <button class="p-1 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                        </svg>
                    </button> --}}
                </div>
            </div>
            <div class="p-4">
                <ol class="space-y-3">
                    @foreach($events as $event)
                    <li class="relative pl-6 before:absolute before:left-0 before:top-2 before:w-2 before:h-2 before:rounded-full 
                        @if($loop->index == 0) before:bg-blue-500
                        @elseif($loop->index == 1) before:bg-purple-500
                        @elseif($loop->index == 2) before:bg-green-500
                        @elseif($loop->index == 3) before:bg-yellow-500
                        @elseif($loop->index == 4) before:bg-blue-400
                        @elseif($loop->index == 5) before:bg-red-500
                        @else before:bg-gray-400 @endif">
                        <time class="text-xs text-gray-500">{{ $event->created_at->format('M d') }}</time>
                        <p class="text-sm">
                            {{ $event->titleFR }}
                            <a href="{{ url('event/' . $event->id)}}" class="text-blue-600 hover:underline">
                                {{ Str::limit(strip_tags($event->descriptionfr), 50) }}
                            </a>
                        </p>
                    </li>
                @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
