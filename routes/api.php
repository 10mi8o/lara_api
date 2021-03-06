<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//

//For LaravelPassport
Route::post('login', [\Laravel\Passport\Http\Controllers\AccessTokenController::class, 'issueToken'])
    ->middleware(['api-login', 'throttle']);

//For ArticlesAPI
Route::group(['middleware' => ['api']], function(){
    Route::options('articles', function() {
        return response()->json();
    });
    Route::resource('articles', 'Api\ArticlesController');
});
