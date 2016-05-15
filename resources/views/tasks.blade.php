@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Task</div>

                <div class="panel-body">
                    <!-- Start Create Task Form -->
                    <form method="post" action="/tasks">
                      {{ csrf_field() }}
                      <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
                        <label for="createTask">Task</label>
                        <input type="text" class="form-control" id="createTask" placeholder="Example: Buy milk!" name="task">
                        @if ($errors->has('task'))
                            <span class="help-block">
                                <strong>{{ $errors->first('task') }}</strong>
                            </span>
                        @endif
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-default">
                          <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Task
                        </button>
                      </div>
                    </form>
                    <!-- End Create Task Form -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pending Tasks</div>
                <div class="panel-body">
                  <table class="table table-striped">
                    <thead>
                      <tr><th>Task</th></tr>
                    </thead>
                    <tbody>
                      @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                        <tr><td>
                            {{ $task->task }}
                            <div class="pull-right">
                              <form class="inline" action="/tasks/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <button type="submit" class="btn btn-success btn-xs">
                                  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Complete
                                </button>
                              </form>
                              <form onsubmit="return confirm('Are you sure?');" class="inline" action="/tasks/{{ $task->id }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-xs">
                                  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                </button>
                              </form>
                            </div>
                        </td></tr>
                        @endforeach
                      @else
                        <tr><td>
                          Good job! No outstanding tasks remaining.
                        </td></tr>
                      @endif
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
