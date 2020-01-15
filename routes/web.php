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

// Guess User

Route::get('/', function () { return view('welcome'); });

Route::post('find', 'OpenPageController@queryredirectform')->name('queryredirectform');

Route::get('/find/{tags}', 'OpenPageController@querycommunity')->name('communityquery');

Route::get('/find','OpenPageController@communityList')->name('communityLists');

Auth::routes();

// Authentication Controller

Route::get('/home', 'HomeController@index')->name('home');


// Admin Controller 

Route::group(['middleware' => 'auth'], function () {

    Route::get('/add/community', 'CommunityController@create')->name('newCommunityForm');

    Route::get('/add/community/{communityid}/link', 'CommunityLinkController@create')->name('newCommunitylinkForm');

    Route::Post('/add/community/link', 'CommunityLinkController@store')->name('newCommunitylinkCreate');

    Route::Post('/add/community', 'CommunityController@store')->name('newCommunityCreate');

    Route::get('/add/community/{cid}/tag', 'CommunityTagController@create')->name('newCommunityTagForm');

});



// Route::get('/communities','OpenPageController@communityList')->name('communityLists');