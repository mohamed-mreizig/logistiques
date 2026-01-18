@extends('administration.layouts.app')

@section('title', 'Gestion du plan du site')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Gestion du plan du site</h2>
        </div>

        <div class="p-6">
            <div class="space-y-4">
                <!-- Section Services -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="w-full px-4 py-3 text-left font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none transition-colors"
                            data-accordion-target="serviceCollapse">
                        Services et Fonctions
                    </button>
                    <div id="serviceCollapse" class="px-4 py-3 border-t">
                        <a href="{{ route('servicetad.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Ajouter un type de service
                        </a>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($serviceVar as $service)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $service->type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('servicetad.edit', $service->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                                    Modifier
                                                </a>
                                                <a href="{{ url('servicetad/'.$service->id.'/delete') }}" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors" onclick="return confirm('Êtes-vous sûr ?')">
                                                    Supprimer
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Section Publications -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="w-full px-4 py-3 text-left font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none transition-colors"
                            data-accordion-target="publicationCollapse">
                        Publications et Ressources
                    </button>
                    <div id="publicationCollapse" class="hidden px-4 py-3 border-t">
                        <a href="{{ route('documentad.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Ajouter un document
                        </a>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($sharedVar as $doc)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $doc->type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('documentad.edit', $doc->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                                Modifier
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Section Ressources -->
                <div class="border rounded-lg overflow-hidden">
                    <button class="w-full px-4 py-3 text-left font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none transition-colors"
                            data-accordion-target="resourceCollapse">
                        Ressources
                    </button>
                    <div id="resourceCollapse" class="hidden px-4 py-3 border-t">
                        <a href="{{ route('ressource.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Ajouter une ressource
                        </a>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($ressource as $res)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $res->titleFr }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $res->isPublished ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $res->isPublished ? 'Publié' : 'Brouillon' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('ressource.edit', $res->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                                Modifier
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize accordions - open first one by default
    document.getElementById('serviceCollapse').classList.remove('hidden');
    
    // Add click handlers to all accordion buttons
    document.querySelectorAll('[data-accordion-target]').forEach(button => {
        button.addEventListener('click', function() {
            const targetId = this.getAttribute('data-accordion-target');
            const targetElement = document.getElementById(targetId);
            
            // Close all other accordions
            document.querySelectorAll('[id$="Collapse"]').forEach(accordion => {
                if (accordion.id !== targetId) {
                    accordion.classList.add('hidden');
                }
            });
            
            // Toggle current accordion
            targetElement.classList.toggle('hidden');
        });
    });
});
</script>
@endsection