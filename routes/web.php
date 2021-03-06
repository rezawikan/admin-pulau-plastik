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

// Route::get('mail', function (Illuminate\Http\Request $request) {
//   $request->fullName = 'Rezza';
//   $request->community = 'Testing';
//   $request->as = 'Community';
//   $request->phone = 34534345;
//   $request->date = '20-20-2019';
//   $request->time = '08:00';
//   $request->eventDecription = 'Testing';
//   $request->location = 'Bali';
//   $request->episode = '1';
//   $request->audienceProfile = '20d';
//   $request->numbersOfAudience = '100';
//   $request->ageOfAudience = '30 -40';
//   $request->email = 'reza.wikan.dito@gmail.com';
//   $request->shortDescription_1 =  'testing';
//   $request->shortDescription_2 = 'testing';
//
//     return (new App\Notifications\HostAScreening($request))
//                 ->toMail($request->email);
// });
Route::get('/','Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('home');
Route::resource('admin/blog', 'BlogController');
Route::resource('admin/initiative', 'InitiativeController');
Route::resource('admin/research', 'ResearchController');
Route::resource('admin/upcoming', 'ScreeningController');
Route::resource('admin/team', 'TeamController');
Route::resource('admin/partner', 'PartnerController');
Route::resource('admin/media', 'MediaController');
Route::resource('admin/media-coverage', 'MediaCoverageController');
Route::resource('admin/gallery', 'GalleryController');
Route::resource('admin/testimony', 'TestimonyController');
Route::resource('admin/episode', 'EpisodeController');
Route::resource('admin/supporter', 'SupporterController');
Route::resource('admin/psas', 'PSAsController');
Route::resource('admin/merchandise', 'MerchandiseController');
Route::resource('admin/vendor', 'VendorController');
Route::resource('admin/author', 'AuthorController');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...
});
