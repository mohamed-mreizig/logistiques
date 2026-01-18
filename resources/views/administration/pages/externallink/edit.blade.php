@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier le lien externe</h1>
    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="p-6">
            <form action="{{ route('externallinks.update', $externallink->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                    <input type="text" id="title" name="title" value="{{ $externallink->title }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                    <input type="url" id="url" name="url" value="{{ $externallink->url }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="ispublished" name="ispublished" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           {{ $externallink->ispublished ? 'checked' : '' }}>
                    <label for="ispublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex space-x-3 pt-4">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Mettre à jour
                    </button>
                    <a href="{{ route('externallinks.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition-colors">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection