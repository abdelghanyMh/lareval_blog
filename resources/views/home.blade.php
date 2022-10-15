@extends('layout')
@section('title','Home')

@section('content')
@forelse ($posts as $post)
<div class="post-item">
    <div class="post-content">
        <h2><a href="{{ route('posts.show', [ $post]) }}">{{ $post->title }}</a></h2>
        <p>{{ $post->description }}</p>
        <small>Posted by: <b>{{$post->user->name}}</b></small>
    </div>
</div>
@empty
<!-- define what will happened if the $posts variable is empty  -->
<h2>There are no posts yet...</h2>
@endforelse
@endsection