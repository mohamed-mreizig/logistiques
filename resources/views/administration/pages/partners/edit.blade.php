
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
            <h2 class="text-xl font-semibold text-gray-800">Modifier le partenaire</h2>
            <a href="{{ url('partners') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form method="post" action="{{ url('partners/' . $partner->id) }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Logo</label>
                    @if($partner->imgUrl)
                        <div class="mb-2">
                            <img src="{{ s3Asset($partner->imgUrl) }}" alt="Logo actuel" class="h-20 w-auto object-contain">
                        </div>
                    @endif
                    <input type="file" id="imgUrl" name="imgUrl"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('imgUrl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Titre (Arabe)</label>
                    <input type="text" id="titleAr" name="titleAr" value="{{ old('titleAr', $partner->titleAr) }}" required
                        autofocus autocomplete="titleAr"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('titleAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Titre (Français)</label>
                    <input type="text" id="titlefr" name="titlefr" value="{{ old('titlefr', $partner->titlefr) }}" required
                        autofocus autocomplete="titlefr"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('titlefr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-2">
                    <input type="hidden" name="isPublished" value="0">
                    <input type="checkbox" id="isPublished" name="isPublished" value="1"
                        {{ old('isPublished', $partner->isPublished) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="isPublished" class="block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Enregistrer
                    </button>

                    @if (session('status') === 'historique-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                            class="text-sm text-gray-600">Enregistré</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection