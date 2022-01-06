<?php

use App\Http\Controllers\Service\ChalokController;
use Illuminate\Support\Facades\Route;

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
Route::group([
    'prefix'=>'users'
    // 'middleware'=>['auth'] 
],function(){
    Route::get('/','UserController@index')->name('api_user_index');
    Route::post('/store','UserController@store')->name('api_user_store');
    Route::get('/show/{id}','UserController@show')->name('api_user_show');
    Route::put('/update/{id}','UserController@update')->name('api_user_update');
    Route::post('/delete','UserController@destroy')->name('api_user_delete');
});

Route::group([
    'prefix'=>'users-role'
    // 'middleware'=>['auth'] 
],function(){
    Route::get('/','UserRoleController@index')->name('api_user_role_index');
    Route::post('/store','UserRoleController@store')->name('api_user_role_store');
    Route::get('/show/{id}','UserRoleController@show')->name('api_user_role_show');
    Route::put('/update/{id}','UserRoleController@update')->name('api_user_role_update');
    Route::post('/delete','UserRoleController@destroy')->name('api_user_role_delete');
});


Route::group([
    'prefix' => 'chalok'
],function(){
    Route::get('/', 'Service\ChalokController@index');
    Route::post('/store', 'Service\ChalokController@store');
    Route::get('show/{id}', 'Service\ChalokController@show');
    Route::put('update/{id}', 'Service\ChalokController@update');
    Route::post('/delete', 'Service\ChalokController@destroy');
    Route::put('/confirmation/{id}', 'Service\ChalokController@confirmation');
    Route::get('/activated',[ChalokController::class, 'chalok']);
    Route::put('/ban/{id}', [ChalokController::class, 'ban']);
    Route::get('/banned_chalok','Service\ChalokController@banned');
});

Route::group([
    'prefix'=>'vehicle_type'
],function(){
    Route::get('/','Vehicle\VehicleTypeController@index');
    Route::post('/','Vehicle\VehicleTypeController@store');
    Route::get('/{id}','Vehicle\VehicleTypeController@show');
    Route::put('/{id}','Vehicle\VehicleTypeController@update');
    Route::post('/delete','Vehicle\VehicleTypeController@destroy');
});

Route::group([
    'prefix'=>'category'
],function(){
    Route::get('/','Vehicle\CategoryController@index');
    Route::post('/','Vehicle\CategoryController@store');
    Route::get('/{id}','Vehicle\CategoryController@show');
    Route::put('/{id}','Vehicle\CategoryController@update');
    Route::post('/delete','Vehicle\CategoryController@destroy');
});

Route::group([
    'prefix'=>'vehicle'
],function(){
    Route::get('/','Vehicle\VehicleController@index');
    Route::post('/','Vehicle\VehicleController@store');
    Route::get('/{id}','Vehicle\VehicleController@show');
    Route::put('/{id}','Vehicle\VehicleController@update');
    Route::post('/delete','Vehicle\VehicleController@destroy');
});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
