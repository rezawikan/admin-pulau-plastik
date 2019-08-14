<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home');
Route::resource('admin/blog', 'BlogController');
Route::resource('admin/initiative', 'InitiativeController');
Route::resource('admin/research', 'ResearchController');
Route::resource('admin/upcomming', 'ScreeningController');
Route::resource('admin/team', 'TeamController');
Route::resource('admin/partner', 'PartnerController');
Route::resource('admin/media', 'MediaController');
Route::resource('admin/media-coverage', 'MediaCoverageController');
Route::resource('admin/gallery', 'GalleryController');
Route::resource('admin/testimony', 'TestimonyController');
Route::resource('admin/episode', 'EpisodeController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});
