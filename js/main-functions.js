
$(document).ready(function(){
  $('.form_word').submit( sendWord );
});

function sendWord(){
  $.ajax({
    url: $(this).attr('action'),
    type: "POST",
    data: $(this).serialize(),
    success: insertWords,
    error: errorAction,
    dataType: 'json'
  });
  return false;
}

function insertWords(data){
  data = data.join('\n');
  $('.sclonenya').html(data);
}

function errorAction(){
  $('.sclonenya').html('');
}