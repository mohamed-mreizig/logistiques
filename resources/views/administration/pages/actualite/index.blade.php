@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-xl font-semibold text-gray-800">Actualités</h2>
            @can('create user')
                <a href="{{ url('actualite/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Ajouter une actualité
                </a>
            @endcan
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($actualites as $actualite)
                <div class="bg-gray-50 rounded-lg overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                    <img src="{{ s3Asset($actualite->imgUrl) }}" alt="Image d'actualité" class="w-full h-48 object-fill ">
                    <div class="p-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">{{ $actualite->titleFR }}</h3>
                        <div class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {!! preg_replace('/<div[^>]*>|<\/div>/', '', $actualite->descriptionFR) !!}
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ url('actualite/' . $actualite->id . '') }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded text-sm hover:bg-blue-700 transition-colors">
                                Modifier
                            </a>
                            <form action="{{ url('actualite/' . $actualite->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded text-sm hover:bg-red-700 transition-colors"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <!-- Pagination -->
            <div class="mt-6 border-t border-gray-200 pt-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        @if($actualites->total() > 0)
                            <p class="text-sm text-gray-700">
                                Affichage de
                                <span class="font-medium">{{ $actualites->firstItem() }}</span>
                                à
                                <span class="font-medium">{{ $actualites->lastItem() }}</span>
                                sur
                                <span class="font-medium">{{ $actualites->total() }}</span>
                                résultats
                            </p>
                        @else
                            <p class="text-sm text-gray-700">Aucun résultat trouvé</p>
                        @endif
                    </div>
                    <div class="flex items-center space-x-2">
                        @if ($actualites->onFirstPage())
                            <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded-md">Précédent</span>
                        @else
                            <a href="{{ $actualites->previousPageUrl() }}" class="px-3 py-1 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Précédent</a>
                        @endif

                        <span class="px-3 py-1 text-gray-700">
                            Page {{ $actualites->currentPage() }} sur {{ $actualites->lastPage() }}
                        </span>

                        @if ($actualites->hasMorePages())
                            <a href="{{ $actualites->nextPageUrl() }}" class="px-3 py-1 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Suivant</a>
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
