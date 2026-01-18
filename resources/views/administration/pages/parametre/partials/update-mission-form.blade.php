<form id="send-verification" method="post" action="{{ route('verification.send') }}">
    @csrf
</form>

<form method="post" action="{{ url('parametres/' . ($mission?->id ?? 'new') . '/mission') }}" class="mt-6 space-y-6"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="titleAr">titleAr</label>
        <input type="text" id="titleAr" name="titleAr" value="{{ old('titleAr', $mission?->titleAr) }}" required
            autofocus autocomplete="titleAr" class="form-control" />
        @error('titleAr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="titleFr">titleFr</label>
        <input type="text" id="titleFr" name="titleFr" value="{{ old('titleFr', $mission?->titleFr) }}" required
            autofocus autocomplete="titleFr" class="form-control" />
        @error('titleFr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descriptionWAr">descriptionWAr</label>
        <div id="editor">
            <textarea name="descriptionWAr" id="myeditorinstance">{{ old('descriptionWAr', $mission?->descriptionWAr) }}</textarea>
        </div>
        @error('descriptionWAr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="descriptionWFr">descriptionWFr</label>
        <div id="editor">
            <textarea name="descriptionWFr" id="myeditorinstance">{{ old('descriptionWFr', $mission?->descriptionWFr) }}</textarea>
        </div>
        @error('descriptionWFr')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label for="isPublished">Published</label>
        <input type="checkbox" id="isPublished" name="isPublished" {{ $mission?->isPublished ? 'checked' : '' }} class="form-check-input">
    </div>

    <div class="flex items-center gap-4">
        <button class="btn btn-primary">{{ __('Save') }}</button>

        @if (session('status') === 'mots-directeur-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="text-sm text-gray-600">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
