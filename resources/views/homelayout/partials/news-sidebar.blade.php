<div class="div2">
    <h2 class="texte" style="font-size: 25px">{{ __('messages.news') }}</h2>
    @if ($actualites && $actualites->count() > 0)

        <div class="container mb-4">
            @foreach ($actualites as $actualite)
                <div class="row act" style="margin-bottom: 10px">
                    <div class="col-md-4 d-flex image " >
                        <img src="{{ s3Asset($actualite->imgUrl) }}" alt="Image description" class="img-fluid"
                            style="object-fit: fill; border-radius: 10px; width: 100%; height: 100%;">
                    </div>

                    <div class="col-md-8 column d-flex " style="padding-left: 0;height:100px ;     flex-direction: column;
    align-items: start;">
                       
                            <h6 class="" style="font-size: 10px;font-family:'Inter';font-weight: 300">
                                {{ \Carbon\Carbon::parse($actualite->created_at)->locale('fr')->isoFormat('dddd | D MMMM YYYY') }}
                            </h6>
                            <p class="snippet"
                                style="font-size: 12px;font-family:'Inter';margin-bottom: 0;text-align: justify;">
                                {!! app()->getLocale() == 'ar'
                                    ? strip_tags(Str::limit($actualite->descriptionAR, 80))
                                    : strip_tags(Str::limit($actualite->descriptionFR, 80)) !!}
                            </p>
                            <button class="card-button" style="font-size: 10px; padding: 0;"
                                onclick="window.location.href='{{ route('actualite.details', ['actualite' => $actualite->id]) }}'">
                                {{ __('messages.learn_more') }} <span class="card-icon" style="font-size: 7px"><i
                                        class="fa {{ app()->getLocale() == 'ar' ? 'fa-chevron-left' : ' fa-chevron-right' }}"></i></span>
                            </button>
                   
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="text-center p-4">
            <span class="text-muted">{{ __('messages.not_available') }}</span>
        </div>

    @endif
</div>
