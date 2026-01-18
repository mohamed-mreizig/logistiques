@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">élément d'axe stratégique</h2>
            <a href="{{ url('servicead/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Ajouter des éléments 
            </a>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($services as $service)
                <div class="bg-gray-50 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-4">
                        <img src="{{ $service->imgUrl ? s3Asset($service->imgUrl) : '#' }}" 
                             alt="{{ $service->titleFr ?? 'N/A' }}" 
                             class="w-full h-48 object-cover rounded-t-lg {{ !$service->imgUrl ? 'bg-gray-200' : '' }}"
                             onerror="this.src='#'; this.classList.add('bg-gray-200')">
                        <div class="p-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">{{ $service->titleFr ?? 'N/D' }}</h3>
                            <p class="text-gray-600 line-clamp-3 mb-4">
                                {!! $service->descriptionFr ? preg_replace('/<div[^>]*>|<\/div>/', '', Str::limit($service->descriptionFr, 120)) : 'N/D' !!}
                            </p>
                            <div class="flex space-x-2">
                                <a href="{{ url('servicead/' . $service->id)}}" 
                                   class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                                    Voir
                                </a>
                                <a href="{{ url('servicead/'.$service->id.'/delete') }}" 
                                   class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors"
                                   onclick="return confirm('Êtes-vous sûr ?')">
                                    Supprimer
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500">Aucun service disponible</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
