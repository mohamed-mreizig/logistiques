@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Slider</h2>
            <a href="{{ route('settings.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Ajouter un slider
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">URL</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden lg:table-cell">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($settings as $setting)
                    <tr>
                        <td class="px-6 py-4  text-sm font-medium text-gray-900">
                          {{ Str::limit($setting->title, 200) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                            {{ $setting->url }}
                        </td>
                        <td class="px-6 py-4  text-sm text-gray-500 hidden lg:table-cell">
                            {{ Str::limit($setting->description, 200) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $setting->ispublished ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $setting->ispublished ? 'Publié' : 'Non publié' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a href="{{ route('settings.edit', $setting->id) }}" 
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                                    Modifier
                                </a>
                                <form action="{{ route('settings.destroy', $setting->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            onclick="return confirm('Êtes-vous sûr ?')"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection