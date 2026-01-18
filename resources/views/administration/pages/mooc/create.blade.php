@extends('administration.layouts.app')

@section('title', 'Mooc')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Ajouter un MOOC</h2>
            <a href="{{ route('mooc.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form action="{{ url('mooc') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- French Title -->
                    <div>
                        <label for="titleFr" class="block text-sm font-medium text-gray-700 mb-1">Titre (Français)</label>
                        <input type="text" name="titleFr" id="titleFr" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        @error('titleFr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Arabic Title -->
                    <div>
                        <label for="titleAr" class="block text-sm font-medium text-gray-700 mb-1">Titre (Arabe)</label>
                        <input type="text" name="titleAr" id="titleAr" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        @error('titleAr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- French Description -->
                <div>
                    <label for="descriptionFr" class="block text-sm font-medium text-gray-700 mb-1">Description (Français)</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionFr" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]"></textarea>
                    </div>
                    @error('descriptionFr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Arabic Description -->
                <div>
                    <label for="descriptionAr" class="block text-sm font-medium text-gray-700 mb-1">Description (Arabe)</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionAr" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]"></textarea>
                    </div>
                    @error('descriptionAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image Upload -->
                    <div>
                        <label for="imageUrl" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="file" name="imageUrl" id="imageUrl" class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700
                            hover:file:bg-blue-100" required>
                        @error('imageUrl')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Published Checkbox -->
                    <div class="flex items-center">
                        <input type="checkbox" name="isPublished" id="isPublished" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full md:w-auto px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection