<?php
Route::get('test',function(){
  return 'ALL GOOD';
});
Route::get('devstatus', 'Charan\DevStatusController@home');
Route::get('devstatus/{username}', 'Charan\DevStatusController@index');
