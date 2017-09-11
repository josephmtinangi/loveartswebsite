<?php

Route::get('/homeSm', function () {
    return view('home-sm');
});

Route::namespace('Auth')->group(function () {
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::prefix('/login')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');

        Route::get('/{driver}', 'SocialLoginController@redirectToProvider');
        Route::get('/{driver}/callback', 'SocialLoginController@handleProviderCallback');
    });
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
    Route::namespace('Auth')->group(function () {
        Route::post('/logout', 'LoginController@logout')->name('admin.logout');

        Route::post('/login', 'LoginController@login')->name('admin.login');
        Route::get('/login', 'LoginController@showLoginForm')->name('admin.showLoginForm');

        Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.sendResetLinkEmail');
        Route::get('/password/email', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.showLinkRequestForm');

        Route::post('/password/reset', 'ResetPasswordController@reset')->name('admin.password.reset');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.showResetForm');
    });

    Route::get('/', 'HomeController@showHome')->name('admin.home');

    Route::get('/home', function () {
        return redirect()->route('admin.home');
    });

    Route::get('/artists', 'ArtistController@index')->name('admin.artists.index');
    Route::get('/artists/categories', 'ArtistCategoryController@index')->name('admin.artists.categories.index');

    Route::get('/events', 'EventController@index')->name('admin.events.index');
    Route::get('/events/create', 'EventController@create')->name('admin.events.create');
    Route::post('/events', 'EventController@store')->name('admin.events.store');
    Route::get('/events/{event}/edit', 'EventController@edit')->name('admin.events.edit');
    Route::put('/events/{event}', 'EventController@update')->name('admin.events.update');
    Route::delete('/events/{event}', 'EventController@destroy')->name('admin.events.destroy');

    Route::get('/events/archives', 'EventArchiveController@index')->name('admin.events.archives.index');

    Route::get('/street-data', 'StreetDataController@index')->name('admin.street_data.index');
    Route::get('/street-data/archives', 'StreetDataArchiveController@index')->name('admin.street_data.archives.index');

    Route::get('/users', 'UserController@index')->name('admin.users.index');

    Route::get('/roles', 'RoleController@index')->name('admin.roles.index');
});
