@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-xl font-semibold text-gray-800">Partenaires</h2>
            <a href="{{ url('partners/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Ajouter un partenaire
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($partners as $partner)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <img src="{{ s3Asset($partner->imgUrl) }}" alt="Logo du partenaire" class="h-12 w-auto">
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-900">{{ $partner->titlefr }}</td>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $partner->isPublished ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $partner->isPublished ? 'Publié' : 'Non publié' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ url('partners/' . $partner->id) }}" 
                                   class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                                    Voir
                                </a>
                                <a href="{{ url('partners/'.$partner->id.'/delete') }}" 
                                   class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors"
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?')">
                                    Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($partners->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            <div class="flex justify-between items-center">
                <div class="text-sm text-gray-700">
                    Affichage de {{ $partners->firstItem() }} à {{ $partners->lastItem() }}
                    sur {{ $partners->total() }} partenaires
                </div>
                <div class="flex space-x-1">
                    @if($partners->onFirstPage())
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded cursor-not-allowed">Précédent</span>
                    @else
                        <a href="{{ $partners->previousPageUrl() }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Précédent
                        </a>
                    @endif

                    <div class="flex space-x-1">
                        @foreach($partners->getUrlRange(1, $partners->lastPage()) as $page => $url)
                            <a href="{{ $url }}" 
                               class="px-3 py-1 rounded {{ $page == $partners->currentPage() ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                                {{ $page }}
                            </a>
                        @endforeach
                    </div>

                    @if($partners->hasMorePages())
                        <a href="{{ $partners->nextPageUrl() }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Suivant
                        </a>
                    @else
                        <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded cursor-not-allowed">Suivant</span>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
