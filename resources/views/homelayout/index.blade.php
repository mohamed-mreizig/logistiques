@extends('welcome')
@section('title')
    {{ __('messages.home') }}
@endsection
@section('css')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="https://code.jquery.com/jquery-1.8.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            console.log("jQuery is working!");
        });
        function handleCardClick(eventId) {
            // console.log('Event ID:', eventId);
            // Redirect to another page or perform some other action
            window.location.href = `/events/${eventId}`;
        }
    </script>
    <script src="home/script.js"></script>

    <style>
        .carde {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .icone {
            font-size: 25px !important;
            color: #007bff;

        }

        .number {
            font-size: 32px;
            font-weight: bold;
        }

        .percent {
            font-size: 24px;
            color: #0DA853;
        }

        .titlee {
            font-size: 18px;
            font-weight: 600;
        }

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
    @if ($settings && $settings->count() > 0)
    <div class="slider-container">
        @foreach ($settings as $setting)
            <div class="slide {{ $loop->first ? 'active' : '' }}"
                style="background-image: url('{{ s3Asset($setting->image) }}');">
                <div class="container" style="height: 100%; padding-left: 0px;">
                    <div class="content">
                        <h1>{{ Str::limit( $setting->title ,63)}}</h1>
                        <p>{{ Str::limit($setting->description ,126) }}</p>
                        <button class="arrow-button" onclick="handleButtonClick('{{ $setting->url ?: route('carousel.index', ['type' => $setting->id]) }}')">
                            {{ __('messages.detail') }} <span class="card-icon"><i
                                    class="fa  {{ app()->getLocale() == 'ar' ? 'fa-chevron-left' : ' fa-chevron-right' }}"></i></span></button>
                    </div>
                </div>
            </div>
        @endforeach
    
        <div class="slider-buttons">
            <button class="prev">&#10094;</button>
            <button class="next">&#10095;</button>
            <div class="bt-counter">
                <span id="counter-text"></span>
            </div>
        </div>
    </div>
    @endif

    @if ($actualites && $actualites->count() > 0)
        <div class="container acualite">
            <h1> {{ __('messages.news') }} </h1>
            <button class="acualite-button"
                onclick="window.location.href='{{ route('actualites.index') }}'">{{ __('messages.voirtout') }}<span
                    class="acualite_arrow">{!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!}</span></button>

        </div>
        <div class="container">

            <div class="card-container">
                @foreach ($actualites as $actualite)
                    <div class="card">

                        <img src="{{ s3Asset($actualite->imgUrl) }}" alt="Card Image" class="card-image">
                        <h3 class="card-title">
                            {{ app()->getLocale() == 'ar' ? $actualite->titleAR : $actualite->titleFR }}</h3>
                        <p class="card-description">{!! strip_tags(
                            app()->getLocale() == 'ar' ? $actualite->descriptionAR : Str::limit($actualite->descriptionFR,300) ,
                            '<p><br><strong><em><ul><li><ol><a>',
                        ) !!} </p>
                        <button class="card-button"
                            onclick="window.location.href='{{ route('actualite.details', ['actualite' => $actualite->id]) }}'">
                            {{ __('messages.detail') }} <span class="card-icon"><i
                                    class="fa  {{ app()->getLocale() == 'ar' ?    'fa-chevron-left' :' fa-chevron-right'}}"></i></span></button>
                    </div>
                @endforeach

            </div>
        </div>
    @endif
    @if ($motdirect && $motdirect->count() > 0)
        <div class="container " style="height: 100%">
            <div class="mot_direct">
                <div class="desc">
                    <h6>{{ __('messages.motdirect') }} </h6>
                    <h1 class="title">{{ app()->getLocale() == 'ar' ? $motdirect->NameWAr : $motdirect->NameWFr }}</h1>
                    <div class="descr">
                        <p class="description">
                            {{-- {!! preg_replace('/<p[^>]*>|<\/p>/', '', ) !!} --}}
                            {!! preg_replace(
                                '/<div[^>]*>|<\/div>/',
                                '',
                                Str::limit(app()->getLocale() == 'ar' ? $motdirect->descriptionWAr : $motdirect->descriptionWFr, 600),
                            ) !!}
                        </p>

                    </div>
                    <hr class="solid">
                    <button class="text-button"
                        onclick="window.location.href='{{ route('direct.index') }}'">{{ __('messages.Lireplus') }}
                        <span class="text-icon">{!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!}</span> </button>
                </div>
                <div class="image-container">
                    <img src="{{ s3Asset($motdirect->imgUrl) }}" alt="Image" class="image" style="    object-fit: cover;">
                </div>
            </div>
        </div>
    @endif

    @if ($events && $events->count() > 0)
        <div class="container">
            <div class="event-card-container">
                <div class="event-head {{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">

                    <div class="event-head-content">
                        <span class="event-head-label">{{ __('messages.calendre') }}</span> <br>
                        <span class="event-head-title">{{ __('messages.evtext') }}</span><br>
                        <p class="event-head-desc">{{ __('messages.evdesc') }}</p>
                    </div>
                
                    <button class="event-button"  style="    justify-content: space-around;" onclick="window.location.href='{{ route('events.index') }}'">
                        {{ __('messages.evB') }}<span class="event-arrow">
                            <i class="fa {{ app()->getLocale() == 'ar' ? 'fa-arrow-circle-left' : 'fa-arrow-circle-right' }}"></i>
                        </span>
                    </button>
                
                </div>
                <!-- Add more cards as needed -->

                @php
                    $i = 0;
                @endphp
                @foreach ($events as $event)
                    @if ($loop->first || $loop->index % 3 === 0)
                        <!-- Start a new group -->
                        <div class="event-group" id="event-card-{{ $i }}">
                            @php
                                $i++;
                            @endphp
                    @endif

                    <div class="event-card" onclick="handleCardClick({{ $event->id }})">
                        <div class="event-content">
                            <span class="event-title"> {!! app()->getLocale() == 'ar' ? $event->titleAr : $event->titleFR !!} </span><br>
                            <span
                                class="event-date">{{ Carbon\Carbon::parse($event->start_at)->locale('fr')->isoFormat('LL') }}</span>
                            <br>
                            <p class="event-description">
                                {!! preg_replace(
                                    '/<div[^>]*>|<\/div>/',
                                    '',
                                    Str::limit(app()->getLocale() == 'ar' ? $event->descriptionAr : $event->descriptionfr, 110),
                                ) !!}</p>
                        </div>
                        <div class="event-image-container">
                            <img src="{{ s3Asset($event->imageurl) }}" alt="Event Image" class="event-image">
                            <div class="icon-container" style="background:url('{{ asset('assets_home/icon.png') }}')">
                            </div>
                        </div>
                    </div>

                    @if ($loop->iteration % 3 === 0 || $loop->last)
                        <!-- Close the group -->
            </div>
    @endif
    @endforeach


    </div>

    <div class="slider-buttons-event">
        <button class="slider-button-event ev-prev">

            <span>{!! app()->getLocale() == 'ar' ? '&rarr;' : '&larr;' !!} </span>
            <div>{{ __('messages.previous') }}</div>
        </button>
        <button class="slider-button-event ev-next">
            <div>{{ __('messages.next') }}</div> <span> {!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!} </span>
        </button>
    </div>

    </div>
    @endif


    @if ($doc && $doc->count() > 0)
        <div class="document-screen">
            <div class="document-content">
                <span class="document-title">{{ __('messages.Documents') }}</span>
                <span class="document-text">{{ __('messages.doctext') }}</span>
            </div>
            <div class="document container">
                <div class="document-slider">
                    @foreach ($doc as $item)
                        @if ($loop->first || $loop->index % 3 === 0)
                            <!-- Start a new group -->
                            <div class="document-card-container ">
                        @endif
                        <div class="doc-slide">
                            <div class="card">
                                <div class="card-image" style="background-image: url('{{ asset('image/doc.jpeg') }}');">
                                </div>
                                <div class="card-footer">
                                    <h3 class="footer-title">{{ $item->type }}</h3>
                                    <button class="card-button"
                                        onclick="window.location.href='{{ url('docs/' . $item->id) }}'">
                                        {{ __('messages.Dplus') }}<span class="card-icon"><i
                                                class="fa {{ app()->getLocale() == 'ar' ? ' fa-arrow-circle-left' : 'fa-arrow-circle-right' }}"></i></span>
                                    </button>

                                </div>
                            </div>
                        </div>
                        @if ($loop->iteration % 3 === 0 || $loop->last)
                            <!-- Close the group -->
                </div>
    @endif
    @endforeach
    </div>
    </div>
    <div class="projet-slider-button-container">
        <button class="projet-slider-button doc-prev">&#10094;</button>
        <button class="projet-slider-button doc-next">&#10095;</button>
    </div>
    </div>
    @endif

    @if ($projects && $projects->count() > 0)
        <div class="container projet-screen">
            <div class="projet-content">
                <span class="projet-title">{{ __('messages.Projets') }}</span>
                <span class="projet-text">{{ __('messages.Ptext') }}</span>
            </div>

            <div class="container pb-5">
                @foreach ($projects as $projet)
                    @if ($loop->first || $loop->index % 3 === 0)
                        <!-- Start a new group -->
                        <div class="projet-card-container ">
                    @endif
                    <div class="projet-card">
                        <img src="{{ s3Asset($projet->imgUrl) }}" alt="Card Image" class="projet-card-image">
                        <h3 class="projet-card-title">{!! app()->getLocale() == 'ar' ? $projet->titleAr : $projet->titleFr !!} </h3>
                        <p class="projet-card-description">
                            {{-- {!! $projet->descriptionFR !!} --}}
                            {!! strip_tags(
                                
                             
                                Str::limit(app()->getLocale() == 'ar' ? $projet->descriptionAr : $projet->descriptionFR, 110),
                                '',
                             
                            ) !!}
                        </p>
                        <button class="card-button"
                            onclick="window.location.href='{{ route('project.details', ['projet' => $projet->id]) }}'">
                            {{ __('messages.Dplus') }}<span class="card-icon"><i
                                    class="fa {{ app()->getLocale() == 'ar' ? ' fa-arrow-circle-left' : 'fa-arrow-circle-right' }}"></i></span></button>
                    </div>


                    @if ($loop->iteration % 3 === 0 || $loop->last)
                        <!-- Close the group -->
            </div>
    @endif
    @endforeach


    <div class="projet-slider-button-container">
        <button class="projet-slider-button nextp">&#10094;</button>
        <button class="projet-slider-button prevp">&#10095;</button>
    </div>

    </div>
    </div>
    @endif
    @if ($indicators && $indicators->count() > 0)
        <div class=" d-flex flex-column mt-5 pb-5 " style="background-color: #F5F8FA;">
            <div class="container">
                <div class="container acualite externallink" style="padding-top: 70px;">
                    <h1> {{ __('messages.indicateurs') }}</h1>
                    <button class="acualite-button" onclick="window.location.href='{{ route('indicators.public') }}'">
                        {{ __('messages.voirtout') }}<span class="arrow" style=" position: static;">{!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!}</span>
                    </button>
                </div>
                <div class="row justify-content-center">
                    @foreach ($indicators->take(6) as $indicator)
                        @if ($indicator->is_published)
                            <div class="col-md-4 {{ !$loop->first && $loop->iteration > 3 ? 'mt-4' : '' }}">
                                <div class="carde">
                                    <div class="d-flex" style="justify-content: center;align-items: center;gap: 20px;">
                                        <div class="d-flex justify-content-center align-items-center" style="gap: 2px">
                                            <div class="number">{{ $indicator->value }}  </div>
                                            <div class="percent">%</div>
                                        </div>
                                        <i class="icone fa {{ $indicator->icon }}"></i>
                                    </div>
                                    <div class="titlee">{{ $indicator->title }} / {{ $indicator->categorie ? $indicator->categorie : "Non définie"}}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if ($partners && $partners->count() > 0)
        <div class="container logo-section">
            <h2 class="logo-title">{{ __('messages.partners') }}</h2>
            <div class="partner-slider">
                <div class="partner-track">
                    @foreach ($partners as $partner)
                        @if ($partner->isPublished)
                            <div class="logo-wrapper" title="{!! app()->getLocale() == 'ar' ? $partner->titleAr : $partner->titlefr !!} ">
                                <img src="{{ s3Asset($partner->imgUrl) }}" alt="{{ $partner->titlefr }}"
                                    class="logo-image">
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="projet-slider-button-container">
                <button class="projet-slider-button partner-prev">&#10094;</button>
                <button class="projet-slider-button partner-next">&#10095;</button>
            </div>
        </div>
    @endif

    <div class="document-screen" style="padding-bottom: 30px">
        @if ($externalLinks && $externalLinks->count() > 0)
            <div class="container acualite externallink" style="padding-top: 70px;">
                <h1>{{ __('messages.liens') }} </h1>
                {{-- <button class="acualite-button">Voir tout<span class="arrow">&rarr;</span></button> --}}
            </div>
            <div class="container">
                <div class="wrapper lienrapide">
                    @foreach ($externalLinks as $link)
                        @if ($link->ispublished)
                            <div class="item">
                                <div class="item-content">
                                    <img src="./assets_home/i1.png" alt="Icon" class="icon">
                                    <span class="text">{{ $link->title }}</span>
                                </div>
                                <button class="arrowe-button right-arrow"
                                    onclick="window.location.href='{{ $link->url }}'">{!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!}</button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif

        {{-- <div class="container">
            <div class="square-container ">
                <!-- First div with image -->
                <div class="square-item image-item">
                    <img src="./assets_home/s1.png" alt="Image 1" class="square-image">
                </div>
                <!-- Second div with title, description, and button -->
                <div class="square-item content-item">
                    <div class="square-text">

                        <h3 class="square-title">{{ __('messages.SNIS') }} </h3>
                        <p class="square-description">{{ __('messages.squaretext') }}</p>

                        <button class="card-button">{{ __('messages.button') }}<span
                                class="card-icon">{!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!}</span></button>
                    </div>

                </div>
                <!-- Third div with image -->
                <div class="square-item content-item">
                    <div class="square-text">
                        <h3 class="square-title">{{ __('messages.SNIS') }}</h3>
                        <p class="square-description">{{ __('messages.squaretext2') }}</p>

                        <button class="card-button">{{ __('messages.button') }}<span
                                class="card-icon">{!! app()->getLocale() == 'ar' ? '&larr;' : '&rarr;' !!} </span></button>
                    </div>

                </div>
                <!-- Fourth div with title, description, and button -->
                <div class="square-item image-item">
                    <img src="./assets_home/s2.png" alt="Image 2" class="square-image">
                </div>
            </div>


        </div> --}}
    </div>
@endsection
