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

Route::get('/', function () {
    return view('welcome');
});


Route::view('/user/create', 'user.create'); // on thie route, return user.create view


// api/users / users , znaci vo api/users rutata gi imame site kako list page no samo preku API, dodeka vo web ovde gi listame userite vo HTML 

Route::view('/users', 'user.index'); // on thie route, return user.index view


Route::view('/user/edit', 'user.edit'); // 


Route::view('/user/{user}', 'user.show');




