
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
            <h2 class="text-xl font-semibold text-gray-800">Modifier l'événement</h2>
            <a href="{{ url('event') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form method="post" action="{{ url('event/' . $projet->id) }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Image de l'événement</label>
                    @if($projet->imageurl)
                        <div class="mb-2">
                            <img src="{{ s3Asset($projet->imageurl) }}" alt="Image actuelle de l'événement" class="h-40 w-auto object-contain">
                        </div>
                    @endif
                    <input type="file" id="imageurl" name="imageurl"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('imageurl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Titre (Arabe)</label>
                    <input type="text" id="titleAr" name="titleAr" value="{{ old('titleAr', $projet->titleAr) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('titleAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Titre (Français)</label>
                    <input type="text" id="titleFR" name="titleFR" value="{{ old('titleFR', $projet->titleFR) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('titleFR')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Date de début</label>
                        <input type="date" id="start_at" name="start_at" value="{{ old('start_at', $projet->start_at) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Date de fin</label>
                        <input type="date" id="ends_at" name="ends_at" value="{{ old('ends_at', $projet->ends_at) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Description (Arabe)</label>
                    <textarea name="descriptionAr" id="myeditorinstance"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm min-h-[150px]">
                        {{ old('descriptionAr', $projet->descriptionAr) }}
                    </textarea>
                    @error('descriptionAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Description (Français)</label>
                    <textarea name="descriptionfr" id="myeditorinstance"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm min-h-[150px]">
                        {{ old('descriptionfr', $projet->descriptionfr) }}
                    </textarea>
                    @error('descriptionfr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-2">
                    <input type="hidden" name="isPublished" value="0">
                    <input type="checkbox" id="isPublished" name="isPublished" value="1"
                        {{ old('isPublished', $projet->isPublished) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="isPublished" class="block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        {{ __('Enregistrer') }}
                    </button>

                    @if (session('status') === 'historique-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                            class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection