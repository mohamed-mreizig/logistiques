@extends('welcome')

@section('title')
    404 - Page Not Found
@endsection

@section('content')
<div class="container">
    <div style="text-align: center; padding: 50px 0;">
        <h1 style="font-size: 120px; margin: 0; color: #333;">404</h1>
        <h2 style="font-size: 30px; margin: 20px 0; color: #666;">Page Not Found</h2>
        <p style="color: #888; margin-bottom: 30px;">La page que vous recherchez a peut-être été supprimée, son nom a changé ou est temporairement indisponible.</p>
        <a href="{{ url('/') }}" style="
            display: inline-block;
            padding: 12px 30px;
            background-color: #0DA853;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        ">Retour à la page d'accueil</a>
    </div>
</div>
@endsection