<form class="deleteTask inline"
onsubmit="return confirm('Are you sure you want to delete this task?');"
action="/tasks/{{ $task->id }}" method="POST">
  {{ csrf_field() }}
  {{ method_field('DELETE') }}
  <button type="submit" class="btn btn-danger btn-xs">
    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
  </button>
</form>
