@extends('welcome')

@section('title')
    {{ __('messages.motdirect') }}
@endsection
@section('css')
    <link rel="stylesheet" href="./stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        [dir="rtl"] .desc {
            text-align: right;
            text-align: justify;
        }
        [dir="rtl"] .title {
            text-align: right;

            text-align: justify;
        }
        [dir="rtl"] .description {
            text-align: right;
            text-align: justify;
        }
        [dir="rtl"] h6 {
            text-align: right;
            text-align: justify;
        }
    </style>
@endsection
@section('content')
    <div class="container" style="height: 100%" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <h2 class="texte">{{ __('messages.motdirect') }} </h2>
        @if ($motdirect)
            <div class="mot_direct pt-0">
                <div class="desc">
                    <h6>{{ __('messages.motdirect') }} </h6>
                    <h1 class="title">{{ app()->getLocale() == 'ar' ? $motdirect->NameWAr : $motdirect->NameWFr }}</h1>
                    <div class="descr">
                        <p class="description" style="color: white;"> {!! app()->getLocale() == 'ar' ? $motdirect->descriptionWAr : $motdirect->descriptionWFr !!}</p>
                    </div>
                </div>
                <div class="image-container">
                    <img src="{{ s3Asset($motdirect->imgUrl) }}" alt="Image" class="image" style="object-fit: cover;">
                </div>
            </div>
        @else
            <div class="container pt-0">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="text-muted">{{ __('messages.not_available') }}</h1>
                </div>
            </div>
        @endif
    </div>
@endsection
