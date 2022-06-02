<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('index');
Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','preventBackHistory'])->group(function(){
        
        Route::get('/login',[AdminController::class,'login'])->name('login');
        Route::get('/register',[AdminController::class,'register'])->name('register');
        Route::post('/loginCheck',[AdminController::class,'loginCheck'])->name('loginCheck');
        Route::get('/forgotpassword',[AdminController::class,'forgotpassword'])->name('forgotpassword');
        Route::post('/checkforgotpassword',[AdminController::class,'checkforgotpassword'])->name('checkforgotpassword');
        Route::get('/resetpassword/{token}/{email}',[AdminController::class,'resetpassword'])->name('resetpassword');
        Route::post('/updatepassword',[AdminController::class,'updatepassword'])->name('updatepassword');
    });
    Route::middleware(['auth:admin','preventBackHistory'])->group(function(){
        Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
       
        //Route::get('/addcategory',[AdminController::class,'addcategory'])->name('addcategory');
        Route::resource('/products', ProductController::class);
    });
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
