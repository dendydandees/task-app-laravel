<div>
    <label for="subtask" class="form-label" wire:click="increment">
      Add Subtask
      <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus-square-fill ml-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4a.5.5 0 0 0-1 0v3.5H4a.5.5 0 0 0 0 1h3.5V12a.5.5 0 0 0 1 0V8.5H12a.5.5 0 0 0 0-1H8.5V4z"/>
      </svg>
    </label>

    @foreach($subtask as $item)
      <div class="row mb-2" wire:key="{{ $loop->index }}">
        <div class="col">
          <input name="subtaskTitle[]" type="text" class="mb-2 form-control" placeholder="{{'Subtask '.($loop->index+1)}}" value="{{ $item['title'] }}"/>
          <input name="subtaskId[]" type="hidden" value="{{ $item['id'] }}"/>
        </div>
        <div class="col-auto">
          <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-file-minus-fill ml-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" wire:click="remove({{ $loop->index }})">
            <path fill-rule="evenodd" d="M12 1H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zM6 7.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z"/>
          </svg>
        </div>
      </div>
    @endforeach
</div>
