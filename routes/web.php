<?php

use Illuminate\Support\Facades\Route;

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
Config::set('debugbar.enabled', false);

Route::get('/', 'ContentController@getHome');



//Routers Auth
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/recover', 'ConnectController@getRecover')->name('recover');
Route::post('/recover', 'ConnectController@postRecover')->name('recover');
Route::get('/reset', 'ConnectController@getReset')->name('reset');
Route::post('/reset', 'ConnectController@postReset')->name('reset');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
// E-mail verification
Route::get('/confirmation', 'ConnectController@getEmailConfirmation')->name('verification');
Route::get('/confirmation/{code}', 'ConnectController@postEmailConfirmation')->name('verification');

//ModuleUserActions
Route::get('/account', 'UserController@getAccountHome')->name('account');
Route::get('/account/edit', 'UserController@getAccountEdit')->name('accountEdit');
Route::post('/account/edit/info', 'UserController@postAccountEdit')->name('accountEdit');
Route::get('/account/edit/password', 'UserController@getAccountPassword')->name('accountPassword');
Route::post('/account/edit/password', 'UserController@postAccountPassword')->name('accountPassword');



//ModuleContacts


//ModuleBlog
Route::get('/','PublicationController@getPublicationPost')->name('post');

//ModuleVoluntarios
Route::get('/volunteer/form', 'VolunteersController@getVolunteer')->name('volunteer');
Route::post('/volunteer/form', 'VolunteersController@postVolunteer')->name('volunteerForm');

//ModuleDonaciones
Route::get('/donations', 'ContentController@getDonationHome')->name('donation');

//ModuleHogares
Route::get('/homes/form', 'HomesController@getHomeIndex')->name('home');
Route::post('/homes/form', 'HomesController@postHomeIndex')->name('homeForm');

//ModuleColaboradores
Route::get('/collaborators/form', 'CollaboratorController@getCollaboratorHome')->name('collaborator');
Route::post('/collaborators/form', 'CollaboratorController@postCollaboratorHome')->name('collaboratorForm');


//ModuleAdoptions/padrinos
Route::get('/adoptions/file/{id}/adoptform', 'AdoptionController@getAdoptForm')->name('adoption');
Route::post('/adoptions/file/{id}/adoptform', 'AdoptionController@postAdoptForm')->name('adoptionForm');
Route::get('/adoptions/{status}', 'AdoptionController@getAdoptPost')->name('post');
Route::get('/adoptions/file/{id}', 'AdoptionController@getAdoptFile')->name('animalFile');
Route::get('/adoptions/file/{id}/parentform', 'AdoptionController@getGodparentForm')->name('godparentForm');
Route::post('/adoptions/file/{id}/parentform', 'AdoptionController@postGodparentForm')->name('godparentForm');

//ModuleStore
Route::get('/store', 'ContentController@getStoreHome')->name('store');
Route::get('/store/products', 'ContentController@getStoreProduct')->name('products');
Route::get('/store/cart', 'ContentController@getStoreCart')->name('cart');

