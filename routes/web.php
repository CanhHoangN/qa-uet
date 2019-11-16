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
// user

Route::get('/member/{id}',"PageController@profileUser")->name('profile_user');

// session
Route::get('session/un-question',"PageController@showSessionUnQuestion")->name('un_question');
Route::get('qa/session/check/{id}',"PageController@showCheckPass")->name("check_pass");
Route::get('session/{id}',"PageController@showSession")->name("show_detail_session")->middleware('required_pass:id');
Route::post('add/qa/{id}',"PageController@addQaToSession")->name("add_qa_session");
Route::get('required/qa/{id}',"PageController@requiredPassword")->name('required_password');
Route::post('post-password-required/{id}',"PageController@postRequiredPassword")->name("post_required_password");
Route::get('session/question/{id_question}/{id}',"PageController@showQuestion")->name("show_question");
Route::post('post/comment/{id_question}',"PageController@addCommentToQuestion")->name('add_comment');
Route::post('post/comment/in/{id_question}/{id_comment}',"PageController@addCommentToComment")->name('add_comment_in_comment');
Route::get('like/question/{id_question}',"PageController@likeQuestion")->name('like_question');
Route::get('unlike/question/{id_question}',"PageController@unlikeQuestion")->name('un_like_question');
Route::get('delete/session/{id}',"PageController@deleteSession")->name('delete_session');
Auth::routes();

// survey
Route::get('/handle/survey/{id}',"SurveyController@handlerSurvey")->name('handle.survey');
Route::get('/survey',"SurveyController@home")->name('survey');
Route::get('/survey/new', 'SurveyController@new_survey')->name('new.survey');
Route::get('/survey/{id}', 'SurveyController@detail_survey')->name('detail.survey');
Route::get('/survey/view/{survey}', 'SurveyController@view_survey')->name('view.survey');
Route::get('/survey/answers/{survey}', 'SurveyController@view_survey_answers')->name('view.survey.answers');
Route::get('/survey/{survey}/delete', 'SurveyController@delete_survey')->name('delete.survey');

Route::get('/survey/{survey}/edit', 'SurveyController@edit')->name('edit.survey');
Route::patch('/survey/{survey}/update', 'SurveyController@update')->name('update.survey');

Route::post('/survey/view/{survey}/completed', 'AnswerController@store')->name('complete.survey');
Route::post('/survey/create', 'SurveyController@create')->name('create.survey');

// Questions related
Route::post('/survey/{survey}/questions', 'QuestionController@store')->name('store.question');

Route::get('/question/{question}/edit', 'QuestionController@edit')->name('edit.question');
Route::patch('/question/{question}/update', 'QuestionController@update')->name('update.question');
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
