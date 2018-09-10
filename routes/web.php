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

Route::get('/', 'proposalController@index')->name('home'); 
Route::get('/proposal', 'ProposalController@create'); 
Route::get('/userproposal', 'ProposalController@view'); 

Route::get('/userproposal/{id}', 'ProposalController@open'); 
Route::get('/login', 'sessionsController@create')->name('login'); 
Route::post('/login', 'sessionsController@store'); 
Route::get('/logout', 'sessionsController@destroy'); 
Route::get('/register', 'registrationController@create'); 
Route::get('/register/activate', 'registrationController@activate'); 
Route::post('/register','registrationController@store');
Route::get('/proposal','ProposalController@create');
Route::post('/proposal','ProposalController@store');
Route::get('/draft','draftsController@store');


Route::get('/admin','adminController@create');
Route::get('/admin/{id}','adminController@show');

Route::get('/admin/{id}/stage1','adminController@update');
Route::get('/admin/{id}/stage2','stage3Controller@update');
Route::get('/admin/{id}/reject','ProposalController@update');
Route::get('/admin/{id}/accepted','acceptController@update');
Route::get('/rejected','adminController@rejected');
Route::get('/stageone','adminController@stageone');
Route::get('/stagetwo','adminController@stagetwo');
Route::get('/accepted','adminController@accepted');
Route::get('/newproposals','adminController@newproposals');
Route::get('/back','adminController@backs');
Route::get('/rejecteduser','usersController@rejected');

Route::get('/stageoneuser','usersController@stageoneuser');
Route::get('/stagetwouser','usersController@stagetwouser');
Route::get('/sentproposals','ProposalController@view');
Route::get('/accepteduser','usersController@accepteduser');
Route::get('/userback','usersController@userback');


 // Auth::routes();s

 // Route::get('/home', 'HomeController@index')->name('home');

