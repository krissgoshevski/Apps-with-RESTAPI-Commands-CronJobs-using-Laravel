<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
// Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
// Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
// Route::delete('/users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');


// ako imam primer 20 modeli i ova ke treba da go napravime 20 pati,
// easy way is the next:
// Route::resource('myRoutesUser', UserController::class) -> this will create all CRUD routes for us 



Route::get('/user/search', [SearchController::class, 'search']);


// so resource gi pravime osnovnite 7 metodi, create, edit , update, destroy, show, index, store

Route::get('/users', [UserController::class, 'index'])->name('users.index'); 
Route::resource('user', UserController::class)->except(['index', 'create', 'edit']); // except(['create', 'edit']); ova znaci osven za ova ne mi pravi ruti 
// php artisan route:list --> so ova gi gledame site ruti 


Route::get('/api/user/{user}', 'UserController@show');








