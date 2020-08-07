<?php

namespace App\Http\Controllers;

use App\Task;
use App\Subtask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // paginate the authorized user's tasks with 5 per page
      $tasks = Auth::user()
        ->tasks()
        ->orderBy('is_complete')
        ->orderByDesc('updated_at')
        ->latest()
        ->paginate(3);

      $total_task = Auth::user()->tasks()->count();

      // return task index view with paginated tasks
      return view('task.index', compact('tasks','total_task'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the given request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'detail' => 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        // create a new incomplete task with the given title
        $task = Auth::user()->tasks()->create([
                  'title' => $request->title,
                  'detail' => $request->detail,
                  'is_complete' => false,
                ]);

        // create a new subtask
        if($request->subtask) {
          foreach($request->subtask as $subtask) {
            $task->subtasks()->create(['title' => $subtask]);
          }
        }

        // redirect to tasks index
        return redirect('/tasks')->with('toast_success', 'Task Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // check if the authenticated user can complete the task
          $this->authorize('complete', $task);

        // validate the given request
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'detail' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect('/tasks')->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $task->update([
            'title' => $request->title,
            'detail' => $request->detail,
            'is_complete' => false
        ]);

        // update a new subtask
        if($request->subtaskTitle) {
          foreach($request->subtaskTitle as $key => $value) {
            $id = $request->subtaskId[$key];

            if (!$id) {
              $task->subtasks()->create(['title' => $value]);
            } else {
              $subtask = Subtask::find($id);
              $subtask->update([
                'title' => $value
              ]);
            }

          }
        }

        // redirect to tasks index
        return redirect('/tasks')->with('toast_success', 'Task Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        // remove task
        $task->subtasks()->delete();
        Task::destroy($task->id);

        // redirect to tasks index
        return redirect('/tasks')->with('toast_success', 'Task Deleted!');
    }

    public function complete(Request $request, Task $task) {
        // check if the authenticated user can complete the task
          $this->authorize('complete', $task);

        // mark the task as complete and save it
          $task->update([
            'is_complete'=> true
          ]);

        // redirect to tasks index
        return redirect('/tasks')->with('toast_success', 'Task Completed');
    }

    public function incomplete(Request $request, Task $task) {
        // check if the authenticated user can complete the task
          $this->authorize('complete', $task);

        // mark the task as complete and save it
          $task->update([
            'is_complete'=> false
          ]);

        // redirect to tasks index
        return redirect('/tasks')->with('toast_success', 'Task Incompleted');
    }
}
