@extends('administration.layouts.app')

@section('pagecontent')
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">{{ __('Mettre à jour le logo de l\'application') }}</h2>
            </div>

            <div class="p-6">
                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>
                <form method="post" action="{{ url('parametres/' . ($histo?->id ?? 'new') . '/logo') }}"
                    class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700 mb-1">Image du logo</label>
                        <input type="file" id="image_url" name="image_url" onchange="previewLogo(this)"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('image_url')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <div class="mt-4">
                            @if ($histo?->image_url)
                                <p class="text-sm text-gray-500 mb-2">Logo actuel :</p>
                                <img src="{{ s3Asset($histo->image_url) }}" class="h-24 object-contain">
                            @endif
                            <img id="logoPreview" src="#" alt="Aperçu" class="h-24 object-contain hidden mt-2">
                        </div>
                    </div>

                    <div class="flex items-center gap-4 pt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            {{ __('Enregistrer') }}
                        </button>

                        @if (session('status') === 'logo-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                                class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
