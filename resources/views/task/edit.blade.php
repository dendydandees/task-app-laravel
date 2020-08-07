@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-6 border border-warning py-3 rounded-lg shadow-lg">
      <h5 class="text-center p-3">Edit Task</h5>

      <form method="POST" action="{{ route('tasks.update', $task->id) }}" class="row">
          @csrf
          @method('PATCH')
          <div class="px-5 mb-3">
            <label for="title" class="form-label">Title</label>
            <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" value="{{ $task->title }}"/>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
          </div>
          <div class="px-5 mb-3">
            <label for="detail" class="form-label">Detail</label>
            <textarea name="detail" class="form-control {{ $errors->has('detail') ? ' is-invalid' : '' }}" id="detail" rows="3">{{ $task->detail }}</textarea>
            @if ($errors->has('detail'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('detail') }}</strong>
                </span>
            @endif
          </div>
          <div class="px-5 mb-3">
            @livewire('edit-subtask', ['subtask' => $task->subtasks])
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
