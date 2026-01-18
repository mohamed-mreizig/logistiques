@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if ($errors->any())
    <div class="mb-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Créer une actualité</h2>
            <a href="{{ url('actualite') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form action="{{ url('actualite') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Arabic Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre (Arabe)</label>
                        <input type="text" name="titleAR" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- French Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre (Français)</label>
                        <input type="text" name="titleFR" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <!-- Arabic Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description (Arabe)</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionAR" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]"></textarea>
                    </div>
                    @error('descriptionAR')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- French Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description (Français)</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionFR" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]"></textarea>
                    </div>
                    @error('descriptionFR')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" id="imgUrl" name="imgUrl" class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-md file:border-0
                        file:text-sm file:font-semibold
                        file:bg-blue-50 file:text-blue-700
                        hover:file:bg-blue-100">
                    @error('imgUrl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="isPublished" name="isPublished" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
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
