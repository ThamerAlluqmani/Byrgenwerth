<?php

use Illuminate\Support\Facades\Route;




Route::group(['prefix' => '{language}'], function () {



    Route::get('/' , 'PageControl@index')->name('index');
    Auth::routes();
    Route::get('dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('articles' , 'ArticleController');
    Route::post('comments/{article}' , 'CommentController@store')->name('comments.store');
    Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');



});
