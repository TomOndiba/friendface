<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
* Home
*/

Route::get('/', [
    
    'uses' => '\Friendface\Http\Controllers\HomeController@index',
    'as' => 'home'
    
]);


/**
* Authentification
*/

Route::get('/signup', [
    
    'uses' => '\Friendface\Http\Controllers\AuthController@getSignup',
    'as' => 'auth.signup',
    'middleware' => ['guest']
    
]);

Route::post('/signup', [
    
    'uses' => '\Friendface\Http\Controllers\AuthController@postSignup',
    'middleware' => ['guest']
    
]);

Route::get('/signin', [
    
    'uses' => '\Friendface\Http\Controllers\AuthController@getSignin',
    'as' => 'auth.signin',
    'middleware' => ['guest']
    
]);

Route::post('/signin', [
    
    'uses' => '\Friendface\Http\Controllers\AuthController@postSignin',
    'middleware' => ['guest']
    
]);

Route::get('/signout', [
    
    'uses' => '\Friendface\Http\Controllers\AuthController@getSignout',
    'as' => 'auth.signout'
    
]);




/**
* Search
*/

Route::get('/search', [
    
    'uses' => '\Friendface\Http\Controllers\SearchController@getResults',
    'as' => 'search.results'
    
]);


/**
* User Profile
*/

Route::get('/user/{username}', [
    
    'uses' => '\Friendface\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index'
    
]);

Route::get('/profile/edit', [
    
    'uses' => '\Friendface\Http\Controllers\ProfileController@getEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth']
    
]);

Route::post('/profile/edit', [
    
    'uses' => '\Friendface\Http\Controllers\ProfileController@postEdit',
    'as' => 'profile.edit',
    'middleware' => ['auth']
    
]);


/**
* Friends
*/

Route::get('/friends', [
    
    'uses' => '\Friendface\Http\Controllers\FriendController@getIndex',
    'as' => 'friends.index',
    'middleware' => ['auth']
    
]);


Route::get('/friends/add/{username}', [
    
    'uses' => '\Friendface\Http\Controllers\FriendController@getAdd',
    'as' => 'friend.add',
    'middleware' => ['auth']
    
]);

Route::get('/friends/accept/{username}', [
    
    'uses' => '\Friendface\Http\Controllers\FriendController@getAccept',
    'as' => 'friend.accept',
    'middleware' => ['auth']
    
]);

Route::post('/friends/delete/{username}', [
    
    'uses' => '\Friendface\Http\Controllers\FriendController@postDelete',
    'as' => 'friend.delete',
    'middleware' => ['auth']
    
]);


/**
* Statuses
*/

Route::post('/status', [
    
    'uses' => '\Friendface\Http\Controllers\StatusController@postStatus',
    'as' => 'status.post',
    'middleware' => ['auth']
    
]);

Route::post('/status/{statusId}/reply', [
    
    'uses' => '\Friendface\Http\Controllers\StatusController@postReply',
    'as' => 'status.reply',
    'middleware' => ['auth']
    
]);

Route::get('/status/{statusId}/like', [
    
    'uses' => '\Friendface\Http\Controllers\StatusController@getLike',
    'as' => 'status.like',
    'middleware' => ['auth']
    
]);
