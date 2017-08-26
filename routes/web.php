<?php

Route::get('/homeSm', function () {
    return view('home-sm');
});

Auth::routes();

Route::prefix('login')->group(function () {
    Route::get('/{driver}', 'SocialLoginController@redirectToProvider');
    Route::get('/{driver}/callback', 'SocialLoginController@handleProviderCallback');
});

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/media', 'MediaController@index')->name('media');
Route::get('/media/{show}', 'HomeController@show')->name('show');
Route::get('/view_episode/{show}/{item}', 'HomeController@show_item')->name('show_item');

Route::get('/events', 'EventsController@index')->name('events');
Route::post('/saveEvent', 'EventsController@store')->name('create-event');
Route::get('/info', 'InfoController@index')->name('infos');
Route::post('/saveInfo', 'InfoController@store')->name('create-info');

Route::get('/artists', 'ArtistsController@index')->name('artists');
Route::get('/artists/{artist}', 'ArtistsController@single')->name('artist');
Route::get('/instaPics/{username}', 'ArtistsController@insta')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/editProfile', 'ArtistsController@edit_profile')->name('editProfile');
    Route::post('/saveBasic', 'ArtistsController@save_basic')->name('saveBasic');
    Route::post('/saveArtistic', 'ArtistsController@save_artistic')->name('saveArtistic');
    Route::post('/saveArtistWorks', 'ArtistsController@save_works')->name('saveArtistWorks');

    Route::post('/saveSocialMedia', 'ArtistsController@save_social_media')->name('saveSocialMedia');
    Route::post('/saveArtistPictures', 'ArtistsController@save_pictures')->name('saveArtistPictures');
    Route::get('/setupAccount', 'ArtistsController@setup_account')->name('setupAccount');
});

Route::namespace('Admin')->prefix('/admin')->group(function () {
<<<<<<< HEAD
    Route::get('/', function() {
        return view('admin.index');
=======
    Route::post('/logout', 'LogoutController@logout')->name('admin.logout');

    Route::get('/', 'HomeController@showHome')->name('admin.home');
    Route::get('/home', function () {
        return redirect()->route('admin.home');
>>>>>>> Implementing the dashboard
    });

    Route::prefix('/staging')->group(function () {
        Route::get('/', function () {
            if (config('app.env') == 'staging') {

                return view('welcome');

            }

            return abort('403');
        });
    });

    Route::get('/artists', 'ArtistController@index')->name('admin.artists.index');
    Route::get('/artists/categories', 'ArtistCategoryController@index')->name('admin.artists.categories.index');

    Route::get('/events', 'EventController@index')->name('admin.events.index');

    Route::get('/street-data', 'StreetDataController@index')->name('admin.street_data.index');

    Route::get('/system-users', 'SystemUserController@index')->name('admin.system_users.index');
});
