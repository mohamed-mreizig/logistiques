@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-800">Ajouter un lien social</h1>
            <a href="{{ route('social.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form action="{{ route('social.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom de la plateforme -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nom de la plateforme</label>
                        <input type="text" name="platform" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>

                    <!-- URL -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                        <input type="text" name="url" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required>
                    </div>
                </div>

                <!-- Téléchargement de l'icône -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Icône</label>
                    <input type="file" name="icon" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100" required>
                </div>

                <!-- Case à cocher Publié -->
                <div class="flex items-center">
                    <input type="checkbox" id="isPublished" name="isPublished" value="1"
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection