@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Modifier la catégorie</h2>
        </div>

        <div class="p-6">
            <form action="{{ route('categoriesad.update', ['category' => $category]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                        required>
                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-3">Titres associés</h3>
                    
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($titles as $title)
                                <div class="flex items-center">
                                    <input type="checkbox" 
                                           id="title_{{ $title->id }}" 
                                           name="titles[]" 
                                           value="{{ $title->id }}" 
                                           class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                                           {{ $category->titles->contains($title->id) ? 'checked' : '' }}>
                                    <label for="title_{{ $title->id }}" class="ml-2 block text-sm text-gray-900">
                                        {{ $title->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-4 pt-4 border-t border-gray-200">
                            <label for="new_title" class="block text-sm font-medium text-gray-700 mb-1">Ajouter un nouveau titre</label>
                            <div class="flex">
                                <input type="text" name="new_title" id="new_title" 
                                    class="flex-1 rounded-l-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                    placeholder="Nom du nouveau titre">
                                <button type="submit" name="add_title" value="1" 
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-r-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Ajouter
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('categoriesad.index') }}"
                        class="mr-2 px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition-colors">
                        Annuler
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Mettre à jour la catégorie
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection