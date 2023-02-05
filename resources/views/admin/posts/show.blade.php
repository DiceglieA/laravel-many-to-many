@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        @if ($post->category)
            <h2>in: <a href="{{ route('admin.categories.show', ['category' => $post->category]) }}">{{ $post->category->name }}</a></h2>
        @endif

        @if ($post->tags->all())
            <h2>
                I Tags sono:
                @foreach ($post->tags as $tag)
                    <a href="{{ route('admin.tags.show', ['tag' => $tag])}}">{{ $tag->name}}</a>{{ $loop->last ? '' : ', ' }}
                @endforeach
            </h2>
        @endif
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
        <p>
            {{ $post->content }}
        </p>
    </div>
@endsection
