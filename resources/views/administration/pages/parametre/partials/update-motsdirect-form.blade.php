<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ url('parametres/' . ($Motsdirect?->id ?? 'new') . '/mots-directeur') }}" class="mt-6 space-y-6"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="NameWAr">NameWAr</label>
        <input type="text"id="NameWAr" name="NameWAr" value="{{ old('NameWAr', $Motsdirect?->NameWAr) }}" required
            autofocus autocomplete="NameWAr" class="form-control" />
        @error('NameWAr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="NameWFr">NameWFr</label>
        <input type="text"id="NameWFr" name="NameWFr" value="{{ old('NameWFr', $Motsdirect?->NameWFr) }}" required
            autofocus autocomplete="NameWFr" class="form-control" />
        @error('NameWFr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="myeditorinstanceAr">descriptionWAr</label>

        <div id="editor">
            <textarea name="myeditorinstanceAr" id="myeditorinstance">{{ old('descriptionWFr', $Motsdirect?->descriptionWAr) }}</textarea>

        </div>
        @error('myeditorinstanceAr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="myeditorinstanceFr">descriptionWFr</label>

        <div id="editor">
            <textarea name="myeditorinstanceFr" id="myeditorinstance">{{ old('descriptionWFr', $Motsdirect?->descriptionWFr) }}</textarea>

        </div>
        @error('myeditorinstanceFr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="imgUrl">Image</label>
        <input type="file" id="imgUrl" name="imgUrl" class="form-control">
        @error('imgUrl')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="isPublished">Published</label>
        <input type="checkbox" id="isPublished" name="isPublished" {{ $Motsdirect?->isPublished ? 'checked' : '' }} class="form-check-input">
    </div>

    <div class="flex items-center gap-4">
        <button class="btn btn-primary ">{{ __('Save') }}</button>

        @if (session('status') === 'mots-directeur-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
