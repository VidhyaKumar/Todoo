<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;

class TasksController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $tasks = $request->user()->tasks()
             ->orderBy('created_at', 'desc')
             ->get();
    $api_token = $request->user()['api_token'];
    return view('tasks', compact('tasks', 'api_token'));
  }

  public function create(Request $request)
  {
    $this->validate($request, ['task' => 'required']);
    $task = new Task($request->all());
    $request->user()->addTask($task);
    return back();
  }

  public function update(Request $request)
  {
    $task = Task::findOrFail($request->id);
    $task->completed = $task->completed == 1 ? false : true;
    $task->save();
    return $task;
  }

  public function delete(Request $request)
  {
    $task = Task::findOrFail($request->id)->delete();
    return back();
  }
}
