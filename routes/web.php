<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', [AdminController::class,'index'])->name('admin_login');
Route::get('admin/login',function(){
    return view('admin.login');
});

Route::get('admin/login',function(){
    return view('admin.login');
});

Route::get('admin/signup',function(){
    return view('admin.signup');
});

Route::middleware('auth')->group(function () {
    Route::get('admin/questions/add',[AdminController::class,'addQuestions'])->name('admin.question.add');
    Route::post('admin/questions/store',[AdminController::class,'storeQuestions'])->name('admin.question.store');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
