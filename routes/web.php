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

Route::get('/', 'ProposalController@index')->name('home'); 
Route::get('/proposal', 'ProposalController@create'); 
Route::get('/userproposal', 'ProposalController@view'); 

Route::get('/userproposal/{id}', 'ProposalController@open'); 
Route::get('/login', 'sessionsController@create')->name('login'); 
Route::post('/login', 'sessionsController@store'); 
Route::get('/logout', 'sessionsController@destroy'); 
Route::get('/register', 'registrationController@create'); 
Route::get('/activate/{id}', 'registrationController@update'); 
Route::get('/activate', 'registrationController@activate'); 
Route::post('/register','registrationController@store');
Route::get('/proposal','ProposalController@create');
Route::post('/proposal','ProposalController@store');

Route::get('/draft/{id}','ProposalController@savedraft');
Route::get('/drafts/{id}','ProposalController@savedraftt');
Route::get('/submitproposal/{id}','ProposalController@finalsubmit')->name('finalsumit');
Route::get('/submittproposal/{id}','ProposalController@finalsubmitt');
Route::get('/deletedraft/{id}','ProposalController@destroy');
// Route::post('/submitproposal/{id}','ProposalController@finalsubmit')->name('finalsumit');
// Route::get('/submitproposal','ProposalController@update');


Route::get('/admin','adminController@create');
Route::get('/admin/{id}','adminController@show');

Route::get('/admin/{id}/stage1','adminController@stage1');
Route::get('/admin/{id}/stage2','adminController@stage2');
Route::get('/admin/{id}/reject','adminController@reject');
Route::get('/admin/{id}/accepted','adminController@accept');

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
Route::get('/userdrafts','usersController@userdrafts');
Route::post('/submitchange/{id}','ProposalController@update');


 // Auth::routes();s

 // Route::get('/activate', 'HomeController@activate');

