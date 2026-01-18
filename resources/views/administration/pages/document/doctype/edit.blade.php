@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if ($errors->any())
    <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="text-xl font-semibold text-gray-800">Modifier le type de document</h2>
            <a href="{{ url('documentad') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form action="{{ url('documentad/' . $type->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="space-y-2">
                    <label class="block text-sm font-medium text-gray-700">Type de service</label>
                    <input type="text" name="name" value="{{ $type->type }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                </div>

                <div class="space-y-4 sm:space-y-0 sm:flex sm:space-x-6">
                    <div class="flex items-center">
                        <input type="hidden" name="isPublished" value="0">
                        <input type="checkbox" id="isPublished" name="isPublished" value="1" 
                            {{ $type->isPublished == 1 ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="isPublished" class="ml-2 block text-sm text-gray-700">Publié</label>
                    </div>
                    <div class="flex items-center">
                        <input type="hidden" name="footer" value="0">
                        <input type="checkbox" id="footer" name="footer" value="1"
                            {{ $type->footer == 1 ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <label for="footer" class="ml-2 block text-sm text-gray-700">Pied de page</label>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
