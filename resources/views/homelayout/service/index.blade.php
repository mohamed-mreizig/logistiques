@extends('welcome')
@section('title')
    {{ __('messages.services') }}
@endsection
@section('css')
    <link rel="stylesheet" href="/stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container ">
        <h1 class="mb-4 texte">{{ $types->type }}</h1>
        @if ($services && $services->count() > 0)
            <div class="row">
                @foreach ($services as $type)
                    @if ($type->isPublished)
                        <!-- Card -->
                        <div class="col-md-4 col-sm-6 mb-4 pl-0">
                            <div class="card" style="border: none; background-color: transparent;">
                                <!-- Image Section -->
                                <div class="image-section" style="height: 200px; overflow: hidden;">
                                    <img src="{{ s3Asset($type->imgUrl) }}" alt="Event Image" class="img-fluid"
                                        style="width: 100%; height: 100%; object-fit: fill;">
                                </div>

                                <!-- Text Section -->
                                <div class="text-section mt-2">
                                    <h6 class="text-muted" style="font-size: 14px; font-family: 'Inter'; font-weight: 500;">
                                        {{ app()->getLocale() === 'ar' ? $type->titleAr : $type->titleFr }}
                                    </h6>

                                    <p class="snippet" style="font-size: 12px; font-family: 'Inter'; ">
                                        {!! app()->getLocale() === 'ar'
                                            ? preg_replace('/<div[^>]*>|<\/div>/', '', Str::limit($type->descriptionAr, 110))
                                            : preg_replace('/<div[^>]*>|<\/div>/', '', Str::limit($type->descriptionFr, 110)) !!}
                                    </p>
                                    <button class="card-button"
                                        onclick="window.location.href='{{ route('service.details', ['service' => $type->id]) }}'">
                                        {{ __('messages.learn_more') }} <span class="card-icon" style="font-size: 7px"><i
                                                class="fa  {{ app()->getLocale() == 'ar' ? 'fa-chevron-left' : ' fa-chevron-right' }} "></i></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <p> {{ __('messages.no_services_available') }} </p>
        @endif




        @if ($services->hasPages())
            <nav class="mt-3">
                <ul class="pagination pagination-sm justify-content-left custom-pagination">
                    {{ $evets->links('pagination::bootstrap-5') }}
                </ul>
            </nav>
        @endif
    </div>
@endsection
