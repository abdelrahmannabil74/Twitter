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



Route::group(['middleware' =>['auth']],function (){


//Route::get('login','AuthController@login');

});

Auth::routes();
Route::group(['middleware' =>['auth']],function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/','NewsFeedController@index')->name('news_feed');

    Route::post('/tweets', 'TweetController@store')->name('create_tweet');

    Route::get('/profile/{id}', 'ProfileController@index')->name('profile');

    Route::post('/profile/tweet', 'ProfileController@like')->name('like');

    Route::post('/profile/followers', 'ProfileController@follow')->name('followers');

    Route::get('/search/user', 'NewsFeedController@searchUser')->name('search');

    Route::get('/myProfile', 'ProfileController@profile')->name('my_profile');

    Route::get('/tweets/{tweet_id}', 'TweetController@deleteTweet')->name('delete_tweet');
});
