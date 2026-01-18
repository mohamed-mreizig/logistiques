<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ url('parametres/' . ($histo?->id ?? 'new') . '/historique') }}" class="mt-6 space-y-6"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="histoAr">histoAr</label>
        <textarea name="histoAr" id="myeditorinstance">{{ old('histoAr', $histo?->histoAr) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="histoFR">histoFR</label>

        <div id="editor">
            <textarea name="histoFR" id="myeditorinstance">{{ old('histoFR', $histo?->histoFR) }}</textarea>

        </div>
        @error('histoFR')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label>Aperçu actuel</label>
        <div>
            @if ($histo?->logoUrl )
                <img src="{{ s3Asset($histo->logoUrl) }}" height="100">
           
            @endif
        </div>
    </div>
    <div class="mb-3">
        <label for="logoUrl">logoUrl</label>
        <input type="file" id="logoUrl" name="logoUrl" class="form-control">
        @error('logoUrl')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="isPublished">Published</label>
        <input type="checkbox" id="isPublished" name="isPublished" {{ $histo?->isPublished ? 'checked' : '' }} class="form-check-input">
    </div>
    <div class="flex items-center gap-4">
        <button class="btn btn-primary ">{{ __('Save') }}</button>

        @if (session('status') === 'historique-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
   
</form>
