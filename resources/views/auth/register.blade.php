@extends('layout')

@section('title', 'Register')

@section('content')
<h1>Register</h1>

<form method="POST" action="{{ route('register') }}">
  @csrf

  <label>Name</label>
  <input class="@error('name') error-border @enderror" type="text" name="name" value="{{ old('name') }}">
  @error('name')
    <div class="error">
      {{ $message }}
    </div>
  @enderror

  <label>Email</label>
  <input class="@error('email') error-border @enderror" type="text" name="email" value="{{ old('email') }}">
  @error('email')
    <div class="error">
      {{ $message }}
    </div>
  @enderror

  <label>Password</label>
  <input class="@error('password') error-border @enderror" type="password" name="password">
  @error('password')
    <div class="error">
      {{ $message }}
    </div>
  @enderror

  <button type="submit">Register</button>

  If you already have an account <a href="{{ route('login') }}">login</a>.
</form>
@endsection
