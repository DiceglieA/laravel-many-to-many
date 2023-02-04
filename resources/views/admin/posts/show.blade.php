@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        @if (isset($post->category->name))
            <h2>in: {{ $post->category->name }}</h2>
        @endif
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection
