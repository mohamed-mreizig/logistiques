@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-xl font-semibold text-gray-800">Ressource</h2>
            @can('create user')
                <a href="{{ url('ressource/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Ajouter une ressource
                </a>
            @endcan
        </div>

        <div class="p-6">
            @if($documents->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($documents as $document)
                <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">{{ $document->titleFr }}</h3>
                        <div class="text-sm text-gray-500 mb-3 truncate">
                            <a href="{{ $document->linkurl }}" target="_blank" class="text-blue-600 hover:underline">
                                {{ $document->linkurl }}
                            </a>
                        </div>
                        <div class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {!! $document->descriptionFr !!}
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ url('ressource/' . $document->id)}}" 
                               class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors text-sm">
                                Voir
                            </a>
                            <a href="{{ url('ressource/'.$document->id.'/delete') }}" 
                               class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors text-sm"
                               onclick="return confirm('Êtes-vous sûr ?')">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <p class="text-gray-500">Aucune ressource disponible</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
