@extends('welcome')

@section('title')
    {{ __('messages.news') }}
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('stylePresentation.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container">
        <h2 class="texte">
            {{ __('messages.news_media') }}

        </h2>


        <div class="flex-container">
            <div class="div1" style="display: flex
;
    flex-direction: column;
    margin-bottom: 90px;">


                <div class="container mb-4">

                    @foreach ($actual as $actualite)
                        <div class="row  act" style="margin-bottom: 10px">
                            <!-- Image Section -->
                            <div class="col-md-4 d-flex image" style="     width: 100%;
    height: 100px; ">
                                <img src="{{ s3Asset($actualite->imgUrl) }}" alt="Image description" class="img-fluid "
                                    style="    object-fit: fill;width: 100%; border-radius: 10px;">
                            </div>

                            <!-- Text Section -->
                            <div class="col-md-8 column d-flex " style="padding-left: 0; height: 100px;
    flex-direction: column;
    align-items: start;">
                                 <h6 class="" style="font-size: 10px;font-family:'Inter';font-weight: 300">
                                    {{ \Carbon\Carbon::parse($actualite->created_at)->locale('fr')->isoFormat('dddd | D MMMM YYYY') }}
                                </h6>
                                </h4>
                                <p class="snippet" style="font-size: 12px;font-family:'Inter';margin-bottom: 0">

                                    {!! app()->getLocale() === 'ar' ? strip_tags($actualite->descriptionAR) : strip_tags($actualite->descriptionFR) !!}
                                </p>
                                {{-- <a href="{{ url('/your-link') }}" class="btn btn-sm btn-primary">Click Me</a> --}}
                                <button class="card-button" style="font-size: 14px;    padding: 0;"
                                    onclick="window.location.href='{{ route('actualite.details', ['actualite' => $actualite->id]) }}'">
                                    Découvrez plus <span class="card-icon" style="font-size: 14px"><i
                                            class="fa fa-chevron-right "></i></span></button>

                            </div>
                        </div>
                    @endforeach

                    @if ($actual->hasPages())
                        <nav class="mt-3">
                            <ul class="pagination pagination-sm justify-content-left custom-pagination">
                                {{ $actual->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    @endif
                </div>







            </div>
            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
