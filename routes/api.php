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
// Route::prefix('/api')->middleware(['website-widget'])->group(function(){

//     Route::get('/get-widget', 'Pages\WebsiteWidgetController@show');
//     Route::get('/get-calendar', 'Pages\WebsiteWidgetController@getCalendar');
//     Route::get('/categories', 'Actions\WebsiteWidgetController@getCategoriesWithServices');
//     Route::get('/staffs', 'Actions\WebsiteWidgetController@getStaffsForBusiness');
// });

// Route::options('/{any}', function(){ return ''; })->where('any', '.*');


// Route::get('/api/get-widget', 'Pages\WebsiteWidgetController@show')->middleware('pre-flight', 'website-widget');
// Route::get('/api/get-calendar', 'Pages\WebsiteWidgetController@getCalendar')->middleware('pre-flight', 'website-widget');
// Route::get('/api/categories', 'Actions\WebsiteWidgetController@getCategoriesWithServices')->middleware('pre-flight', 'website-widget');
// Route::get('/api/staffs', 'Actions\WebsiteWidgetController@getStaffsForBusiness')->middleware('pre-flight', 'website-widget');

// Route::get('/api/get-widget', 'Pages\WebsiteWidgetController@show')->middleware('cors', 'website-widget');
// Route::get('/api/get-calendar', 'Pages\WebsiteWidgetController@getCalendar')->middleware('cors', 'website-widget');
// Route::get('/api/categories', 'Actions\WebsiteWidgetController@getCategoriesWithServices')->middleware('cors', 'website-widget');
// Route::get('/api/staffs', 'Actions\WebsiteWidgetController@getStaffsForBusiness')->middleware('cors', 'website-widget');

// Route::post('/api/your_url', function () {
//     $status = 'success';
//     $data = "working";
//     return response()->json([
//         'status' => $status,
//         'data' => $data
//     ]);
// });//->middleware('pre-flight');