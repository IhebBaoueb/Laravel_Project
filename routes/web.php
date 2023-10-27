<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'redirect']);
route::get('/',[HomeController::class,'index']);

route::get('/product',[AdminController::class,'product']);
route::post('/addproduct',[AdminController::class,'addproduct']);

route::get('/view_ToDoList',[AdminController::class,'view_ToDoList']);
route::post('/add_ToDoList',[AdminController::class,'add_ToDoList']);
route::get('/delete_ToDoList/{id}',[AdminController::class,'delete_ToDoList']);

route::get('/view_article',[AdminController::class,'view_article']);
route::post('/add_article',[AdminController::class,'add_article']);
route::get('/show_article',[AdminController::class,'show_article']);
route::get('/delete_article/{id}',[AdminController::class,'delete_article']);
route::get('/edit_article/{id}',[AdminController::class,'edit_article']);
route::post('/edit_article_confirm/{id}',[AdminController::class,'edit_article_confirm']);
route::get('/article_details/{id}',[HomeController::class,'article_details']);

route::get('/view_type_task',[AdminController::class,'view_type_task']);
route::post('/add_type_task',[AdminController::class,'add_type_task']);
route::get('/delete_type_task/{id}',[AdminController::class,'delete_type_task']);

