@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-xl font-semibold text-gray-800">Événements</h2>
            @can('create user')
            <a href="{{ url('event/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Ajouter un événement
            </a>
            @endcan
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($documents as $document)
                <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow">
                    <img src="{{ s3Asset($document->imageurl) }}" alt="{{ $document->titleFR }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $document->titleFR }}</h3>
                        <div class="prose max-h-24 overflow-hidden text-ellipsis text-gray-600 mb-4">
                            {!! preg_replace('/<div[^>]*>|<\/div>/', '', Str::limit($document->descriptionfr, 120)) !!}
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ url('event/' . $document->id) }}" 
                               class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                               Modifier
                            </a>
                            <a href="{{ url('event/'.$document->id.'/delete') }}" 
                               class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

             <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    @if($documents->total() > 0)
                        <p class="text-sm text-gray-700">
                            Affichage de
                            <span class="font-medium">{{ $documents->firstItem() }}</span>
                            à
                            <span class="font-medium">{{ $documents->lastItem() }}</span>
                            sur
                            <span class="font-medium">{{ $documents->total() }}</span>
                            résultats
                        </p>
                    @else
                        <p class="text-sm text-gray-700">Aucun résultat trouvé</p>
                    @endif
                </div>
                <div class="flex items-center space-x-2">
                    @if ($documents->onFirstPage())
                        <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded-md">Précédent</span>
                    @else
                        <a href="{{ $documents->previousPageUrl() }}" class="px-3 py-1 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Précédent</a>
                    @endif

                    <span class="px-3 py-1 text-gray-700">
                        Page {{ $documents->currentPage() }} sur {{ $documents->lastPage() }}
                    </span>

                    @if ($documents->hasMorePages())
                        <a href="{{ $documents->nextPageUrl() }}" class="px-3 py-1 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Suivant</a>
                    @else
                        <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded-md">Suivant</span>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
