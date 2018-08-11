<?php

// use furbook\breed;
Route::get('/', function () {
    echo 'hello word'; exit;
    return view('welcome');
});

//hien tat ca ten meo co cung giong
Route::get('/cats/breeds/{name}', function ($name){
  $breed = \App\Breed::with('cats')
      ->where('name', $name)
      ->first();
  return view('cats.cats')
      ->with('breed', $breed)
      ->with('cats', $breed->cats);
});

Route::resource('cats', 'CatController');
