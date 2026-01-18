@extends('welcome')

@section('title')
    {{ __('messages.mooc') }}
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
        <h2 class="texte">{{ __('messages.mooc') }}</h2>

        <div class="flex-container">
            <div class="div1" style="display: flex; flex-direction: column; margin-bottom: 90px;">
                <div class="container mb-4">
                    @if ($moocs && $moocs->count() > 0)
                        <div class="row">
                            @foreach ($moocs as $mooc)
                                <div class="col-md-4 col-sm-6 mb-4 pl-0">
                                    <div class="card" style="border: none; background-color: transparent;">
                                        <div class="image-section" style="height: 200px; overflow: hidden;">
                                            <img src="{{ s3Asset($mooc->imageUrl) }}" alt="MOOC Image" class="img-fluid"
                                                style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>

                                        <div class="text-section mt-2">
                                            <h6 class="text-muted"
                                                style="font-size: 14px; font-family: 'Inter'; font-weight: 500;">
                                                {{ app()->getLocale() === 'ar' ? $mooc->titleAr : $mooc->titleFr }}
                                            </h6>
                                            <p class="snippet" style="font-size: 12px; font-family: 'Inter'; ">
                                                {!! app()->getLocale() === 'ar'
                                                    ? $mooc->descriptionAr
                                                    : preg_replace('/<div[^>]*>|<\/div>/', '', $mooc->descriptionFr) !!}
                                            </p>
                                            <button class="card-button"
                                                onclick="window.location.href='{{ route('moocs.details', ['mooc' => $mooc->id]) }}'">
                                                {{ __('messages.Dplus') }} <span class="card-icon" style="font-size: 7px"><i
                                                        class="fa {{ app()->getLocale() == 'ar' ? 'fa-chevron-left' : ' fa-chevron-right' }}"></i></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class=" container pt-0">
                            <div class="d-flex justify-content-center align-items-center">
                                <h1 class="text-muted">{{ __('messages.not_available') }}</h1>
                            </div>
                        </div>
                    @endif

                    @if ($moocs->hasPages())
                        <nav class="mt-3">
                            <ul class="pagination pagination-sm justify-content-left custom-pagination">
                                {{ $moocs->links('pagination::bootstrap-5') }}
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
            @include('homelayout.partials.news-sidebar')
        </div>
    </div>
@endsection
