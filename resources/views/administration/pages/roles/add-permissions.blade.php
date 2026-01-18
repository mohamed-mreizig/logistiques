
@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if (session('status'))
    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
        {{ session('status') }}
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Rôle : {{ $role->name }}</h2>
            <a href="{{ url('roles') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    @error('permission')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <label class="block text-sm font-medium text-gray-700 mb-3">Permissions</label>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                        @foreach ($permissions as $permission)
                        <label class="flex items-center space-x-2">
                            <input
                                type="checkbox"
                                name="permission[]"
                                value="{{ $permission->name }}"
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                class="rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                            />
                            <span class="text-sm text-gray-700">{{ $permission->name }}</span>
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Mettre à jour les permissions
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection