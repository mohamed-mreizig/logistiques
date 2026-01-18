@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('Mettre à jour l\'organigramme') }}</h2>
        </div>

        <div class="p-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            
            <form method="post" action="{{ url('parametres/' . ($org?->id ?? 'new') . '/organigramme') }}" 
                  class="space-y-4" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div>
                    <label for="orgImgUrl" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                    <input type="file" id="orgImgUrl" name="orgImgUrl" onchange="previewImage(this)"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    @error('orgImgUrl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    
                    <div class="mt-4 flex flex-col space-y-4">
                        @if($org?->orgImgUrl)
                            <div>
                                <p class="text-sm text-gray-500 mb-2">Image actuelle :</p>
                                <img src="{{ s3Asset($org->orgImgUrl) }}" class="max-h-48 object-contain rounded border border-gray-200">
                            </div>
                        @endif
                        <div id="newImagePreview" class="hidden">
                            <p class="text-sm text-gray-500 mb-2">Aperçu de la nouvelle image :</p>
                            <img id="imagePreview" src="#" alt="Aperçu" class="max-h-48 object-contain rounded border border-gray-200">
                        </div>
                    </div>
                </div>

                <div>
                    <label for="descriptionorgAR" class="block text-sm font-medium text-gray-700 mb-1">Description (Arabe)</label>
                    <textarea name="descriptionorgAR" id="myeditorinstance"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 min-h-[200px]">{{ old('descriptionorgAR', $org?->descriptionorgAR) }}</textarea>
                    @error('descriptionorgAR')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="descriptionorgFR" class="block text-sm font-medium text-gray-700 mb-1">Description (Français)</label>
                    <textarea name="descriptionorgFR" id="myeditorinstance"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 min-h-[200px]">{{ old('descriptionorgFR', $org?->descriptionorgFR) }}</textarea>
                    @error('descriptionorgFR')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="isPublished" name="isPublished"
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                           {{ $org?->isPublished ? 'checked' : '' }}>
                    <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4 pt-2">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        {{ __('Enregistrer') }}
                    </button>

                    @if (session('status') === 'organigramme-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                           class="text-sm text-gray-600">{{ __('Enregistré.') }}</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function previewImage(input) {
    const previewContainer = document.getElementById('newImagePreview');
    const preview = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        previewContainer.classList.add('hidden');
    }
}
</script>
@endpush
@endsection
