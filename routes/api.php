<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
 */

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function () {
    //Return json
    return response()->json(['status' => true, 'message' => 'Conexão com API bem sucedida!'], 200);
});

Route::get('/status', function () {
    //Return json
    return response()->json(['status' => true, 'message' => 'Conexão com API bem sucedida!'], 200);
});


Route::prefix('v1')->namespace('API')->group(function ($router){


    Route::get('users', "User\UsersController@index");




    //group
    Route::group(['middleware' => ['token_validation:developer']], function () {
        Route::get('/teste', function () {
            //Return json
            return response()->json([
                'status' => true,
                'message' => 'Conexão com API bem sucedida!'
            ], 200);
        });




    });
});
