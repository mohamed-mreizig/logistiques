@extends('welcome')
@section('title')
    {{ __('messages.Documents') }}
@endsection
@section('css')
    <script>
        // Get filter dropdown element

        const documentCards = document.querySelectorAll('.document-card');


        // const events = @json($documents);
        function searchDocuments() {
            const query = document.getElementById('search').value.toLowerCase(); // Get the search query
            const cards = document.querySelectorAll('.document-card'); // Select all document cards
            let noResults = true; // Track if there are matching results

            cards.forEach(card => {
                const title = card.getAttribute('data-title'); // Get the document title (from data-title attribute)

                // Check if the title includes the search query
                if (title.includes(query)) {
                    card.style.display = 'block'; // Show the card if it matches
                    noResults = false; // A match is found
                } else {
                    card.style.display = 'none'; // Hide the card if it doesn't match
                }
            });

            // Handle no results message
            const emptyMessage = document.querySelector('.no-documents-message');
            if (!emptyMessage && noResults) {
                const message = document.createElement('p');
                message.textContent = 'Aucun document trouvé.';
                message.classList.add('no-documents-message', 'text-center', 'mt-4');
                document.getElementById('document-container').appendChild(message);
            } else if (!noResults && emptyMessage) {
                emptyMessage.remove(); // Remove the no results message if there are matches
            }
        }
    </script>
    <link rel="stylesheet" href="/stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container ">
        <h1 class="mb-4 texte">{{ $types->type }}</h1>
        <div class="mb-4 searchdiv">
            <input type="search" class="search-inpute" id="search" onkeyup="searchDocuments()" placeholder="Rechercher...">
        </div>
        {{-- <select class="dropdowne" id="statusFilter">
              <option selected value="all">status : tous</option>
              <option value="1">Published</option>
              <option value="0">Unpublished</option>
            </select> --}}
            <div class="row gy-4 p-3 customgap " id="document-container ">
                @forelse ($documents as $document)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 document-card card-custom"
                        data-title="{{ strtolower(app()->getLocale() === 'ar' ? $document->titleAr : $document->titleFr) }}"
                        data-published="{{ $document->isPublished }}">
                        <div class="card shadow-sm h-100 ">
                            <div class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                @php
                                    $fileExtension = pathinfo($document->fileUrl, PATHINFO_EXTENSION);
                                    $isPdf = strtolower($fileExtension) === 'pdf';
                                    $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']);
                                    $isExcel = in_array(strtolower($fileExtension), ['xlsx', 'xls']);
                                    $isWord = in_array(strtolower($fileExtension), ['doc', 'docx']);
                                    
                                    // Get thumbnail URL
                                    $thumbnailUrl = route('document.thumbnail', ['id' => $document->id]);
                                @endphp

                                @if($isPdf || $isExcel || $isWord)
                                    <img src="{{ $thumbnailUrl }}" alt="Document Preview" 
                                        class="mb-3" style="width: 100%; height: 150px; object-fit: cover;">
                                @elseif($isImage)
                                    <img src="{{ s3Asset($document->fileUrl) }}" alt="Document Preview" 
                                        class="mb-3" style="width: 100%; height: 150px; object-fit: cover;">
                                @else
                                    <i class="fa fa-file-text-o mb-3" style="font-size: 48px; color: #007A3D;"></i>
                                @endif

                                <h5 class="card-title" style="font-family: 'Inter';color:#007A3D;">
                                    {{ app()->getLocale() === 'ar' ? $document->titleAr : $document->titleFr }}</h5>
                                <p class="card-text" style="font-family: 'Inter'; font-weight:300">
                                    {{-- <strong>Document ID:</strong> {{ $document->id }}<br> --}}
                                    <strong>  {{ __('messages.public') }}</strong> {{ $document->created_at->format('Y-m-d') }}
                                </p>
        
                                <div class="d-flex " style="gap: 2px">
                                    <a href="{{ route('view.pdf', ['url' => urlencode(s3Asset($document->fileUrl))]) }}"
                                        class="btn"
                                        style="background-color: #007A3D; border-radius: 12px; width: 120px;color:white"
                                        target="_blank">
                                        {{ __('messages.preview') }}
                                    </a>
                                    <a href="{{ s3Asset($document->fileUrl) }}" class="btn"
                                        style="background-color: #FCD605; border-radius: 12px; width: 120px;color:white" download>
                                        {{ __('messages.download') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="container text-center"> {{ __('messages.not_available') }} </p>
                @endforelse
            </div>
    </div>


    <!-- Pagination Links -->
    @if ($documents->hasPages())
        <nav class="mt-4">
            <ul class="pagination justify-content-center">
                {{ $documents->links('pagination::bootstrap-5') }}
            </ul>
        </nav>
    @endif
    </div>
@endsection
