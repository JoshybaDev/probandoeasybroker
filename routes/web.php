<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EasybrokerController;

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
Route::get("/",[EasybrokerController::class,'point'])->name("home");
Route::get("/contactreqgetall",[EasybrokerController::class,'contactreqgetall'])->name("contactreqgetall");
Route::get("/contactreqgetall/{page}",[EasybrokerController::class,'contactreqgetallnext'])->name("contactreqgetallnext");
