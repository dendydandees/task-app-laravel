@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6 border border-warning py-3 rounded-lg shadow-lg">
      <h5 class="text-center p-3">Reset Password</h5>
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif
      <form method="POST" action="{{ route('password.email') }}" class="row">
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
            <button type="submit" class="btn btn-warning w-100 py-2">Send Password Reset Link</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
