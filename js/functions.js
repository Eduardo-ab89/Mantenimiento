$(function(){
  $('#mantenimiento-select').change(function(){
    window.location.href = 'mantenimientos.php?select=' + $(this).val();
  });
});
