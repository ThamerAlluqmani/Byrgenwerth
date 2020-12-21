<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'PageControl@index')->name('index');
Auth::routes();
Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::resource('articles' , 'ArticleController');
Route::post('comments/{article}' , 'CommentController@store')->name('comments.store');
//Auth::routes(['verify' => true]);
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');




