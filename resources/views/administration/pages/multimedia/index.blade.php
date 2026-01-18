@extends('administration.layouts.app')

@section('title', 'Gestion des médias')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if (session('status'))
    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        {{ session('status') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h3 class="text-xl font-semibold text-gray-800">Liste des médias</h3>
            <div class="flex gap-4">
                <form method="GET" action="{{ route('multimedia.index') }}" class="flex gap-4">
                    <select name="type" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Tous les types</option>
                        <option value="image" {{ request('type') === 'image' ? 'selected' : '' }}>Image</option>
                        <option value="video" {{ request('type') === 'video' ? 'selected' : '' }}>Vidéo</option>
                    </select>
                </form>
                <a href="{{ route('multimedia.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Ajouter un média
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aperçu</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($mediaItems as $media)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $media->title }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $media->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $media->type }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($media->type === 'image')
                                <img src="{{ s3Asset($media->path) }}" class="h-12 w-auto rounded" alt="Aperçu du média">
                            @else
                                <video class="h-12 w-auto rounded" controls>
                                    <source src="{{ s3Asset($media->path) }}" type="video/mp4">
                                    Votre navigateur ne prend pas en charge la lecture vidéo.
                                </video>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('multimedia.edit', $media->id) }}" 
                                   class="p-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('multimedia.destroy', $media->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce média ?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        
           <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    @if($mediaItems->total() > 0)
                        <p class="text-sm text-gray-700">
                            Affichage de
                            <span class="font-medium">{{ $mediaItems->firstItem() }}</span>
                            à
                            <span class="font-medium">{{ $mediaItems->lastItem() }}</span>
                            sur
                            <span class="font-medium">{{ $mediaItems->total() }}</span>
                            résultats
                        </p>
                    @else
                        <p class="text-sm text-gray-700">Aucun résultat trouvé</p>
                    @endif
                </div>
                <div class="flex items-center space-x-2">
                    @if ($mediaItems->onFirstPage())
                        <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded-md">Précédent</span>
                    @else
                        <a href="{{ $mediaItems->previousPageUrl() }}" class="px-3 py-1 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Précédent</a>
                    @endif

                    <span class="px-3 py-1 text-gray-700">
                        Page {{ $mediaItems->currentPage() }} sur {{ $mediaItems->lastPage() }}
                    </span>

                    @if ($mediaItems->hasMorePages())
                        <a href="{{ $mediaItems->nextPageUrl() }}" class="px-3 py-1 text-gray-700 bg-gray-100 rounded-md hover:bg-gray-200">Suivant</a>
                    @else
                        <span class="px-3 py-1 text-gray-400 bg-gray-100 rounded-md">Suivant</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
