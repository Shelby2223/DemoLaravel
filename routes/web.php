<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/tinhtich/{a}/{b}', function ($a,$b) {
    echo $a*$b;exit;
    
})->whereNumber('a')->whereNumber('b');
Route::get('/tinhtong/{a}/{b}', function ($a,$b) {  
    echo $a+$b;exit;
    
})->whereNumber('a')->whereNumber('b');
Route::get('/tinhhieu/{a}/{b}', function ($a,$b) {
    echo $a-$b;exit;
    
})->whereNumber('a')->whereNumber('b');
Route::get('/tinhthuong/{a}/{b}', function ($a,$b) {
    echo $a/$b;exit;
    
})->whereNumber('a')->whereNumber('b');

Route::get('/home', function () {
    return view('home');
});
Route::get('/home/{a}/{b}', function ($a,$b) {
    echo $a*$b;exit;
    
})->whereNumber('a')->whereNumber('b');

Route::get('/xinchaonek',[App\Http\Controllers\HelloController::class,'xinchao']);
Route::get('tinhtong',function(){
return view('sum');
});
Route::post('/tinhtong',[App\Http\Controllers\HelloController::class,'tinhtong']);


Route::get('sum', [App\Http\Controllers\SumController::class, 'index']);
Route::post('sum', [App\Http\Controllers\SumController::class, 'Summ']);

Route::get('AreaOfShape', [App\Http\Controllers\AreaController::class, 'index']);
Route::post('AreaOfShape', [App\Http\Controllers\AreaController::class, 'Area']);

// addRooms
Route::get('addrooms', [App\Http\Controllers\addRoomsController::class, 'index']);
Route::post('addrooms', [App\Http\Controllers\addRoomsController::class, 'showrooms']);

Route::get('123', [App\Http\Controllers\sildecontroller::class, 'getindex']);
Route::post('123', [App\Http\Controllers\sildecontroller::class, 'getindex']);

Route::get('banhang', [App\Http\Controllers\PageController::class, 'getindex']);

Route::get('/detail/{id}', [App\Http\Controllers\PageController::class, 'getDetail']);


Route::get('admin', [App\Http\Controllers\PageController::class, 'getIndexAdmin']);

Route::get('/admin-add-form', [App\Http\Controllers\PageController::class, 'getAdminAdd'])->name('add-product');
Route::post('/admin-add-form', [App\Http\Controllers\PageController::class, 'postAdminAdd']);

Route::get('/admin-edit-form/{id}', [App\Http\Controllers\PageController::class, 'getAdminEdit']);													
Route::post('/admin-edit-form/{id}',[App\Http\Controllers\PageController::class, 'postAdminEdit']);

Route::post('/admin-delete/{id}', [App\Http\Controllers\PageController::class, 'postAdminDelete']);


Route::get('/register', function () {return view('page.register');});	
Route::post('/register', [App\Http\Controllers\UserController::class, 'Register']);

Route::get('/login', function () {return view('page.login');});		
Route::post('/login', [App\Http\Controllers\UserController::class, 'Login']);

Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);

Route::get('add-to-cart/{id}', [App\Http\Controllers\PageController::class, 'getAddToCart'])->name('themgiohang');											
Route::get('del-cart/{id}', [App\Http\Controllers\PageController::class, 'getDelItemCart'])->name('xoagiohang');											


