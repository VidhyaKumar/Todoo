<?php

namespace App\Http\Controllers;

use Auth;
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
      return Auth::guard('api')->user()->tasks()->get();
  }
}
