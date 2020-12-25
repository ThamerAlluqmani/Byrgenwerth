<?php

use Illuminate\Support\Facades\Route;

Route::get('/' , 'PageControl@index')->name('index');
Route::get('/contact' , 'PageControl@contact')->name('contact');
Route::get('profile' , 'ProfileControl@index')->name('profile');
Auth::routes();
Route::get('dashboard', 'HomeController@index')->name('dashboard');
Route::resource('articles' , 'ArticleController');
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');
Route::post('comments/{article}' , 'CommentController@store')->name('comments.store');
Route::delete('comments/{comment}' , 'CommentController@destroy')->name('comments.destroy');
Route::get('set-locale/{locale}', function ($locale) {
    App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->middleware('change.locale')->name('locale.setting');




