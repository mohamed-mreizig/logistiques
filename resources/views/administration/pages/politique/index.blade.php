

@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('Mettre à jour la politique') }}</h2>
        </div>

        <div class="p-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            
            <form method="post" action="{{ url('politiquead/' . ($mission?->id ?? 'new') . '/mission') }}" 
                  class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Arabic Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre (Arabe)</label>
                        <input type="text" id="titleAr" name="titleAr" value="{{ old('titleAr', $mission?->titleAr) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required autofocus autocomplete="titleAr">
                        @error('titleAr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- French Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Titre (Français)</label>
                        <input type="text" id="titleFr" name="titleFr" value="{{ old('titleFr', $mission?->titleFr) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                            required autofocus autocomplete="titleFr">
                        @error('titleFr')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Arabic Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description (Arabe)</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionWAr" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]">
                            {{ old('descriptionWAr', $mission?->descriptionWAr) }}
                        </textarea>
                    </div>
                    @error('descriptionWAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- French Description -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Description (Français)</label>
                    <div class="border border-gray-300 rounded-md">
                        <textarea name="descriptionWFr" id="myeditorinstance" class="w-full px-3 py-2 min-h-[200px]">
                            {{ old('descriptionWFr', $mission?->descriptionWFr) }}
                        </textarea>
                    </div>
                    @error('descriptionWFr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Published Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="isPublished" name="isPublished" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           {{ $mission?->isPublished ? 'checked' : '' }}>
                    <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        {{ __('Enregistrer') }}
                    </button>

                    @if (session('status') === 'politique-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                            class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection