@extends('administration.layouts.app')
{{-- @section('title', 'administration')
@section('content-header', 'administration')
@section('content-action')
@endsection
--}}

@section('pagecontent')
    <div class="container">
        <div class="page-inner">

            <div class="page-header" style="justify-content: space-between; align-items: center;">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Parametre') }}
                </h2>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('parametres.index', '#section1') }}">Mots directeur</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-down"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('parametres.index', '#section2') }}">Contact</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-down"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('parametres.index', '#section3') }}">organigramme</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-down"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('parametres.index', '#section4') }}">historique</a>

                    </li>
                    <li class="separator">
                        <i class="icon-arrow-down"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('parametres.index', '#section5') }}">Mission</a>


                    </li>
                </ul>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const hash = window.location.hash;
                    if (hash) {
                        const element = document.querySelector(hash);
                        if (element) {
                            element.scrollIntoView({
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            </script>
            <div class="row">
                <div class="col-md-12" id="section1">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="card-title">
                                {{ __('Mots directeur Information') }}
                            </h2>
                            {{ __('Update your information.') }}
                            <h6></h6>

                        </div>

                        <div class="card-body">
                            @include('administration.pages.parametre.partials.update-motsdirect-form')

                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="section2">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="card-title">
                                {{ __('Update Contact') }}

                            </h2>
                            {{ __('Ensure your account contact is correct.') }}
                            <h6></h6>

                        </div>

                        <div class="card-body">

                            @include('administration.pages.parametre.partials.update-contact-form')


                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="section3">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="card-title">
                                {{ __('Update organigramme') }}


                            </h2>

                            <h6></h6>

                        </div>

                        <div class="card-body">
                            @include('administration.pages.parametre.partials.update-organigramme-form')



                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="section4">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="card-title">
                                {{ __('Update historique') }}


                            </h2>

                            <h6></h6>

                        </div>

                        <div class="card-body">
                            @include('administration.pages.parametre.partials.update-histo-form')




                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="section5">
                    <div class="card">
                        <div class="card-header">

                            <h2 class="card-title">
                                {{ __('Update Mission') }}


                            </h2>

                            <h6></h6>

                        </div>

                        <div class="card-body">
                            @include('administration.pages.parametre.partials.update-mission-form')




                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
