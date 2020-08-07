@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6 border border-warning py-3 my-4 rounded-lg shadow-lg">
      <h3 class="text-center mt-4">Sign in</h3>
      <p class="text-center mb-4">Let's start something beautiful'</p>
      <form method="POST" action="{{ route('login') }}" class="row">
          @csrf
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
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <div class="px-5 mb-3 d-flex justify-content-between">
            <div class="form-check m-1">
              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
              </label>
            </div>
            @if (Route::has('password.request'))
              <a class="link-warning p-0" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
            @endif
          </div>
          <div class="px-5 mb-3">
            <button type="submit" class="btn btn-warning w-100 py-2">Sign in</button>
            <p class="text-center mt-3">Don't have an account yet? <a class="link-warning" href="{{ route('register') }}">Sign Up</a></p>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
