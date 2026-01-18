
 
       

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="update_password_current_password">Current Password</label>
            <input type="text" id="update_password_current_password" name="current_password" type="password" autocomplete="current-password"
             class="form-control" />
             @error('current_password', 'updatePassword')
             <span class="text-danger">{{ $message }}</span>
         @enderror
        </div>
       
        <div class="mb-3">
            <label for="update_password_password">New Password</label>
            <input 
            type="password" 
            id="update_password_password" 
            name="password" 
            autocomplete="new-password"
            class="form-control @error('password', 'updatePassword') is-invalid @enderror" 
            required
        />
             @error('password', 'updatePassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
   
        <div class="mb-3">
            <label for="update_password_password_confirmation">Confirm Password</label>
            <input 
            type="password" 
            id="update_password_password_confirmation" 
            name="password_confirmation" 
            autocomplete="new-password"
            class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" 
            required
        />
             @error('password', 'updatePassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
     

        <div class="flex items-center gap-4">
            <button class="btn btn-primary ">{{ __('Save') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

