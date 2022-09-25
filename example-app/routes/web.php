<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\RegLoginAdmin;
use App\Http\Controllers\bookSettingController;


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
Route::get('/logAdmin',[RegLoginAdmin::class,'logAdmin'])->middleware('logout');;
Route::get('/regAdmin', [RegLoginAdmin::class,'register'])->middleware('logout');;
Route::post('/regAdmin', [RegLoginAdmin::class,'reg']);
Route::post('/LoginAdmin', [RegLoginAdmin::class,'LoginAdmin']);
Route::get('logout', [RegLoginAdmin::class, 'logout']);
Route::get('changePass', [RegLoginAdmin::class, 'changePass'])->middleware('login');
Route::post('changePassword', [RegLoginAdmin::class, 'changePassword']);
Route::get('/profile',[adminController::class,'profile'])->middleware('login');
Route::get('/doctorsAdmin',[adminController::class,'doctorsAdmin'])->middleware('login');
Route::get('doctorDetails/id/{id}', [adminController::class, 'doctorDetails'])->middleware('login');
Route::get('cancelDoctor/id/{id}', [adminController::class, 'cancelDoctor']);
Route::post('/editPicDoc/{id}',[adminController::class, 'editPicDoc']);
Route::post('/updatedoctor',[adminController::class, 'updatedoctor']);
Route::get('/addDoctor',[adminController::class, 'addDoctor'])->middleware('login');
Route::post('/addedDoctor',[adminController::class, 'addedDoctor']);
Route::post('/addedu',[adminController::class, 'addedu']);
Route::post('/editedu',[adminController::class, 'editedu']);
Route::get('deleteedu/id/{id}', [adminController::class, 'deleteedu']);
Route::post('/addskill',[adminController::class, 'addskill']);
Route::post('/editskill',[adminController::class, 'editskill']);
Route::get('deleteskill/id/{id}', [adminController::class, 'deleteskill']);
Route::post('/addexp',[adminController::class, 'addexp']);
Route::post('/editexp',[adminController::class, 'editexp']);
Route::get('deleteexp/id/{id}', [adminController::class, 'deleteexp']);
Route::post('/editPic',[adminController::class, 'editPic']);
Route::post('/addService',[adminController::class, 'addService']);
Route::get('deleteService/id/{id}', [adminController::class, 'deleteService']);
Route::post('/updateClinic',[adminController::class, 'updateClinic']);
Route::get('/cal',[adminController::class,'cal'])->middleware('login');
Route::get('/main',[adminController::class,'main'])->middleware('login');
Route::get('/booking',[adminController::class,'booking'])->middleware('login');
Route::post('addBook1', [adminController::class, 'addBook1']);
Route::post('addbook2', [adminController::class, 'addbook2']);
Route::get('bookSetting', [bookSettingController::class, 'bookSetting'])->middleware('login');
Route::post('bookingSetting', [bookSettingController::class, 'bookingSetting']);
Route::get('addbook', [adminController::class, 'addbook'])->middleware('login');
Route::get('userDetails/id/{user_id}/book/{id}', [adminController::class, 'userDetails']);
Route::get('cancel/id/{id}', [adminController::class, 'cancel']);
Route::get('removedDoc', [adminController::class, 'removedDoc'])->middleware('login');
Route::get('deleteDoc/id/{id}', [adminController::class, 'deleteDoc']);
Route::get('bakeDoc/id/{id}', [adminController::class, 'bakeDoc']);
Route::get('usersAdmin', [adminController::class, 'users'])->middleware('login');
Route::get('singleuser/id/{id}/', [adminController::class, 'singleuser'])->middleware('login');
Route::get('deletedebook', [adminController::class, 'deletedebook'])->middleware('login');
Route::get('deleteBook/id/{id}/', [adminController::class, 'deleteBook']);
Route::post('updateLicense', [adminController::class, 'updateLicense']);


//////////////////////////////////////////////

Route::get('/',[ViewController::class,'home']);
// Route::get('/home',[ViewController::class,'home']);
Route::get('/about',[ViewController::class,'about']);
Route::get('/book1',[ViewController::class,'book1']);
Route::post('/book1',[BookController::class,'book1']);
Route::get('/book2/id/{clinic_id}/date/{date}',[ViewController::class,'book2'])->middleware('book1');
Route::post('/book2',[BookController::class,'book2']);
Route::get('/book3',[ViewController::class,'book3'])->middleware('book1')->middleware('verified');
Route::post('/book3',[BookController::class,'book3']);
Route::get('/thank',[ViewController::class,'thank']);
Route::get('/service',[ViewController::class,'service']);
Route::get('/clinics',[ViewController::class,'clinics']);
Route::get('/clinic/id/{clinic_id}',[ViewController::class,'clinic']);
Route::get('/doctors',[ViewController::class,'doctors']);
Route::get('/doctor/id/{doctor_id}',[ViewController::class,'doctor']);
Route::get('/contact',[ViewController::class,'contact']);
Route::get('/user',[ViewController::class,'user'])->middleware('auth')->middleware('verified');
Route::post('/added',[UserController::class, 'editPic']);
Route::post('/updateuser',[UserController::class, 'updateuser']);
Route::post('/updateusermed',[UserController::class, 'updateusermed']);
Route::get('delete/id/{id}', [UserController::class, 'cancelApp']);
Route::get('appDoctor/id/{id}', [ViewController::class, 'appDoctor']);
Route::get('appClinic/id/{id}', [ViewController::class, 'appClinic']);
Route::get('changePasswordUser', [ViewController::class, 'changePassword']);
Route::post('/userChangePass',[UserController::class, 'changePassword']);
Route::post('/contact',[contactController::class, 'contact']);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
