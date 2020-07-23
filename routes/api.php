<?php

use Illuminate\Http\Request;
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

Route::get('/testcors', function(Request $request){
    return response()->json(['Hello Laravel 7']);
});

// Product Resource
Route::resource('products','API\ProductController');

Route::middleware('auth:api')->group(function() {
    
    // 
    
});
