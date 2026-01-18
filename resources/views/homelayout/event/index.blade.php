@extends('welcome')

@section('title')
    {{ __('messages.event_management') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('stylePresentation.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card {
            border: none;
            background-color: transparent;
        }

        .image-section {
            height: 200px;
            overflow: hidden;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text-section h6 {
            font-size: 14px;
            font-family: 'Inter';
            font-weight: 500;
        }

        .text-section p {
            font-size: 12px;
            font-family: 'Inter';
            margin-bottom: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">{{ __('messages.event_management') }} </h2>


        <div class="flex-container">
            <div class="div1" style="display: flex;flex-direction: column;margin-bottom: 90px;">

                <div class="container mb-4">

                    @if ($events && $events->count() > 0)
                        <div class="row">
                            @foreach ($events as $event)
                                @if ($event->isPublished)
                                    <!-- Card -->
                                    <div class="col-md-4 col-sm-6 mb-4 pl-0">
                                        <div class="card" style="border: none; background-color: transparent;">
                                            <!-- Image Section -->
                                            <div class="image-section" style="height: 200px; overflow: hidden;">
                                                <img src="{{ s3Asset($event->imageurl) }}" alt="Event Image"
                                                    class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                                            </div>

                                            <!-- Text Section -->
                                            <div class="text-section mt-2">
                                                <h6 class="text-muted"
                                                    style="font-size: 14px; font-family: 'Inter'; font-weight: 500;">
                                                    {{ app()->getLocale() === 'ar' ? $event->titleAr : $event->titleFR }}
                                                </h6>
                                                <p style="font-size: 10px; font-family: 'Inter'; font-weight: 300;">
                                                    {{ \Carbon\Carbon::parse($event->start_at)->locale('fr')->isoFormat('dddd D MMMM YYYY') }}
                                                    -
                                                    {{ \Carbon\Carbon::parse($event->ends_at)->locale('fr')->isoFormat('dddd D MMMM YYYY') }}
                                                </p>
                                                <p class="snippet" style="font-size: 12px; font-family: 'Inter'; ">
                                                    {!! app()->getLocale() === 'ar'
                                                        ? Str::limit( preg_replace('/<div[^>]*>|<\/div>/', '', $event->descriptionAr),110)
                                                        :Str::limit( preg_replace('/<div[^>]*>|<\/div>/', '', $event->descriptionfr) ,110)!!}
                                                </p>
                                                <button class="card-button"
                                                    onclick="window.location.href='{{ route('events.details', ['event' => $event->id]) }}'">
                                                    {{ __('messages.Dplus') }} <span class="card-icon"
                                                        style="font-size: 7px"><i
                                                            class="fa  {{ app()->getLocale() == 'ar' ? 'fa-chevron-left' : ' fa-chevron-right' }} "></i></span></button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <p> {{ __('messages.no_events_available') }} </p>
                    @endif




                    @if ($events->hasPages())
                        <nav class="mt-3">
                            <ul class="pagination pagination-sm justify-content-left custom-pagination">
                                {{ $evets->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    @endif
                </div>







            </div>
            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
