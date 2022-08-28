<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;

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


Route::get('/master', function () {
    return view('layout.master');
});
Route::get('/master', function () {
    return view('admin.try');
});
//////////////////////////////////////////////
Route::get('/cal',[adminController::class,'cal']);

Route::post('addBook', [adminController::class, 'addBook'])->name('calendar.addBook');

//////////////////////////////////////////////

Route::get('/',[ViewController::class,'home']);
Route::get('/home',[ViewController::class,'home']);
Route::get('/about',[ViewController::class,'about']);
Route::get('/book',[ViewController::class,'book'])->middleware('book1');
Route::get('/book2/id/{clinic_id}/date/{date}',[ViewController::class,'book2'])->middleware('book1');
Route::post('/book2',[BookController::class,'book2']);
Route::post('/book3',[BookController::class,'book3']);
Route::get('/book1',[ViewController::class,'book1']);

Route::post('/book1',[BookController::class,'searchAp']);

Route::get('/thank',[ViewController::class,'thank']);
Route::get('/service',[ViewController::class,'service']);
Route::get('/clinics',[ViewController::class,'clinics']);
Route::get('/clinic/id/{clinic_id}',[ViewController::class,'clinic']);
Route::get('/doctors',[ViewController::class,'doctors']);
Route::get('/doctor/id/{doctor_id}',[ViewController::class,'doctor']);
Route::get('/contact',[ViewController::class,'contact']);
Route::get('/user',[ViewController::class,'user'])->middleware('auth');
Route::post('/added',[UserController::class, 'editPic']);
Route::post('/updateuser',[UserController::class, 'updateuser']);
Route::post('/updateusermed',[UserController::class, 'updateusermed']);
Route::get('delete/id/{id}', [UserController::class, 'cancelApp']);
Route::get('appDoctor/id/{id}', [ViewController::class, 'appDoctor']);
Route::get('appClinic/id/{id}', [ViewController::class, 'appClinic']);

Auth::routes();

Route::get('/homee', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
