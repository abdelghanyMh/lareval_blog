@extends('layout')
@section('title','Home')

@section('content')
@forelse ($posts as $post)
<div class="post-item">
    <div class="post-content">
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>
    </div>
</div>
@empty
<!-- define what will happened if the $posts variable is empty  -->
<h2>There are no posts yet...</h2>
@endforelse
@endsection