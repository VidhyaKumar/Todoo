<form method="post" action="/tasks">
  {{ csrf_field() }}
  <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
    <input type="text" class="form-control" id="createTask" placeholder="Example: Buy milk!" name="task">
    @if ($errors->has('task'))
        <span class="help-block">
            <strong>{{ $errors->first('task') }}</strong>
        </span>
    @endif
  </div>
  <div class="form-group no-margin-bottom">
    <button type="submit" class="btn btn-default">
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add Task
    </button>
  </div>
</form>
