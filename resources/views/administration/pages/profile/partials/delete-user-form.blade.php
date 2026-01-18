

    <!-- Delete Account Button -->
    <button class="btn btn-danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Delete Account') }}</button> <br>
    @error('password', 'userDeletion') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror

    <!-- Modal -->
    <div 
        x-data="{ show: false }"
        x-init="() => { window.addEventListener('open-modal', event => { if (event.detail === 'confirm-user-deletion') show = true }) }"
        x-on:keydown.escape.window="show = false"
        x-on:close.stop="show = false"
        class="fixed inset-0 z-50"
    >
        <!-- Background overlay -->
        <div 
            x-show="show" 
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-on:click="show = false"
            class="absolute inset-0 bg-gray-500 opacity-75"
        ></div>

        <!-- Modal Content -->
        <div 
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto z-50"
        >
            <!-- Modal Form -->
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="{{ __('Password') }}" class="form-control" />
                    
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="button" class="btn btn-primary" x-on:click="show = false">
                        {{ __('Cancel') }}
                    </button>

                    <button type="submit" class="btn btn-danger">
                        {{ __('Delete Account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
