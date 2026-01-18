
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
            <h2 class="text-xl font-semibold text-gray-800">Modifier le projet</h2>
            <a href="{{ url('projet') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
            
            <form method="post" action="{{ url('projet/' . $projet->id) }}" class="space-y-6" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Image</label>
                    @if($projet->imgUrl)
                        <div class="mb-4">
                            <img id="imagePreview" src="{{ s3Asset($projet->imgUrl) }}" alt="Image actuelle" class="h-40 object-cover rounded-md">
                        </div>
                    @endif
                    <input type="file" id="imgUrl" name="imgUrl" onchange="previewImage(this)"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('imgUrl')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Titre (Arabe)</label>
                    <input type="text" id="titleAr" name="titleAr" value="{{ old('titleAr', $projet->titleAr) }}" required
                        autofocus autocomplete="titleAr"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('titleAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Titre (Français)</label>
                    <input type="text" id="titleFr" name="titleFr" value="{{ old('titleFr', $projet->titleFr) }}" required
                        autofocus autocomplete="titleFr"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    @error('titleFr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Date de début</label>
                        <input type="date" id="date_debut" name="date_debut" value="{{ old('date_debut', $projet->date_debut) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Date de fin</label>
                        <input type="date" id="date_fin" name="date_fin" value="{{ old('date_fin', $projet->date_fin) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Description (Arabe)</label>
                    <textarea name="descriptionAr" id="myeditorinstance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        {{ old('descriptionAr', $projet->descriptionAr) }}
                    </textarea>
                    @error('descriptionAr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Description (Français)</label>
                    <textarea name="descriptionFR" id="myeditorinstance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                        {{ old('descriptionFR', $projet->descriptionFR) }}
                    </textarea>
                    @error('descriptionFR')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="isPublished" name="isPublished" 
                        {{ old('isPublished', $projet->isPublished) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="isPublished" class="block text-sm text-gray-700">Publié</label>
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Enregistrer
                    </button>

                    @if (session('status') === 'historique-updated')
                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                            class="text-sm text-gray-600">Enregistré.</p>
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
        const file = input.files[0];
        const reader = new FileReader();

        if (file) {
            reader.onload = function(e) {
                if (!preview) {
                    const previewContainer = input.previousElementSibling;
                    previewContainer.innerHTML = `<img id="imagePreview" src="${e.target.result}" alt="Preview" class="h-40 object-cover rounded-md mb-4">`;
                } else {
                    preview.src = e.target.result;
                }
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush