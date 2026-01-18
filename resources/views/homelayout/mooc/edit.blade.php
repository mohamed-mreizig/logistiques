@extends('welcome')

@section('title')
    {{ __('messages.mooc') }}
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
        }
    </style>
    <link rel="stylesheet" href="{{ asset('stylePresentation.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="flex-container">
            <div class="div1" style="display: flex; flex-direction: column; margin-bottom: 90px;">
                <div class="row my-4">
                    <div class="col-md-12 text-center">
                        <h1 class="event-title text-left" style="font-family: 'Inter'; font-weight: bold;opacity:1;">
                            {{ app()->getLocale() === 'ar' ? $mooc->titleAr : $mooc->titleFr }}
                        </h1>
                    </div>
                </div>

                <div class="">
                    <div class="col-md-12">
                        <div class="image-section" style="overflow: hidden; border-radius: 10px;">
                            <img src="{{ s3Asset($mooc->imageUrl) }}" alt="MOOC Image" class="img-fluid"
                                style="width: 100%; height: 400px; object-fit: cover;">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <h1 class="event-title"
                                style="font-family: 'Inter'; font-weight: 700; font-size: 28px; color: #333;">
                                {{ app()->getLocale() === 'ar' ? $mooc->titleAr : $mooc->titleFr }}
                            </h1>

                            <p class="event-description"
                                style="font-size: 28px; font-family: 'Inter'; line-height: 1.8; margin-top: 20px;font-weight:500;">
                                {!! app()->getLocale() === 'ar'
                                    ? $mooc->descriptionAr
                                    : preg_replace('/<div[^>]*>|<\/div>/', '', $mooc->descriptionFr) !!}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
