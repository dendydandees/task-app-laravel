@extends('layouts.app')

@section('content')
@include('sweetalert::alert')

<div class="container">
  <div class="row justify-content-center my-3">
    <div class="col-10">
    <div class="card border-warning bg-dark shadow-lg">
        <div class="card-header d-flex justify-content-between shadow-sm">
          <h3 class="mt-2">Tasks <span class="badge bg-warning text-dark">{{$total_task}}</span></h3>
          {{-- CREATE TASK --}}
          <button type="button" class="btn btn-warning px-3" data-toggle="modal" data-target="#createNewTask">Create new task</button>

          <div class="modal fade" id="createNewTask" tabindex="-1" aria-labelledby="createNewTask" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content bg-dark">
                <div class="modal-header border-warning">
                  <h5 class="modal-title" id="createNewTask">Create New Task</h5>
                  <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="POST" action="{{ route('tasks.store') }}">
                  <div class="modal-body">
                      @csrf
                      <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="mb-3">
                        <label for="detail" class="form-label">Detail</label>
                        <textarea name="detail" class="form-control {{ $errors->has('detail') ? ' is-invalid' : '' }}" id="detail" rows="3"></textarea>
                        @if ($errors->has('detail'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('detail') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="mb-3">
                        @livewire('subtask')
                      </div>
                  </div>
                  <div class="modal-footer border-warning">
                    <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-warning">Create</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- END CREATE --}}
        </div>

        <div class="card-body">
          @if (count($tasks) > 0)
            <table class="table table-hover border-warning">
                @foreach ($tasks as $task)
                    <tr>
                        <td class="text-warning">
                            @if ($task->is_complete)
                                <h5 class="text-white-50"><s>{{ $task->title }}</s></h5>
                                @isset($task->subtasks)
                                  @foreach ($task->subtasks as $subtask)
                                  <h6 class="text-white-50 ml-4 my-3"><s>{{$subtask->title}}</s></h6>
                                  @endforeach
                                @endisset
                                <p class="text-white-50"><s>{{ $task->detail }}</s></p>
                            @else
                                <h5>{{ $task->title }}</h5>
                                @isset($task->subtasks)
                                  @foreach ($task->subtasks as $subtask)
                                  <h6 class="ml-4 my-3">{{$subtask->title}}</h6>
                                  @endforeach
                                @endisset
                                <p>{{ $task->detail }}</p>
                            @endif
                        </td>
                        <td class="text-right">
                            @if (! $task->is_complete)
                                {{-- COMPLETED TASK --}}
                                <form method="POST" action="{{ route('tasks.complete', $task->id) }}" class="d-inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success px-3 py-2" data-toggle="tooltip" data-placement="right" title="Mark Complete">
                                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                        <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                      </svg>
                                    </button>
                                </form>
                                {{-- END COMPLETED --}}
                                {{-- EDIT TASK --}}
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning px-3 py-2" data-toggle="tooltip" data-placement="right" title="Edit Task">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                                </a>
                                {{-- END EDIT --}}
                            @elseif ($task->is_complete)
                              {{-- INCOMPLETED TASK --}}
                            <form method="POST" action="{{ route('tasks.incomplete', $task->id) }}" class="d-inline-block">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-info px-3 py-2" data-toggle="tooltip" data-placement="right" title="Mark Incompleted">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M1.5 13A1.5 1.5 0 0 0 3 14.5h10a1.5 1.5 0 0 0 1.5-1.5V8a.5.5 0 0 0-1 0v5a.5.5 0 0 1-.5.5H3a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h8a.5.5 0 0 0 0-1H3A1.5 1.5 0 0 0 1.5 3v10z"/>
                                  </svg>
                                </button>
                            </form>
                            {{-- END INCOMPLETED --}}
                            @endif
                            {{-- DELETE TASK --}}
                            <form action="{{ route('tasks.destroy', $task->id)}}" method="POST" class="d-inline-block">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger px-3 py-2" data-toggle="tooltip" data-placement="right" title="Delete Task">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg>
                              </button>
                            </form>
                            {{-- END DELETE --}}
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $tasks->links() }}
          @else
            <div class="mx-auto w-75 my-2">
              <h4 class="text-center">Mulai dari awal</h4>
              <p class="text-center">Ada tugas yang ingin ditambahkan ?</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
