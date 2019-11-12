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

Route::get('/',"PageController@index")->name('home');
//Route::get('/login',function);


// session
Route::get('qa/session/check/{id}',"PageController@showCheckPass")->name("check_pass");
Route::get('qa/session/{id}',"PageController@showSession")->name("show_detail_session")->middleware('required_pass:id');
Route::post('add/qa/{id}',"PageController@addQaToSession")->name("add_qa_session");
Route::get('required/qa/{id}',"PageController@requiredPassword")->name('required_password');
Route::post('post-password-required/{id}',"PageController@postRequiredPassword")->name("post_required_password");
Route::get('qa/session/question/{id_question}/{id}',"PageController@showQuestion")->name("show_question");
Route::post('post/comment/{id_question}',"PageController@addCommentToQuestion")->name('add_comment');
Route::post('post/comment/in/{id_question}/{id_comment}',"PageController@addCommentToComment")->name('add_comment_in_comment');
Auth::routes();


// create session
Route::post('/session',"PageController@createSession")->name('session');
// Authentication Routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm'
]);
Route::post('login', [
    'as' => 'post_login',
    'uses' => 'Auth\LoginController@login'
]);
Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail'
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm'
]);
Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset'
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm'
]);
Route::post('register', [
    'as' => 'post_register',
    'uses' => 'Auth\RegisterController@register'
]);


