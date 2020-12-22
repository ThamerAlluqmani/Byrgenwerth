<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'PageControl@index')->name('index');
Auth::routes();
Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::resource('articles' , 'ArticleController');
Route::resource('comments/{article}' , 'CommentController');
//Auth::routes(['verify' => true]);
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');





