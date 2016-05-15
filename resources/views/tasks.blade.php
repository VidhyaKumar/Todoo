@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Task</div>
                <div class="panel-body">
                  @include('forms.task_new')
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pending Tasks</div>
                <div class="panel-body">
                  <table class="table table-striped no-margin-bottom">
                    <tbody>
                      @if (count($tasks) > 0)
                        @foreach ($tasks as $task)
                        <tr><td>
                          @if ($task->completed)
                            <span id="task-{{ $task->id }}" class="text-muted strike">{{ $task->task }}</span>
                          @else
                            <span id="task-{{ $task->id }}">{{ $task->task }}</span>
                          @endif
                          <span class="pull-right">
                            @include('forms.task_complete')
                            @include('forms.task_delete')
                          </span>
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
