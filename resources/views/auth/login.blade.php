<x-guest-layout>
    <div class="max-w-md w-full p-8 bg-white rounded-lg shadow-md mx-auto my-8" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="relative flex items-center justify-center mb-8">
            <a href="{{ url()->previous() }}" class="{{ app()->getLocale() == 'ar' ? 'right-0' : 'left-0' }} absolute text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ app()->getLocale() == 'ar' ? 'M9 5l7 7-7 7' : 'M15 19l-7-7 7-7' }}" />
                </svg>
            </a>
            <a href="{{ url('/') }}">
                <img src="{{ s3asset($logoUrl) }}" alt="Logo" class="h-16" style="    width: 10rem;">
            </a>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('messages.email')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1">
                    <x-text-input id="email" 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('messages.password')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1">
                    <x-text-input id="password" 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input id="remember_me" 
                    type="checkbox"
                    name="remember"
                    class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded">
                <label for="remember_me" class="ml-2 mr-2 block text-sm text-gray-900">
                    {{ __('messages.remember_me') }}
                </label>
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 px-2" href="{{ route('password.request') }}">
                    {{ __('messages.forgot_password') }}
                </a>
                @endif
            </div>

            <div>
               
                <button type="submit" 
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    {{ __('messages.login') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
