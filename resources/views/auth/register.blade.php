@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6 border border-warning py-3 my-4 rounded-lg shadow-lg">
      <h3 class="text-center mt-4">Sign up</h3>
      <p class="text-center mb-4">Let's start something beautiful'</p>
      <form method="POST" action="{{ route('register') }}" class="row">
          @csrf
          <div class="px-5 mb-3">
              <label for="name" class="form-label">Name</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="px-5 mb-3">
              <label for="email" class="form-label">E-mail Address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>
          <div class="px-5 mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="px-5 mb-3">
            <label for="password-confirm" class="form-label">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
          </div>
          <div class="px-5 my-3">
            <button type="submit" class="btn btn-warning w-100 py-2">Sign up</button>
            <p class="text-center mt-3">Already have an account? <a class="link-warning" href="{{ route('login') }}">Sign In</a></p>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
