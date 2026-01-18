@extends('welcome')

@section('title')
    {{ __('messages.contact_location') }}
@endsection
@section('css')
    <link rel="stylesheet" href="stylePresentation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .texte {
            padding-top: 40px;
            padding-bottom: 20px;
            font-family: 'Poppins';
            color: #296333;
        }

        .containerr {
            display: flex;
            height: auto;


            overflow: hidden;
        }

        .left,
        .right {
            flex: 1;

        }

        .right {
            padding-top: 100px;
        }



        .left h2,
        .right h2 {
            font-family: 'Poppins';
            margin-bottom: 20px;
            color: #333;
        }

        .left p,
        .right p {
            font-weight: 200;
            font-family: 'Poppins';

            margin-bottom: 15px;
            color: #555;
        }

        .left .info i {
            color: #007A3D;
            font-size: 27px;
            width: 30px;
        }

        .left .info {
            margin-top: 15px;
        }

        .left .info p {
            font-weight: 500;
            font-family: 'Poppins';
            margin-bottom: 8px;
            width: 70%;

        }

        .right form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 15px;
        }

        .input_box {
            width: 100%;
            border-width: 0px 0px 1px 0px;
            border-style: solid;
            margin-top: 30px;
            position: relative;
        }

        .input_box input {
            width: 100%;
            border: none;
            outline: none;
            font-size: 25px;
            padding: 7px 0px;
            line-height: 10px;
        }

        .input_box label {
            position: absolute;
            left: 0px;
            font-size: 20px;
            font-weight: 200;
            top: 8px;
            pointer-events: none;
            transition: 0.2s;
        }

        .input_box input:focus,
        .input_box label {
            top: -15px;
            font-size: 18px;
            color: black;
        }



        .input_box textarea {
            width: 100%;
            border: none;
            height: 30px;
            outline: none;
        }

        .right button {
            margin-top: 20px;
            align-self: flex-end;
            padding: 10px 20px;
            border: none;
            background-color: #007A3D;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .right button:hover {
            background-color: hsl(31, 77%, 52%);
        }

        /* Add these responsive styles */
        @media screen and (max-width: 768px) {
            .containerr {
                flex-direction: column;
            }

            .left,
            .right {
                flex: 1;
                width: 100%;
            }

            .right {
                padding-top: 40px;
            }

            .form-group {
                flex-direction: column;
                gap: 0;
            }

            .input_box input {
                font-size: 18px;
            }

            .input_box label {
                font-size: 16px;
            }

            .left .info p {
                width: 90%;
            }

            .texte {
                padding-top: 20px;
            }
        }

        @media screen and (max-width: 480px) {
            .input_box input {
                font-size: 16px;
            }

            .input_box label {
                font-size: 14px;
            }

            .left h2,
            .right h2 {
                font-size: 20px;
            }

            .texte {
                font-size: 24px;
            }
        }

        [dir="rtl"] .container {
            text-align: right;
        }

        [dir="rtl"] .texte {
            text-align: right;
        }

        [dir="rtl"] .left h2,
        [dir="rtl"] .right h2 {
            text-align: right;
        }

        [dir="rtl"] .left p,
        [dir="rtl"] .right p {
            text-align: right;
        }

        [dir="rtl"] .left .info {
            text-align: right;
        }

       

        [dir="rtl"] .input_box label {
            right: 0;
            left: auto;
        }

        [dir="rtl"] .right button {
            align-self: flex-start;
        }

        [dir="rtl"] .info i {
            margin-left: 10px;
            margin-right: 0;
        }
    </style>
@endsection
@section('content')
    <div class="container" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <h2 class="texte">{{ __('messages.contacteznous') }}</h2>
        @if ($contact)
            <h6 style="font-family: 'Poppins';font-size: 18px;font-weight: 200;padding-bottom: 20px  "> {{ __('messages.Ctitle') }}</h6>
            <div class="containerr">
                <!-- Left Section -->
                <div class="left">
                    <h2>{{ __('messages.infocontact') }}</h2>
                    <p>{{ __('messages.bnjcontact') }}</p>
                    <div class="info">
                        <div style="display: flex;  justify-items: center;padding-bottom: 10px">
                            <i class="icon fa fa-volume-control-phone "></i>
                            <p> {{ $contact->telephone }}</p>
                        </div>
                        <div style="display: flex;  justify-items: center; padding-bottom: 10px">
                            <i class="icon fa fa-envelope-open"></i>
                            <p> {{ $contact->email }}</p>
                        </div>
                        <div style="display: flex;  justify-items: center; padding-bottom: 10px">
                            <i class="icon fa fa-map-o"></i>
                            <p> {{ $contact->adressFR }}</p>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="right">

                    <form action="{{ route('contactm.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="input_box">
                                <label for="last_name">{{ app()->getLocale() === 'fr' ? 'Nom' : 'الإسم' }}</label>
                                <input type="text" id="last_name" name="last_name" required>
                            </div>
                            <div class="input_box">
                                <label for="first_name">{{ app()->getLocale() === 'fr' ? 'Prenom' : 'الاسم الأول' }}</label>
                                <input type="text" name="first_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input_box">
                                <label for="email">{{ app()->getLocale() === 'fr' ? 'Email' : 'بريد إلكتروني' }}</label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input_box">
                                <label
                                    for="phone">{{ app()->getLocale() === 'fr' ? 'Numéro de téléphone' : 'رقم الهاتف' }}</label>
                                <input type="text" name="phone" required>
                            </div>
                        </div>
                        <div class="input_box">
                            <label for="message">{{ app()->getLocale() === 'fr' ? 'Message' : 'رسالة' }}</label>
                            <textarea name="message" required></textarea>
                        </div>
                        <button type="submit">{{ app()->getLocale() === 'fr' ? 'Envoyer' : 'أرسل ' }}</button>
                    </form>
                </div>
            </div>
            {{-- <div class="hover-card px-2 ">
                    <div class="icon-text-row">
                        <i class="icon fa fa-mobile" ></i> <!-- Replace with your icon class -->
                        <span class="text" style="color: white">Telephone</span>
                    </div>
                    <p class="description" style="color: white">{{$contact->telephone}}</p>
                </div>
                <div class="hover-card px-2 ">
                    <div class="icon-text-row">
                        <i class="icon fa fa-map-o"></i> <!-- Replace with your icon class -->
                        <span class="text" style="color: white">Adresse</span>
                    </div>
                    <p class="description" style="color: white">{{$contact->boitePostaleFR}}</p>

                    <p class="description" style="color: white">{{$contact->adressFR}}</p>
                </div>
                <div class="hover-card px-2 ">
                    <div class="icon-text-row">
                        <i class="icon fa fa-envelope-open"></i> <!-- Replace with your icon class -->
                        <span class="text " style="color: white">Email Direct</span>
                    </div>
                    <p class="description"style="color: white"> {{$contact->email}}</p>
                </div> --}}
            <br>
            <div id="mapid" class="center-block p-3" style="width: 100%; height: 350px;;">

                <script>
                    var map = L.map('mapid');

                    // var marker = L.marker([18.0885743,-15.9744849]).addTo(map);
                    // var icon = new L.Icon();
                    // icon.options.shadowSize = [0,0];
                    // icon.options.iconSize = [20, 40];
                    // icon.options.iconAnchor = [10, 70];
                    // icon.options.iconUrl = "{{ asset('image/marker.png') }}";
                    var greenIcon = new L.Icon({
                        iconUrl: '{{ asset('image/marker.png') }}',
                        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                        iconSize: [30, 46],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        shadowSize: [41, 41]
                    });
                    L.marker([{{ $contact->alt }}, {{ $contact->longe }}], {
                        icon: greenIcon
                    }).addTo(map);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                    }).addTo(map);
                    map.setView(new L.LatLng({{ $contact->alt }}, {{ $contact->longe }}), 13);
                </script>
            </div>
            <br>
        @else
            <div class="text-center p-4">
                <span class="text-muted">{{ __('messages.not_available') }} </span>
            </div>
        @endif
    </div>
@endsection
