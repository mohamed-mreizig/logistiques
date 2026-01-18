@extends('welcome')
@section('title')
    {{ __('messages.partners') }}
@endsection
@section('css')
    <link rel="stylesheet" href="/stylePresentation.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .logo-wrapper {
            display: inline-block;
            position: relative;
            cursor: pointer;
        }

        .logo-wrapper:hover::after {
            content: attr(title);
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 1000;
        }

        .partner-slider {
            position: relative;
            overflow: hidden;
            padding: 20px 0;
        }

        .partner-track {
            display: flex;
            transition: transform 0.5s ease;
            gap: 30px;
        }

        .logo-wrapper {
            flex: 0 0 200px;
            text-align: center;
        }

        .logo-image {
            max-width: 100%;
            height: auto;
        }

        .partner-controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
    </style>
    <script>
        $(document).ready(function() {
            let position = 0;
            const track = $('.partner-track');
            const items = $('.logo-wrapper');
            const itemWidth = 230; // 200px width + 30px gap
            const visibleItems = Math.floor($('.partner-slider').width() / itemWidth);

            $('.partner-next').click(function() {
                console.log('Next clicked');
                if (position > -(items.length - visibleItems) * itemWidth) {
                    position -= itemWidth;
                    track.css('transform', `translateX(${position}px)`);
                }
            });

            $('.partner-prev').click(function() {
                console.log('Prev clicked');
                if (position < 0) {
                    position += itemWidth;
                    track.css('transform', `translateX(${position}px)`);
                }
            });
        });
    </script>
@endsection
@section('content')
    <div class="container logo-section">
        <h2 class="logo-title">{{ __('messages.partners') }}</h2>
        @if ($partners && $partners->count() > 0)
            <div class="partner-slider">
                <div class="partner-track">
                    @foreach ($partners as $partner)
                        @if ($partner->isPublished)
                            <div class="logo-wrapper" title="{!! app()->getLocale() == 'ar' ? $partner->titleAr : $partner->titlefr !!}">
                                <img src="{{ s3Asset($partner->imgUrl) }}" alt="{{ $partner->titlefr }}" class="logo-image">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="projet-slider-button-container">
                <button class="projet-slider-button partner-prev">&#10094;</button>
                <button class="projet-slider-button partner-next">&#10095;</button>
            </div>
        @else
            <div class=" container pt-0">
                <div class="d-flex justify-content-center align-items-center">
                    <h1 class="text-muted">{{ __('messages.not_available') }}</h1>
                </div>
            </div>
        @endif
    </div>

@endsection
