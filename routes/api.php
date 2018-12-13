<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController as Cc;
use App\Http\Controllers\ArticleController as Ac;
use App\Http\Controllers\CartController as CartC;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/',  function () {
    return ['pop','pip'];
});
Route::group(['prefix' => 'products'], function () use ($router) {
	Route::get('/',  function () {
    	return Ac::getAll();
	});
	Route::get('/{category_id}',  function ($category_id) {
    	return Ac::getArticlesByCategory($category_id);
	});
});
Route::group(['prefix' => 'categories'], function () use ($router) {
	Route::get('/',  function () {
    	return Cc::getList();
	});
});
Route::group(['prefix' => 'cart','middleware'=>['web']], function () use ($router) {
	Route::get('/',  function () {
		return ['pop','pap'];
	});
	Route::get('/count',  function (Request $request) {
		return CartC::count($request);
	});
});
