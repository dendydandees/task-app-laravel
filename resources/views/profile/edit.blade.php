@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6 border border-warning py-3 my-4 rounded-lg shadow-lg">
      <h5 class="text-center mt-4">Manage Account</h5>
      <form method="POST" action="{{ route('profile.update', $user->id) }}" class="row" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="px-5 mb-3">
          <label for="name" class="form-label">Name</label>
          <input id="name" name="name" type="text" maxlength="255" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $user->name }}"/>
          @if ($errors->has('name'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
        </div>
        <div class="px-5 mb-3">
          <label for="email" class="form-label">Email</label>
          <input id="email" name="email" type="text" maxlength="255" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $user->email }}"/>
          @if ($errors->has('email'))
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
        </div>
        <div class="px-5 mb-3">
          <label for="avatar" class="form-label">Foto Profil</label>
          <div class="d-flex justify-content-between align-items-center">
            @if ($user->avatar == null)
              <div class="form-file custom-file flex-fill mr-4">
                <input type="file" class="form-file-input custom-file-input" id="avatar" name="avatar">
                <label class="form-file-label" for="avatar">
                  <span class="form-file-text custom-file-label">Choose file...</span>
                  <span class="form-file-button">Browse</span>
                </label>
              </div>
              <img src="https://ui-avatars.com/api/?name={{$user->name}}&rounded=true&size=40&font-size=0.33&background=673AB7&color=fff" alt="profile photos">
            @else
              <div class="form-file custom-file flex-fill mr-4">
                <input type="file" class="form-file-input custom-file-input" id="avatar" name="avatar">
                <label class="form-file-label" for="avatar">
                  <span class="form-file-text custom-file-label">{{$user->avatar}}</span>
                  <span class="form-file-button">Browse</span>
                </label>
              </div>
              <img src="{{asset('images/'.$user->avatar)}}" alt="profile photos" width="40" height="40" class="rounded-circle">
            @endif
          </div>
          @if ($errors->has('avatar'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('avatar') }}</strong>
            </span>
          @endif
        </div>
        <div class="px-5 my-3">
            <a href="{{ url()->previous() }}" class="btn btn-outline-warning w-100 py-2 my-2">Back</a>
            <button type="submit" class="btn btn-warning w-100 py-2 my-2">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>
@endsection
