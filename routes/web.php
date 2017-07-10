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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){

    Route::group(['middleware' => ['guest:admin']], function(){
        Route::prefix('password')->group(function(){
            Route::get('/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
            Route::post('/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
            Route::get('/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
            Route::post('/reset', 'Admin\ResetPasswordController@reset');            
        });
    
        Route::post('/login', 'Admin\LoginController@login');
        Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
        Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register');
        Route::post('/register', 'Admin\RegisterController@register');
    });

    Route::group(['middleware' => ['auth:admin']], function(){
        Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
        Route::post('/logout', 'Admin\LoginController@logout')->name('admin.logout');
    });
     

});