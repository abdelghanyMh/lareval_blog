@extends('layout')

@section('title', $post->title)

@section('content')
<div class="post-item">
    <div class="post-content">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->description }}</p>
        <a href="{{ route('posts.edit', ['post' => $post->id]) }}">Edit post</a>
        <form method="POST" action="{{ route('posts.destroy', ['post' => $post->id]) }}">
            @csrf
            @method('DELETE')
            <button class="delete" type="submit">Delete post</button>
        </form>

    </div>
</div>
@endsection