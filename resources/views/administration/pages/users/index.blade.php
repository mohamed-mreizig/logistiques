
@extends('administration.layouts.app')

@section('pagecontent')
<div class="container mx-auto px-4 py-6">
    <!-- Boutons d'action -->
    <div class="flex flex-wrap gap-2 mb-6">
        @can('view user')
        <a href="{{ url('users') }}" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700 transition-colors">
            Utilisateurs
        </a>
        @endcan
        @can('view role')
        <a href="{{ url('roles') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
            Rôles
        </a>
        @endcan
        
        @can('view permission')
        <a href="{{ url('permissions') }}" class="px-4 py-2 bg-cyan-600 text-white rounded hover:bg-cyan-700 transition-colors">
            Permissions
        </a>
        @endcan
    </div>

    <!-- Message de statut -->
    @if (session('status'))
    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
        {{ session('status') }}
    </div>
    @endif

    <!-- Tableau des utilisateurs -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Utilisateurs</h2>
            @can('create user')
            <a href="{{ url('users/create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                Ajouter un utilisateur
            </a>
            @endcan
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hidden md:table-cell">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rôles</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $user->id }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            {{ $user->name }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 hidden md:table-cell">
                            {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-wrap gap-1">
                                @if (!empty($user->getRoleNames()))
                                    @foreach ($user->getRoleNames() as $rolename)
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $rolename }}
                                    </span>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                @can('update user')
                                <a href="{{ url('users/'.$user->id.'/edit') }}" 
                                   class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition-colors">
                                    Modifier
                                </a>
                                @endcan
                                
                                @can('delete user')
                                <a href="{{ url('users/'.$user->id.'/delete') }}" 
                                   onclick="return confirm('Êtes-vous sûr ?')"
                                   class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition-colors">
                                    Supprimer
                                </a>
                                @endcan
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
