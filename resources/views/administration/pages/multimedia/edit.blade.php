@extends('administration.layouts.app')

@section('title', 'Modifier le média')

@section('pagecontent')
    <div class="container mx-auto px-4 py-6">
        @if (session('status'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('status') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h3 class="text-xl font-semibold text-gray-800">Modifier le média</h3>
                <a href="{{ route('multimedia.index') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                    Retour
                </a>
            </div>

            <div class="p-6">
                <form action="{{ url('multimedia/' . $media->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <!-- Current Preview -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Aperçu actuel</label>
                        <div class="mt-1">
                            @if ($media->type === 'image')
                                <img src="{{ s3Asset($media->path) }}" class="h-32 w-auto rounded-md border border-gray-200" alt="Aperçu de l'image">
                            @else
                                <video class="h-32 w-auto rounded-md border border-gray-200" controls>
                                    <source src="{{ s3Asset($media->path) }}" type="video/mp4">
                                    Votre navigateur ne prend pas en charge la lecture vidéo.
                                </video>
                            @endif
                        </div>
                    </div>
                    <!-- File Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nouveau fichier (facultatif)</label>
                        <input type="file" name="file" class="block w-full text-sm text-gray-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0
                            file:text-sm file:font-semibold
                            file:bg-blue-50 file:text-blue-700
                            hover:file:bg-blue-100">
                    </div>
                    <!-- Type -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type de média</label>
                        <select name="type" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                            <option value="image" {{ $media->type === 'image' ? 'selected' : '' }}>Image</option>
                            <option value="video" {{ $media->type === 'video' ? 'selected' : '' }}>Vidéo</option>
                        </select>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titre</label>
                            <input type="text" name="title" value="{{ $media->title }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <input type="text" name="description" value="{{ $media->description }}" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                        </div>
                    </div>

                    <!-- Published Checkbox -->
                    <div class="flex items-center">
                        <input type="hidden" name="isPublished" value="0">
                        <input type="checkbox" id="isPublished" name="isPublished" value="1" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" {{ $media->isPublished == 1 ? 'checked' : '' }}>
                        <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
