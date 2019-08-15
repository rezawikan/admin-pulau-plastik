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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('blog', 'API\BlogAPIController@index');
Route::get('blog/{blog_slug}', 'API\BlogAPIController@show');
Route::get('initiative', 'API\InitiativeAPIController@index');
Route::get('initiative/{initiative_slug}', 'API\InitiativeAPIController@show');
Route::get('research', 'API\ResearchAPIController@index');
Route::get('research/{research_slug}', 'API\ResearchAPIController@show');
Route::get('testimony', 'API\TestimonyAPIController@index');
Route::get('episode', 'API\EpisodeAPIController@index');
Route::get('upcomming', 'API\ScreeningAPIController@index');
Route::get('partner', 'API\PartnerAPIController@index');
Route::get('supporter', 'API\SupporterAPIController@index');
Route::get('psas', 'API\PSAsAPIController@index');
Route::get('gallery', 'API\GalleryAPIController@index');
Route::get('media-coverage', 'API\MediaCoverageAPIController@index');
Route::get('request-screening', 'API\EmailFireController@screenings');
Route::get('request-contact', 'API\EmailFireController@contact');
