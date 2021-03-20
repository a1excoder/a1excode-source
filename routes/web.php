<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/',
    '\App\Http\Controllers\PostController@getMainPage'
)->name('welcome-page');

Route::get('/post/{id}',
    '\App\Http\Controllers\PostController@getPostPage'
)->name('post-page');

Route::post('/post/{id}/submit',
    '\App\Http\Controllers\PostController@setComment'
)->name('post-page-submit');

Route::get('posts/{category}',
    '\App\Http\Controllers\PostController@getPostsPage'
)->name('posts-page');

Route::get('search',
    '\App\Http\Controllers\PostController@getSearchPage'
)->name('search-page');

Route::post('/send/submit',
    '\App\Http\Controllers\MessageController@sendMessage'
)->name('index.page.message');

Route::post('/weather/submit/',
    '\App\Http\Controllers\WeatherController@getWeather'
)->name('index.weather.get');


Auth::routes();

Route::get('/home',
    [App\Http\Controllers\HomeController::class, 'index']
)
    ->name('home');

Route::post('/home/edit/name',
    'App\Http\Controllers\HomeController@editName'
)
    ->name('user.edit.name');

Route::post('/home/edit/password',
    'App\Http\Controllers\HomeController@editPassword'
)
    ->name('user.edit.password');

Route::post('/home/delete/account',
    'App\Http\Controllers\HomeController@deleteAccount'
)
    ->name('user.delete.account');



/* admin pages */

Route::get('/admin',
    '\App\Http\Controllers\AdminController@adminPage'
)
    ->middleware('is_admin')
    ->name('admin-page');


Route::post('/admin/new',
    '\App\Http\Controllers\AdminController@setNewPost'
)
    ->middleware('is_admin')
    ->name('admin-new-post');


Route::post('/admin/delete',
    '\App\Http\Controllers\AdminController@deletePost'
)
    ->middleware('is_admin')
    ->name('admin-delete-post');


Route::get('/admin/update/',
    '\App\Http\Controllers\AdminController@updatePost'
)
    ->middleware('is_admin')
    ->name('admin-update-post');


Route::post('/admin/update/submit',
    '\App\Http\Controllers\AdminController@updateNewPost'
)
    ->middleware('is_admin')
    ->name('admin-update-post-success');


Route::post('/admin/upload',
    '\App\Http\Controllers\AdminController@uploadImage'
)
    ->middleware('is_admin')
    ->name('admin.upload');


Route::post('admin/category/new',
    '\App\Http\Controllers\AdminController@createCategory'
)->name('admin.new.category');

Route::post('admin/category/delete',
    '\App\Http\Controllers\AdminController@deleteCategory'
)->name('admin.delete.category');