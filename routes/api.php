<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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

Route::get('version', function () {
    return response()->json(['version' => config('app.version')]);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});


Route::namespace('App\\Http\\Controllers\\API')->group(function () {
    Route::get('profile', 'ProfileController@profile');
    Route::put('profile', 'ProfileController@updateProfile');
    Route::post('change-password', 'ProfileController@changePassword');
    Route::get('tag/list', 'TagController@list');
    Route::get('category/list', 'CategoryController@list');
    Route::get('get-membership/{data}', 'MembershipsController@getMembership');
    Route::post('product/upload', 'ProductController@upload');
    Route::get('get-agency-plans', 'PlanController@getAgencyplan');
    Route::get('agency-pricing', 'PlanController@getAgencyPricing');
    

    Route::apiResources([
        'user' => 'UserController',
        'product' => 'ProductController',
        'category' => 'CategoryController',
        'memberships' => 'MembershipsController',
        'initial-post-ad' => 'InitialPostAdController',
        'tenant-add' => 'TenantPostAddController',
        'land-add' => 'LandPostAddController',
        'tag' => 'TagController',
        'plan' => 'PlanController',
        'pricing' => 'PricingController',
    ]);
});
