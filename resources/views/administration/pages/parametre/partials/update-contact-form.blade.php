
<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ url('parametres/' . ($contact?->id ?? 'new') . '/contact') }}" class="mt-6 space-y-6"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="telephone">Telephone</label>
        <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $contact?->telephone) }}" required class="form-control" />
    </div>
    <div class="mb-3">
        <label for="adressAr">adressAr</label>
        <input type="text"id="adressAr" name="adressAr" value="{{ old('adressAr', $contact?->adressAr) }}" required autofocus autocomplete="adressAr" class="form-control" />
        @error('adressAr') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
    </div>
    <div class="mb-3">
        <label for="adressFR">adressFR</label>
        <input type="text"id="adressFR" name="adressFR" value="{{ old('adressFR', $contact?->adressFR) }}" 
        required autofocus autocomplete="adressFR" class="form-control" />
        @error('adressFR') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
    </div>
    <div class="mb-3">
        <label for="boitePostaleAR">boitePostaleAR</label>
        <input type="text"id="boitePostaleAR" name="boitePostaleAR" value="{{ old('boitePostaleAR', $contact?->boitePostaleAR) }}" 
        required autofocus autocomplete="boitePostaleAR" class="form-control" />
        @error('boitePostaleAR') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
    </div>
    <div class="mb-3">
        <label for="boitePostaleFR">boitePostaleFR</label>
        <input type="text"id="boitePostaleFR" name="boitePostaleFR" value="{{ old('boitePostaleFR', $contact?->boitePostaleFR) }}" 
        required autofocus autocomplete="boitePostaleFR" class="form-control" />
        @error('boitePostaleFR') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
    </div>
    <div class="mb-3">
        <label for="longe">longe</label>
        <input type="text"id="longe" name="longe" value="{{ old('longe', $contact?->longe) }}" 
        required autofocus autocomplete="longe" class="form-control" />
        @error('longe') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
    </div>
    <div class="mb-3">
        <label for="alt">alt</label>
        <input type="text"id="alt" name="alt" value="{{ old('alt', $contact?->alt) }}" 
        required autofocus autocomplete="alt" class="form-control" />
        @error('alt') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
    </div>
    <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"   value="{{old('email', $contact?->email) }}" required autocomplete="email" class="form-control" />
 
        @error('email') 
        <span class="text-danger">{{ $message }}</span> 
    @enderror
</div>
<div class="mb-3">
    <label for="isPublished">Published</label>
    <input type="checkbox" id="isPublished" name="isPublished" {{ $contact?->isPublished ? 'checked' : '' }} class="form-check-input">
</div>

    <div class="flex items-center gap-4">
        <button class="btn btn-primary ">{{ __('Save') }}</button>

        @if (session('status') === 'profile-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 4000)"
                class="text-sm text-gray-600"
            >{{ __('Saved.') }}</p>
      
        @endif
    </div>
   
</form>

