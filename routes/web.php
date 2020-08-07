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
//INICIO
Route::get('/', 'ContentController@getHome')->name('inicio');
//NOTICIAS
Route::get('/','PublicationController@getPublicationPost')->name('post');
//CONTACTANOS
Route::get('/contact', 'ContentController@getContactHome')->name('contactos');
//QUIENES SOMOS
Route::get('/information', 'ContentController@getInformationHome')->name('quienessomos');
//QUIENES SERVICIO
Route::get('/service', 'ContentController@getVPIHome')->name('mashup');
//ADOPCIONES
Route::get('/adoptions/{status}', 'AdoptionController@getAdoptPost')->name('post');
//FICHA ANIMAL
Route::get('/adoptions/file/{id}', 'AdoptionController@getAdoptFile')->name('animalFile');
//FORMULARIO ADOPCIONIONES
Route::get('/adoptions/file/{id}/adoptform', 'AdoptionController@getAdoptForm')->name('adoptionForm');
Route::post('/adoptions/file/{id}/adoptform', 'AdoptionController@postAdoptForm')->name('adoptionForm');
//FORMULARIO PADRINOS
Route::get('/adoptions/file/{id}/parentform', 'AdoptionController@getGodparentForm')->name('godparentForm');
Route::post('/adoptions/file/{id}/parentform', 'AdoptionController@postGodparentForm')->name('godparentForm');
//HOGARES TEMPORALES
Route::post('/homes/form', 'HomeController@postHomeIndex')->name('homeForm');
Route::get('/homes/form', 'HomeController@getHomeIndex')->name('home');
//VOLUNTARIOS
Route::get('/volunteer/form', 'VolunteerController@getVolunteer')->name('volunteer');
Route::post('/volunteer/form', 'VolunteerController@postVolunteer')->name('volunteerForm');
//COLABORADORES
Route::get('/collaborators/form', 'CollaboratorController@getCollaboratorHome')->name('collaborator');
Route::post('/collaborators/form', 'CollaboratorController@postCollaboratorHome')->name('collaboratorForm');
//DONACIONES
Route::get('/donations', 'ContentController@getDonationHome')->name('donation');


//LOGIN FACEBOOK
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');


//AUTENTICACION
Route::get('/login', 'ConnectController@getLogin')->name('login');
Route::post('/login', 'ConnectController@postLogin')->name('login');
Route::get('/recover', 'ConnectController@getRecover')->name('recover');
Route::post('/recover', 'ConnectController@postRecover')->name('recover');
Route::get('/reset', 'ConnectController@getReset')->name('reset');
Route::post('/reset', 'ConnectController@postReset')->name('reset');
Route::get('/logout', 'ConnectController@getLogout')->name('logout');
Route::get('/register', 'ConnectController@getRegister')->name('register');
Route::post('/register', 'ConnectController@postRegister')->name('register');
//VERIFICAR EMAIL
Route::get('/confirmation', 'ConnectController@getEmailConfirmation')->name('verification');
Route::get('/confirmation/{code}', 'ConnectController@postEmailConfirmation')->name('verification');

//CUENTA DE USUARIO
Route::get('/account', 'UserController@getAccountHome')->name('account');
Route::get('/account/edit', 'UserController@getAccountEdit')->name('accountEdit');
Route::post('/account/edit/info', 'UserController@postAccountEdit')->name('accountEdit');
Route::get('/account/edit/password', 'UserController@getAccountPassword')->name('accountPassword');
Route::post('/account/edit/password', 'UserController@postAccountPassword')->name('accountPassword');







//TIENDA
Route::get('/products/{status}', 'StoreController@getProductPost')->name('post');
//Route::get('/products/{status}/{id}', 'StoreController@getProductProfile')->name('postProduct');

//TIENDA
//Route::get('/store', 'ContentController@getStoreHome')->name('store');
//Route::get('/store/products', 'ContentController@getStoreProduct')->name('products');
//ORDEN
Route::get('/products/{id}/cart', 'StoreController@getStoreCart')->name('cart');
Route::get('/products/{id}/cart/paid', 'StoreController@getStoreCartPaid')->name('cart');















