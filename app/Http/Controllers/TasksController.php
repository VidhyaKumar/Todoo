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
    public function index()
    {
      $tasks = Auth::user()->tasks()->orderBy('created_at', 'desc')->get();
      return view('tasks', compact('tasks'));
    }

    public function create(Request $request)
    {
      $this->validate($request, ['task' => 'required']);
      $task = new Task($request->all());
      $task->user_id = Auth::id();
      $task->save();
      return back();
    }    
}
