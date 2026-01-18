@extends('welcome')

@section('title')
    {{ __('messages.history') }}
@endsection
@section('css')
    <link rel="stylesheet" href="./stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">{{ __('messages.history') }} </h2>

        <div class="flex-container">



            {{-- <h3 class="text" style="font-size: 34;font-weight: 100 ; ">{{$histo->histoAr }} </h3> --}}
            <div class="div1">
                @if ($histo)
                    <h4 class="text" style="font-weight: 100 ;text-align: center;text-align:start">
                        {!! app()->getLocale() == 'ar' ? $histo->histoAr : $histo->histoFR !!}
                    </h4>
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
