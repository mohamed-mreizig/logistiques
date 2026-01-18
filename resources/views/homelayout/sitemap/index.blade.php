@extends('welcome')
@section('title')
{{ __('messages.sitemap') }}
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('home/sitemap.css') }}">
@endsection
<style>
  .t::before{
    left: -142px !important;
  }
  /* Add this to your existing sitemap CSS */
.fourth {
    position: relative;
    padding-left: 20px;
}

.fourth::before {
    content: '';
    position: absolute;
    top: -4px;
    left: 0;
    border-left: 1px solid #ccc;
    height: 100%;
}

.fourth li {
    position: relative;
    padding-left: 15px;
}

.fourth li::before {
    content: '';
    position: absolute;
    top: 10px;
    left: 0;
    width: 10px;
    border-top: 1px solid #ccc;
}
</style>

@section('content')
<div class="container ">
    <h2 class="texte">{{ __('messages.sitemap') }}</h2>
    <nav class="sitemap scrollable-div">
      <ul class="first">
        <li><a href="{{ url('/') }}"> {{ __('messages.home') }}</a>
          <ul class="second">
            <li><a class="t" href="#">{{ __('messages.snis') }}</a>
              <ul class="third">
                <li><a href="{{ url('/presentation') }}">{{ __('messages.mission_role_objective') }}</a></li>
                <li><a href="{{ url('/direct') }}">{{ __('messages.coordinator_message') }}</a></li>
                <li><a href="{{ url('/sitemap') }}">{{ __('messages.sitemap') }}</a></li>
              </ul>
            </li>
            <li><a href="#">{{ __('messages.about') }}</a>
              <ul class="third">
                <li><a href="{{ url('/historique') }}">{{ __('messages.history') }}</a></li>
                <li><a href="{{ url('/organigramme') }}">{{ __('messages.organizational_chart') }}</a></li>
                <li><a href="{{ url('/contact') }}">{{ __('messages.contact_location') }}</a></li>
              </ul>
            </li>
            <li><a href="#">{{ __('messages.services') }}</a>
              <ul class="third">
                @if($serviceVar && $serviceVar->count() > 0)
                  @foreach($serviceVar as $typeS)
                    <li><a href="{{ url('service/' . $typeS->id) }}">{{ $typeS->type }}</a></li>
                  @endforeach
                @else
                  <li><a href="#">{{ __('messages.not_available') }}</a></li>
                @endif
              </ul>
            </li>
            <li><a class="t" href="#"> {{ __('messages.data_stats') }}</a>
              <ul class="third">
                <li><a href="{{ url('test/') }}">{{ __('messages.database') }}</a></li>
                <li><a href="{{ url('test/') }}">{{ __('messages.dashboard') }}</a></li>
                <li><a href="{{ url('test/') }}">{{ __('messages.dashboard') }}</a></li>
              </ul>
            </li>
            <li><a href="#"> {{ __('messages.publications') }}</a>
              <ul class="third">
                @if($sharedVar && $sharedVar->count() > 0)
                  @foreach($sharedVar as $type)
                    <li><a href="{{ url('docs/' . $type->id) }}">{{ $type->type }}</a></li>
                  @endforeach
                @else
                  <li><a href="#">{{ __('messages.not_available') }}</a></li>
                @endif
              </ul>
            </li>
            <li><a href="#"> {{ __('messages.other') }}</a>
              <ul class="third">
                <li><a href="#"> {{ __('messages.projects_programs') }}</a>
                  <ul class="fourth">
                    <li><a href="{{ url('/project') }}"> {{ __('messages.project_management') }}</a></li>
                    <li><a href="{{ url('/partenair') }}"> {{ __('messages.partners') }}</a></li>
                  </ul>
                </li>
                <li><a href="#"> {{ __('messages.training_events') }}</a>
                  <ul class="fourth">
                    <li><a href="{{ url('/events') }}"> {{ __('messages.event_management') }}</a></li>
                    <li><a href="{{ route('moocs.index') }}"> {{ __('messages.mooc') }}</a></li>
                  </ul>
                </li>
                <li><a href="#"> {{ __('messages.resources') }}</a>
                  <ul class="fourth">
                    @if($ressource && $ressource->count() > 0)
                      @foreach($ressource as $res)
                        <li><a href="{{ Str::startsWith($res->linkurl, ['http://', 'https://']) ? $res->linkurl : 'https://' . $res->linkurl }}" target="_blank" rel="noopener noreferrer">{{ $res->titleFr }}</a></li>
                      @endforeach
                    @else
                      <li><a href="#"> {{ __('messages.not_available') }}</a></li>
                    @endif
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
@endsection
