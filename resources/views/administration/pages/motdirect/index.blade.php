@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('Mots du Directeur') }}</h2>
            <p class="text-sm text-gray-600 mt-1">{{ __('Mettre à jour vos informations.') }}</p>
        </div>

        <div class="p-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ url('parametres/' . ($Motsdirect?->id ?? 'new') . '/mots-directeur') }}" 
                  class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('put')
                
                <div>
                    <label for="imgUrl" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" id="imgUrl" name="imgUrl" onchange="previewImage(this)"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('imgUrl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <div class="mt-4">
                        @if($Motsdirect?->imgUrl)
                            <p class="text-sm text-gray-500 mb-2">Image actuelle :</p>
                            <img src="{{ s3asset($Motsdirect->imgUrl) }}" alt="Image actuelle" class="max-w-xs rounded border border-gray-200 h-48">
                        @endif
                        <img id="imagePreview" src="#" alt="Aperçu" class="max-w-xs rounded border border-gray-200 hidden mt-2 h-48">
                    </div>
                </div>

                <div>
                    <label for="NameWAr" class="block text-sm font-medium text-gray-700 mb-1">Nom (Arabe)</label>
                    <input type="text" id="NameWAr" name="NameWAr" value="{{ old('NameWAr', $Motsdirect?->NameWAr) }}" 
                           required autofocus autocomplete="NameWAr"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('NameWAr') border-red-500 @enderror">
                    @error('NameWAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="NameWFr" class="block text-sm font-medium text-gray-700 mb-1">Nom (Français)</label>
                    <input type="text" id="NameWFr" name="NameWFr" value="{{ old('NameWFr', $Motsdirect?->NameWFr) }}" 
                           required autofocus autocomplete="NameWFr"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('NameWFr') border-red-500 @enderror">
                    @error('NameWFr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="myeditorinstanceAr" class="block text-sm font-medium text-gray-700 mb-1">Description (Arabe)</label>
                    <textarea name="myeditorinstanceAr" id="myeditorinstance"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('myeditorinstanceAr') border-red-500 @enderror">{{ old('descriptionWFr', $Motsdirect?->descriptionWAr) }}</textarea>
                    @error('myeditorinstanceAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="myeditorinstanceFr" class="block text-sm font-medium text-gray-700 mb-1">Description (Français)</label>
                    <textarea name="myeditorinstanceFr" id="myeditorinstance"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 @error('myeditorinstanceFr') border-red-500 @enderror">{{ old('descriptionWFr', $Motsdirect?->descriptionWFr) }}</textarea>
                    @error('myeditorinstanceFr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="isPublished" name="isPublished"
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           {{ $Motsdirect?->isPublished ? 'checked' : '' }}>
                    <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4 pt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        {{ __('Enregistrer') }}
                    </button>

                    @if (session('status') === 'mots-directeur-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                           class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
