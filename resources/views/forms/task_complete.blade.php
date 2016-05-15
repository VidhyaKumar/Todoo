<form class="completeTask inline"
action="/tasks/{{ $task->id }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('PATCH') }}
  @if ($task->completed)
    <button type="submit" class="btn btn-success btn-xs">
  @else
    <button type="submit" class="btn btn-primary btn-xs">
  @endif
    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Complete
  </button>
</form>
