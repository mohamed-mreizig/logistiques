@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('Modifier les coordonnées') }}</h2>
        </div>

        <div class="p-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            
            <form method="post" action="{{ url('parametres/' . ($contact?->id ?? 'new') . '/contact') }}" 
                  class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $contact?->telephone) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $contact?->email) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="adressAr" class="block text-sm font-medium text-gray-700 mb-1">Adresse (Arabe)</label>
                        <input type="text" id="adressAr" name="adressAr" value="{{ old('adressAr', $contact?->adressAr) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('adressAr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="adressFR" class="block text-sm font-medium text-gray-700 mb-1">Adresse (Français)</label>
                        <input type="text" id="adressFR" name="adressFR" value="{{ old('adressFR', $contact?->adressFR) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('adressFR')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="boitePostaleAR" class="block text-sm font-medium text-gray-700 mb-1">Boîte postale (Arabe)</label>
                        <input type="text" id="boitePostaleAR" name="boitePostaleAR" value="{{ old('boitePostaleAR', $contact?->boitePostaleAR) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('boitePostaleAR')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="boitePostaleFR" class="block text-sm font-medium text-gray-700 mb-1">Boîte postale (Français)</label>
                        <input type="text" id="boitePostaleFR" name="boitePostaleFR" value="{{ old('boitePostaleFR', $contact?->boitePostaleFR) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('boitePostaleFR')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="longe" class="block text-sm font-medium text-gray-700 mb-1">Longitude</label>
                        <input type="text" id="longe" name="longe" value="{{ old('longe', $contact?->longe) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('longe')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="alt" class="block text-sm font-medium text-gray-700 mb-1">Altitude</label>
                        <input type="text" id="alt" name="alt" value="{{ old('alt', $contact?->alt) }}" required
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('alt')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center mt-4">
                    <input type="checkbox" id="isPublished" name="isPublished"
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           {{ $contact?->isPublished ? 'checked' : '' }}>
                    <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        {{ __('Enregistrer') }}
                    </button>

                    @if (session('status') === 'profile-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                           class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
