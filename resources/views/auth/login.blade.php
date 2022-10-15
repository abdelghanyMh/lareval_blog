@extends('layout')

@section('title', 'Login')

@section('content')
<h1>Login</h1>
<form method="POST" action="{{ route('login') }}">
  @csrf

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

  <button type="submit">Login</button>
</form>
@endsection
