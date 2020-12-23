<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'PageControl@index')->name('index');
Route::get('/contact' , 'PageControl@contact')->name('contact');
Auth::routes();
Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::resource('articles' , 'ArticleController');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
//Route::delete('comments/{article}' , 'CommentController@destroy')->name('comments.destroy');
Route::post('comments/{article}' , 'CommentController@store')->name('comments.store');



