@extends('welcome')

@section('title')
    {{ __('detail') }}
@endsection
@section('css')
    <style>
        .event-title {
            font-size: 24px;
            font-weight: 700;
            color: #333;
        }

        .details-section h4 {
            font-size: 18px;
            margin-bottom: 15px;
            color: #555;
        }

        .details-section ul {
            list-style: none;
            padding: 0;
        }

        .details-section ul li {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .card-button:hover .card-icone {
            transform: translateX(0px);
            /* Slide icon slightly to the right */
        }
    </style>
    <link rel="stylesheet" href="{{ asset('stylePresentation.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container">



        <div class="flex-container">
            <div class="div1" style="display: flex; flex-direction: column; margin-bottom: 90px;">


                <!-- Event Header -->
                <div class="row my-4">
                    <div class="col-md-12 text-center">
                        <h1 class="event-title" style="font-family: 'Inter'; font-weight: bold;opacity:1;">
                            {{ app()->getLocale() === 'ar' ? $service->titleAr : $service->titleFr }}
                        </h1>

                    </div>
                </div>

                <!-- Event Content -->
                <div class="">
                    <!-- Event Image -->
                    <div class="col-md-12">
                        <div class="image-section" style="overflow: hidden; border-radius: 10px;">
                            <img src="{{ s3Asset($service->imgUrl) }}" alt="Event Image" class="img-fluid"
                                style="width: 100%; height: 400px; object-fit: fill;">
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <!-- Event Title -->
                            <h1 class="event-title"
                                style="font-family: 'Inter'; font-weight: 700; font-size: 28px; color: #333;">
                                {{ app()->getLocale() === 'ar' ? $service->titleAr : $service->titleFr }}
                            </h1>

                            <!-- Event Description -->
                            <p class="event-description"
                                style="font-size: 28px; font-family: 'Inter'; line-height: 1.8; margin-top: 20px;font-weight:500;">
                                {!! app()->getLocale() === 'ar'
                                    ? $service->descriptionAr
                                    : preg_replace('/<div[^>]*>|<\/div>/', '', $service->descriptionFr) !!}
                            </p>



                            <!-- Back Button -->

                            {{-- <button class="card-button" 
                onclick="window.location.href='{{ route('events.index') }}'"
                > <span class="card-icone" style="font-size: 7px"><i
                    class="fa fa-chevron-left "></i></span> Back to Events </button> --}}
                        </div>
                    </div>
                </div>



            </div>


            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
