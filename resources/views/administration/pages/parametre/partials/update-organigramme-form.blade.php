<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ url('parametres/' . ($org?->id ?? 'new') . '/organigramme') }}" class="mt-6 space-y-6"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="descriptionorgAR">descriptionorgAR</label>
        <div id="editor">
            <textarea name="descriptionorgAR" id="myeditorinstance">{{ old('descriptionorgAR', $org?->descriptionorgAR) }}</textarea>
        </div>
        @error('descriptionorgAR')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descriptionorgFR">descriptionorgFR</label>

        <div id="editor">
            <textarea name="descriptionorgFR" id="myeditorinstance">{{ old('descriptionorgFR', $org?->descriptionorgFR) }}</textarea>

        </div>
        @error('descriptionorgFR')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Aperçu actuel</label>
        <div>
            @if ($org?->orgImgUrl )
                <img src="{{ s3Asset($org->orgImgUrl) }}" height="100">
           
            @endif
        </div>
    </div>
    <div class="mb-3">
        <label for="orgImgUrl">Image</label>
        <input type="file" id="orgImgUrl" name="orgImgUrl" class="form-control">
        @error('orgImgUrl')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="isPublished">Published</label>
        <input type="checkbox" id="isPublished" name="isPublished" {{ $org?->isPublished ? 'checked' : '' }} class="form-check-input">
    </div>

    <div class="flex items-center gap-4">
        <button class="btn btn-primary ">{{ __('Save') }}</button>

        @if (session('status') === 'organigramme-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
   
</form>
