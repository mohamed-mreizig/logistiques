<x-guest-layout>
    <div class="max-w-md w-full p-8 bg-white rounded-lg shadow-md mx-auto my-8" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="relative flex items-center justify-center mb-8">
            <a href="{{ url()->previous() }}" class="{{ app()->getLocale() == 'ar' ? 'right-0' : 'left-0' }} absolute text-gray-600 hover:text-gray-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ app()->getLocale() == 'ar' ? 'M9 5l7 7-7 7' : 'M15 19l-7-7 7-7' }}" />
                </svg>
            </a>
            <a href="{{ url('/') }}">
                <img src="{{ s3asset($logoUrl) }}" alt="Logo" class="h-16 "style="    width: 10rem;">
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('messages.name')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1">
                    <x-text-input id="name" 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1" />
                </div>
            </div>

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('messages.email')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1">
                    <x-text-input id="email" 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('messages.password')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1">
                    <x-text-input id="password" 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div>
                <x-input-label for="password_confirmation" :value="__('messages.confirm_password')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1">
                    <x-text-input id="password_confirmation" 
                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm {{ app()->getLocale() == 'ar' ? 'text-right' : 'text-left' }}"
                        type="password"
                        name="password_confirmation"
                        required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                </div>
            </div>

            <div class="flex  {{ app()->getLocale() == 'ar' ? 'flex-row-reverse' : '' }} justify-between mt-4">
                {{-- <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('messages.login_now') }}
                </a> --}}

                <button type="submit" 
                    class="flex flex-1 justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
