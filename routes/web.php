<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
|
*/

Route::post('login',[LoginController::class,'login'])->name('postlogin');
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/set_language',[HomeController::class,'set_language'])->name('set_language');


//private Route
Route::group(['middleware'=> ['auth:admin']], function () {
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');

    Route::get('/dashboard', [HomeController::class,'dashboard'])->name('dashboard');

    //Product
    Route::prefix('product')->group(function () {
        //company
        Route::prefix('list-product')->group(function () {
            Route::get('',[ProductController::class,'index']);
            Route::get('add',[ProductController::class,'add']);
            Route::post('list',[ProductController::class,'list_data']);
            Route::post('post',[ProductController::class,'post']);
            Route::post('update',[ProductController::class,'update']);
            Route::get('/{id}',[ProductController::class,'detail']);
            Route::get('edit/{id}',[ProductController::class,'edit']);
            Route::post('active',[ProductController::class,'active']);
            Route::post('nonactive',[ProductController::class,'nonactive']);
            Route::post('delete',[ProductController::class,'delete']);
        });
    });
    
    //Menu Administrator
    Route::prefix('administrator')->group(function () {
        //setting menu
        //admin
        Route::prefix('list-admin')->group(function () {
            Route::get('',[AdministratorController::class,'index']);
            Route::get('/add',[AdministratorController::class,'add']);
            Route::post('list',[AdministratorController::class,'list_data']);
            Route::post('post',[AdministratorController::class,'post']);
            Route::post('update',[AdministratorController::class,'update']);
            Route::post('update_password',[AdministratorController::class,'update_password']);
            Route::get('/{id}',[AdministratorController::class,'detail']);
            Route::post('active',[AdministratorController::class,'active']);
            Route::post('nonactive',[AdministratorController::class,'nonactive']);
            Route::post('delete',[AdministratorController::class,'delete']);
        });
        //role model
    });

    //transaction
    Route::prefix('transaction')->group(function () {
        //company
        Route::prefix('list-transaction')->group(function () {
            Route::get('',[TransactionController::class,'index']);
            Route::post('list',[TransactionController::class,'list_data']);
            Route::post('update',[TransactionController::class,'update']);
            Route::get('/{id}',[TransactionController::class,'detail']);
        });
    });

    //Customer
    Route::prefix('customer')->group(function () {
        Route::prefix('list-customer')->group(function () {
            Route::get('',[CustomerController::class,'index']);
            Route::get('add',[CustomerController::class,'add']);
            Route::post('list',[CustomerController::class,'list_data']);
            Route::post('action',[CustomerController::class,'action']);
            Route::post('change_password',[CustomerController::class,'change_password']);
            Route::post('post',[CustomerController::class,'post']);
            Route::post('update',[CustomerController::class,'update']);
            Route::get('/{id}',[CustomerController::class,'detail']);
            Route::get('edit/{id}',[CustomerController::class,'edit']);
            Route::post('active',[CustomerController::class,'active']);
            Route::post('nonactive',[CustomerController::class,'nonactive']);
            Route::post('delete',[CustomerController::class,'delete']);
        });
    });
    
});