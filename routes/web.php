<?php

use App\Http\Controllers\User44Controller;
use App\Http\Controllers\Agama44Controller;
use App\Http\Controllers\apiclient\Agama44Controller as ClientAgama44Controller;
use App\Http\Controllers\apiclient\User44Controller as ClientUser44Controller;
use Illuminate\Support\Facades\Route;

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

//welcome page
Route::get('/', function () {
    return redirect('/login44');
});

Route::group(['middleware' => ['isNotLogin']], function () {
    // Register Login
    Route::view('/register44', 'register');
    Route::view('/login44', 'login');
    Route::post('/register44', [App\Http\Controllers\Register44Controller::class, 'register44']);
    Route::post('/login44', [App\Http\Controllers\Login44Controller::class, 'login44']);
});

// Role Admin
Route::group(['middleware' => ['isAdmin']], function () {

    // API DATA USER
    Route::get('/dashboard44', [User44Controller::class, 'dashboardPage44']);
    Route::get('/user44/{id}', [User44Controller::class, 'detailPage44']);
    Route::get('/user44/{id}/status', [User44Controller::class, 'putUserStatus44']);
    Route::post('/user44/{id}/agama', [User44Controller::class, 'putUserAgama44']);
    Route::get('/user44/{id}/delete', [User44Controller::class, 'deleteUser44']);

    // API AGAMA
    Route::get("/agama44", [Agama44Controller::class, "agamaPage44"]);
    Route::post("/agama44", [Agama44Controller::class, "createAgama44"]);
    Route::get("/agama44/{id}/edit", [Agama44Controller::class, "editAgamaPage44"]);
    Route::post("/agama44/{id}/update", [Agama44Controller::class, "updateAgama44"]);
    Route::get("/agama44/{id}/delete", [Agama44Controller::class, "deleteAgama44"]);

    // API CLIENT DATA USER
    Route::get("/apiclient/dashboard44", [ClientUser44Controller::class, "dashboardPage44"]);
    Route::get("/apiclient/user44/{id}", [ClientUser44Controller::class, "detailPage44"]);
    Route::get("/apiclient/user44/{id}/status", [ClientUser44Controller::class, "putUserStatus44"]);
    Route::post("/apiclient/user44/{id}/agama", [ClientUser44Controller::class, "putUserAgama44"]);
    Route::get("/apiclient/user44/{id}/delete", [ClientUser44Controller::class, "deleteUser44"]);

    // API CLIENT AGAMA
    Route::get("/apiclient/agama44", [ClientAgama44Controller::class, "agamaPage44"]);
    Route::get("/apiclient/agama44/{id}/edit", [ClientAgama44Controller::class, "editAgamaPage44"]);
    Route::post("/apiclient/agama44", [ClientAgama44Controller::class, "createAgama44"]);
    Route::post("/apiclient/agama44/{id}/update", [ClientAgama44Controller::class, "updateAgama44"]);
    Route::get("/apiclient/agama44/{id}/delete", [ClientAgama44Controller::class, "deleteAgama44"]);


});


// Role User
Route::group(['middleware' => ['isUser']], function () {

    // API User
    Route::view('/changePassword44', 'editPW');
    Route::get('/profile44', [User44Controller::class, 'profilePage44']);
    Route::post('/user44', [User44Controller::class, 'putUserDetail44']);
    Route::post('/user44/photo', [User44Controller::class, 'putUserPhoto44']);
    Route::post('/user44/photoKTP', [User44Controller::class, 'putUserPhotoKTP44']);
    Route::post('/user44/password', [User44Controller::class, 'putUserPassword44']);

    // API Client User
    Route::view('/apiclient/changePassword44', 'editPW', ['Use_API' => true]);
    Route::get('/apiclient/profile44', [ClientUser44Controller::class, 'profilePage44']);
    Route::post('/apiclient/user44', [ClientUser44Controller::class, 'putUserDetail44']);
    Route::post('/apiclient/user44/photo', [ClientUser44Controller::class, 'putUserPhoto44']);
    Route::post('/apiclient/user44/photoKTP', [ClientUser44Controller::class, 'putUserPhotoKTP44']);
    Route::post('/apiclient/user44/password', [ClientUser44Controller::class, 'putUserPassword44']);


});

// Welcome Page
Route::get('/halo44', [App\Http\Controllers\Halo44Controller::class, 'halo44']);

// Logout Session
Route::get('/logout44', [User44Controller::class, 'logout44'])->middleware('isLogin');
