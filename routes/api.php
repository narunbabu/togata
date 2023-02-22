<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VillageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\StateMandalController;
use App\Http\Controllers\Admin\PeopleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AuthControllertest;
use App\Http\Controllers\Twitt\TweetController;
use App\Http\Controllers\UserController;

// Route::group(['prefix' => 'api/auth'], function () {
//     Route::get('/', 'AuthControllertest@loadUser');
//     Route::post('/login', 'AuthControllertest@login');
//     Route::post('/register', 'AuthControllertest@register');
//     Route::get('/logout', 'AuthControllertest@logout')->middleware('auth:api');
//     Route::get('', 'loadUser');
// });

Route::controller(AuthController::class)->group(function () {    
    Route::post('login', 'login');
    // Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('user', 'loadUser'); // Add this line to include the loadUser route
});



Route::controller(StateMandalController::class)->group(function () {
    Route::get('states', 'fetchState');
    Route::get('districts', 'fetchDistrict');
    Route::get('mandals', 'fetchMandal');
    Route::get('villages', 'fetchVillage');
    // Route::get('village', 'show');   
});



Route::controller(VillageController::class)->group(function () {
    Route::post('village/create', 'store');
    Route::get('village', 'show');
    // Route::get('districts', 'fetchDistrict');
    // Route::get('mandals', 'fetchMandal');
    // Route::get('villages', 'fetchVillage');   
});

Route::controller(TweetController::class)->group(function () {
    Route::get('tweet', 'index');
    Route::get('tweet/{id}', 'show');
    Route::post('tweet',  'store');
    Route::put('tweet/{id}', 'update');
    Route::delete('tweet/{id}', 'destroy');
    Route::post('tweet/{id}/like', 'like');
    Route::post('tweet/{id}/retweet', 'retweet');
});



Route::post('/register', [UserController::class, 'registerUser']);

Route::controller(DashboardController::class)->group(function () {
    Route::get('get_numbers', 'getNumbers');
    // Route::post('register', 'register');
    // Route::post('logout', 'logout');
    // Route::post('refresh', 'refresh');
    

});


Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    return 'hello';

});
Route::get('/states', [StateMandalController::class, 'fetchState']);
Route::group(['middleware' => ['auth'], 'prefix' => 'auth','as' => 'auth.'], function () {
    Route::get('/msg', function () {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs in auth. Everyone can see it.'
        ]);
    });
});

Route::get('/msg', function () {
    return response()->json([
        'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
    ]);
});