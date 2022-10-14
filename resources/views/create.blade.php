@extends('layout')
@section('title','Create post')


@section('content')
<h1>Create a New Blog Post</h1>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf
    <label>Title</label>
    <input class="@error('title') error-border @enderror" type="text" name="title" value="{{old('title')}}">
    <!-- print all errors related to the title  -->
    @error('title')
    <div class="error">
        {{$message}}
    </div>
    @enderror

    <label>Description</label>
    <textarea class="@error('description') error-border @enderror" name="description">{{old('description')}}</textarea>

    <!-- print all errors related to the description  -->
    @error('description')
    <div class="error">
        {{$message}}
    </div>
    @enderror

    <button type="submit">Submit</button>
</form>
@endsection