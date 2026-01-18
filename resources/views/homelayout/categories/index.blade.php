@extends('welcome')
@section('title')
    {{ __('messages.Documents') }}
@endsection

@section('content')
<div class="container mt-3">
    <h1>Catégories</h1>
    
    <div class="list-group">
        @foreach($categories as $category)
        <a href="{{ route('categories.chart', $category) }}" class="list-group-item list-group-item-action">
            {{ $category->name }}
            <span class="badge  rounded-pill float-end" style="    color: #0DA853 !important;">
                {{ $category->titles_count }} titles
            </span>
        </a>
        @endforeach
    </div>
</div>
@endsection