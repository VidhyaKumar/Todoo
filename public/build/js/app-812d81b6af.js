$(function(){
  $('.completeTask').submit(function(event){
    event.preventDefault();
    var formData = $(this).serializeArray();
    var formAction = $(this).attr('action');
    $(this).children('button').toggleClass('btn-primary btn-success');
    $.post(formAction, formData, function(data){
      if (data.completed) {
        $('#task-' + data.id).addClass('text-muted strike');
      } else {
        $('#task-' + data.id).removeClass('text-muted strike');
      }
    }, 'json');
  });
});

//# sourceMappingURL=app.js.map
