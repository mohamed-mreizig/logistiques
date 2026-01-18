
@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if (session('status'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Ressource</h2>
            <a href="{{ url('ressource') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            
            <form method="post" action="{{ url('ressource/' . $projet->id) }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Arabic Title -->
                    <div>
                        <label for="titleAr" class="block text-sm font-medium text-gray-700 mb-1">Titre en arabe</label>
                        <input type="text" id="titleAr" name="titleAr" value="{{ old('titleAr', $projet->titleAr) }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                            required autofocus autocomplete="titleAr">
                        @error('titleAr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- French Title -->
                    <div>
                        <label for="titleFr" class="block text-sm font-medium text-gray-700 mb-1">Titre en français</label>
                        <input type="text" id="titleFr" name="titleFr" value="{{ old('titleFr', $projet->titleFr) }}" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                            required autofocus autocomplete="titleFr">
                        @error('titleFr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Arabic Description -->
                <div>
                    <label for="descriptionAr" class="block text-sm font-medium text-gray-700 mb-1">Description en arabe</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionAr" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]">
                            {{ old('descriptionAr', $projet->descriptionAr) }}
                        </textarea>
                    </div>
                    @error('descriptionAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- French Description -->
                <div>
                    <label for="descriptionFr" class="block text-sm font-medium text-gray-700 mb-1">Description en français</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionFr" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]">
                            {{ old('descriptionFr', $projet->descriptionFr) }}
                        </textarea>
                    </div>
                    @error('descriptionFr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Link URL -->
                <div>
                    <label for="linkurl" class="block text-sm font-medium text-gray-700 mb-1">URL du lien</label>
                    <input type="text" id="linkurl" name="linkurl" value="{{ old('linkurl', $projet->linkurl) }}" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                        required autofocus autocomplete="linkurl">
                    @error('linkurl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Checkbox -->
                <div class="flex items-center">
                    <input type="hidden" name="isPublished" value="0">
                    <input type="checkbox" id="isPublished" name="isPublished" value="1" 
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                        {{ $projet->isPublished == 1 ? 'checked' : '' }}>
                    <label for="isPublished" class="ml-2 block text-sm text-gray-700">Est publié</label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Enregistrer
                    </button>

                    @if (session('status') === 'historique-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                            class="text-sm text-gray-600">Sauvegardé avec succès.</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection