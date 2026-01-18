@extends('welcome')

@section('title')
    {{ __('messages.organizational_chart') }}
@endsection
@section('css')
    <link rel="stylesheet" href="stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">{{ __('messages.organizational_chart') }}</h2>



        @if ($org)
            {{-- <h3 class="text" style="font-size: 34;font-weight: 100 ; ">{{$histo->histoAr }} </h3> --}}

            <div class="centered-image-container" style="    display: flex;justify-content: center;">
                <img src="{{ s3Asset($org->orgImgUrl) }}" alt="Centered Image">
            </div>
            <h4 class="text" style="font-weight: 100 ;">
                {!! app()->getLocale() == 'ar' ? $org->descriptionorgAR : $org->descriptionorgFR !!}
            </h4>
        @else
            <div class=" container pt-0">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="text-muted">{{ __('messages.not_available') }}</h1>
                </div>
            </div>
        @endif

    </div>
@endsection
