
@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-xl font-semibold text-gray-800">Documents</h2>
            @can('create user')
            <a href="{{ url('document/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Ajouter un document
            </a>
            @endcan
        </div>

        <!-- Filter Form -->
        <div class="p-4 border-b border-gray-200">
            <form action="{{ url('document') }}" method="GET" class="flex flex-wrap gap-4 items-end">
                <div class="flex-1 min-w-[200px]">
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Type de document</label>
                    <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        <option value="">Tous les types</option>
                        @foreach($doctypes as $type)
                            <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                {{ $type->type }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 transition-colors">
                    Filtrer
                </button>
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($documents as $document)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document->id }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document->titleFr }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document->doctype->type }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $document->user->name }}</td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $document->isPublished ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $document->isPublished ? 'Publié' : 'Brouillon' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ url('document/'.$document->id.'/edit') }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors text-xs sm:text-sm">
                                    Modifier
                                </a>
                                <a href="{{ route('view.pdf', ['url' => urlencode(s3Asset($document->fileUrl))]) }}" 
                                   class="px-3 py-1 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition-colors text-xs sm:text-sm"
                                   target="_blank">
                                    Voir
                                </a>
                                <a href="{{ url('document/'.$document->id.'/delete') }}" 
                                   class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors text-xs sm:text-sm"
                                   onclick="return confirm('Êtes-vous sûr ?')">
                                    Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
@endsection
