@extends('welcome')

@section('title')
    {{ __('messages.detail') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('stylePresentation.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">


            {!! app()->getLocale() === 'ar' ? $actual->titleAR : $actual->titleFR !!}

        </h2>


        <div class="flex-container">
            <div class="div1" style="display: flex
;
    flex-direction: column;
    margin-bottom: 90px;">



                <div class="image-section" style="overflow: hidden; border-radius: 10px;">
                    <img src="{{ s3Asset($actual->imgUrl) }}" alt="Event Image" class="img-fluid"
                        style="width: 100%; height: 400px; object-fit: fill;">
                </div>
                <h3 class="text" style="font-size: 10;font-weight: 100 ; ">
                    {{ \Carbon\Carbon::parse($actual->created_at)->locale('fr')->isoFormat('dddd D MMMM YYYY') }}
                </h3>





                {!! app()->getLocale() === 'ar' ? $actual->descriptionAR : $actual->descriptionFR !!}





            </div>
            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
