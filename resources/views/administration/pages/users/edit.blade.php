
@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    @if ($errors->any())
    <div class="mb-6 p-4 bg-yellow-100 text-yellow-800 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Modifier l'utilisateur</h2>
            <a href="{{ url('users') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                Retour
            </a>
        </div>

        <div class="p-6">
            <form action="{{ url('users/'.$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Nom</label>
                    <input type="text" name="name" value="{{ $user->name }}" 
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('name') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="text" name="email" readonly value="{{ $user->email }}" 
                           class="w-full px-3 py-2 border rounded bg-gray-100 cursor-not-allowed" />
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Mot de passe</label>
                    <input type="text" name="password" 
                           class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    @error('password') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Rôles</label>
                    <select name="roles[]" multiple 
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="">Sélectionner un rôle</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected':'' }}>
                            {{ $role }}
                        </option>
                        @endforeach
                    </select>
                    @error('roles') 
                    <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 mb-2">Statut du compte</label>
                    <select name="is_active" 
                            class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Actif</option>
                        <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Désactivé</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
