<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/master', function () {
    return view('layout.master');
});

Route::get('/home',[ViewController::class,'home']);
Route::get('/about',[ViewController::class,'about']);
Route::get('/book',[ViewController::class,'book']);
Route::get('/book2/id/{clinic_id}',[ViewController::class,'book2']);
Route::get('/book1',[ViewController::class,'book1']);

Route::post('/book1',[BookController::class,'searchAp']);

Route::get('/thank',[ViewController::class,'thank']);
Route::get('/service',[ViewController::class,'service']);
Route::get('/clinics',[ViewController::class,'clinics']);
Route::get('/clinic/id/{clinic_id}',[ViewController::class,'clinic']);
Route::get('/doctors',[ViewController::class,'doctors']);
Route::get('/doctor',[ViewController::class,'doctor']);
Route::get('/contact',[ViewController::class,'contact']);
Route::get('/user',[ViewController::class,'user']);


Auth::routes();

Route::get('/homee', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
