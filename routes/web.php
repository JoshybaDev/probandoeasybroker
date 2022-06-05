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
Route::controller(EasybrokerController::class)->group(function () 
{
    //Contact_Request
    Route::view('/',"points");
    Route::get("/contactreqgetall",'contact_req_getall')->name("contactreqgetall");
    Route::get("/contactreqgetall/{page}",'contact_req_get_all_next')->name("contactreqgetallnext");
    Route::post("/contactreqsave",'contact_req_save')->name("contactreqsave");
    //Properties
    Route::get("/propertiesgetall",'properties_get_all')->name("propertiesgetall");
    Route::get("/propertiesgetall/{page}",'properties_get_all_next')->name("propertiesgetallnext");
    Route::get("/properties/{id}",'properties_get_by_id')->name("propertiesshowbyid");
    //MlsProperties
    Route::get("/mslpropertiesgetall",'mlsproperties_get_all')->name("mlspropertiesgetall");
    Route::get("/mlspropertiesgetall/{page}",'mlsproperties_get_all_next')->name("mlspropertiesgetallnext");
    Route::get("/mlsproperties/{id}",'mlsproperties_get_by_id')->name("mlspropertiesshowbyid");
    //Locations
    Route::get("/locations",'locations')->name("locations");
    Route::get("/locations/{location?}",'locations')->name("locations");
});