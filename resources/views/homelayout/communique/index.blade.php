@extends('welcome')

@section('title')
    {{ __('messages.announcements') }}
@endsection
@section('css')
    <link rel="stylesheet" href="stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">{{ __('messages.announcements') }} </h2>


        <div class="flex-container">
            <div class="div1">

                @if ($mission)
                    <h3 class="text" style="font-size: 34 ; ">{{ $mission->titleFr }}</h3>

                    {!! app()->getLocale() === 'ar' ? $mission->descriptionWAr : $mission->descriptionWFr !!}
                @else
                    <div class="text-center p-4">
                        <span class="text-muted">{{ __('messages.not_available') }}</span>
                    </div>
                @endif


            </div>
            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
