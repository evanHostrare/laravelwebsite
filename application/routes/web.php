<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\loginController;

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


Route::get('/', [homeController::class,'index']);
Route::get('postRearange', [homeController::class,'postRearange']);

Route::get('admin/login',[loginController::class,'adminlogin']);
Route::post('admin/login',[loginController::class,'adminlogincheck']);
Route::post('admin/logout',[loginController::class,'adminlogout']);

Route::get('login',[loginController::class,'login'])->name('login');
Route::post('login',[loginController::class,'logincheck']);
Route::post('logout',[loginController::class,'logout']);


Route::get('/contact', [homeController::class,'contact']);
Route::get('/product', [homeController::class,'product']);

Route::get('/home', [homeController::class,'home2']);
Route::get('/category/{id}', [homeController::class,'category']);
Route::get('/cartitems', [homeController::class,'cartitems'])->middleware('auth');
Route::get('/checkout', [homeController::class,'checkout'])->middleware('auth');
Route::post('/checkout', [homeController::class,'placeorder'])->middleware('auth');
Route::post('/addtocart/{id}', [homeController::class,'addtocart']);
Route::post('/updatecart/{id}', [homeController::class,'updatecart']);
Route::get('/deleteitem/{id}', [homeController::class,'deleteitem']);
Route::get('/removecart', [homeController::class,'removecart']);
Route::get('/about', [homeController::class,'home']);
Route::post('/sendContactUs', [homeController::class,'sendContactUs']);

Route::resource('posts', PostController::class)->middleware('admin');
Route::resource('cats', CatController::class)->middleware('admin');
Route::resource('product', ProductController::class)->middleware('admin');

// Route::get('posts', [PostController::class,'index'])->middleware('auth');
// Route::get('posts/create', [PostController::class,'create'])->middleware('auth');
// Route::get('posts/{id}', [PostController::class,'show'])->middleware('auth');
// Route::post('posts/store', [PostController::class,'store'])->middleware('auth');
// Route::get('posts/{id}/edit', [PostController::class,'edit'])->middleware('auth');
// Route::post('posts/update/{id}', [PostController::class,'update'])->middleware('auth');
// Route::post('posts/{id}', [PostController::class,'destroy'])->middleware('auth');
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('admin');
// Route::middleware([
//     'admin',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
    
// });
