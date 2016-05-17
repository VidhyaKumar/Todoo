<?php

namespace App\Http\Controllers;

use Auth;
use Cache;
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
    $user = Auth::guard('api')->user();
    $tasks = Cache::remember("user:{$user->id}:tasks", 60,
    function() use ($user) {
      return $user->tasks()->get();
    });
    return $tasks;
  }
}
