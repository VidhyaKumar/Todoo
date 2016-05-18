<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests;

class ApiController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $user = app('auth')->guard('api')->user();
    $tasks = app('cache')->remember("user:{$user->id}:tasks", 60,
    function() use ($user) { return $user->tasks()->get(); });
    return $tasks;
  }
}
