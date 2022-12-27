<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\Agama44Controller;
use App\Http\Controllers\api\User44Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/user44", [User44Controller::class, "getUsers44"]);
Route::get("/user44/{id}", [User44Controller::class, "getUserDetail44"]);
Route::put("/user44/{id}", [User44Controller::class, "putUserDetail44"]);
Route::put("/user44/{id}/photo", [User44Controller::class, "putUserPhoto44"]);
Route::put("/user44/{id}/photoKTP", [User44Controller::class, "putUserPhotoKTP44"]);
Route::put("/user44/{id}/password", [User44Controller::class, "putUserPassword44"]);
Route::put("/user44/{id}/status", [User44Controller::class, "putUserStatus44"]);
Route::put("/user44/{id}/agama", [User44Controller::class, "putUserAgama44"]);
Route::delete("/user44/{id}", [User44Controller::class, "deleteUser44"]);

Route::get("/agama44", [Agama44Controller::class, "getAgama44"]);
Route::get("/agama44/{id}", [Agama44Controller::class, "getDetailAgama44"]);
Route::post("/agama44", [Agama44Controller::class, "postAgama44"]);
Route::put("/agama44/{id}", [Agama44Controller::class, "putAgama44"]);
Route::delete("/agama44/{id}", [Agama44Controller::class, "deleteAgama44"]);



