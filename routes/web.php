<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use furbook\breed;
Route::get('/', function () {
    echo 'hello word'; exit;
    return view('welcome');
});
Route::get('/cats', function () {
//    echo 'hello cats'; exit;
//    return view('cats');
//    return redirect('/');
//    $cats = ''
    \Illuminate\Support\Facades\DB::enableQueryLog();
    $cats = \App\Cat::all();
    return view('cats/cats')->with('cats', $cats);
});

Route::get('/cats/{id}', function ($id){
    $cat = \App\Cat::find($id);
    return View('cats.show')->with('cat',$cat);
})-> where('id','[0-9]+');

//edit
Route::get('/cats/{id}/edit', function ($id){
    $cat = \App\Cat::find($id);
    return View('cats.edit');
})-> where('id','[0-9]+');

//hien tat ca ten meo co cung giong
Route::get('/cats/breeds/{name}', function ($name){
  $breed = \App\Breed::with('cats')
      ->where('name', $name)
      ->first();
  return view('cats.cats')
      ->with('breed', $breed)
      ->with('cats', $breed->cats);
});

//show page create new cat
Route::get('/cats/create', function (){
    return view('cats.create');
});

//show edit
Route::get('/cats/edit', function (){
    return view('cats.edit');
});

//insert new cat
Route::post('/cats', function (){
    $data = Request::all();
    $cat = \App\Cat::create($data);
    return redirect('/cats/'.$cat->id)->withSuccess('Cerate cat success');

//    dd(\http\Env\Request::all());
});
