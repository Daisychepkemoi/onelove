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
Route::get('/login', 'SessionsController@create')->name('login'); 
Route::post('/login', 'SessionsController@store'); 
Route::get('/logout', 'SessionsController@destroy'); 
Route::get('/register', 'RegistrationController@create'); 
Route::get('/activate/{id}', 'RegistrationController@update'); 
Route::get('/activate', 'RegistrationController@activate'); 
Route::post('/register','RegistrationController@store');
Route::get('/proposal','ProposalController@create');
Route::post('/proposal','ProposalController@store');

Route::get('/draft/{id}','ProposalController@savedraft');
Route::get('/drafts/{id}','ProposalController@savedraftt');
Route::get('/submitproposal/{id}','ProposalController@finalsubmit')->name('finalsumit');
Route::get('/submittproposal/{id}','ProposalController@finalsubmitt');
Route::get('/deletedraft/{id}','ProposalController@destroy');
// Route::post('/submitproposal/{id}','ProposalController@finalsubmit')->name('finalsumit');
// Route::get('/submitproposal','ProposalController@update');


Route::get('/admin','AdminController@create');
Route::get('/admin/{id}','AdminController@show');

Route::get('/admin/{id}/stage1','AdminController@stage1');
Route::get('/admin/{id}/stage2','AdminController@stage2');
Route::get('/admin/{id}/reject','AdminController@reject');
Route::get('/admin/{id}/accepted','AdminController@accept');

Route::get('/rejected','AdminController@rejected');
Route::get('/stageone','AdminController@stageone');
Route::get('/stagetwo','AdminController@stagetwo');
Route::get('/accepted','AdminController@accepted');
Route::get('/newproposals','AdminController@newproposals');
Route::get('/back','AdminController@backs');

Route::get('/rejecteduser','UsersController@rejected');
Route::get('/stageoneuser','UsersController@stageoneuser');
Route::get('/stagetwouser','UsersController@stagetwouser');
Route::get('/sentproposals','ProposalController@view');
Route::get('/accepteduser','UsersController@accepteduser');
Route::get('/userback','UsersController@userback');
Route::get('/userdrafts','UsersController@userdrafts');
Route::post('/submitchange/{id}','ProposalController@update');


 // Auth::routes();s

 // Route::get('/activate', 'HomeController@activate');

