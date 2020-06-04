<?php

use Illuminate\Support\Facades\Route;
use App\User ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
if(Auth::check()){
        return redirect('home');
    }
    
    else{
        return redirect('login') ;
    }
*/

Route::post('/print', 'RapportController@getClient')->middleware('can:mange');

Route::get('/print/pdf', 'RapportController@getClient')->middleware('can:mange');






Route::get('/login', 'Log@showLoginForm')->name('login');
Route::post('/login', 'Log@login');
Route::post('/logout', 'Log@logout');
//Route::get('/dynamic_pdf/portes', 'DynamicPDFController@portes');
//Route::get('/dynamic_pdf/autres_mesures', 'DynamicPDFController@autres_mesures');
//Auth::routes();
Route::get('/dynamic_pdf/pvc/pdf', 'RecPDFController@pdf_pvc');
Route::get('/dynamic_pdf/bois/pdf', 'RecPDFController@pdf_bois');

Route::get('/dynamic_pdf/portes/pdf', 'DynamicPDFController@pdf_portes');
Route::get('/dynamic_pdf/autres_mesures/pdf', 'DynamicPDFController@pdf_mesures');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/clienttoedit/{id}', 'HomeController@clientToEdit')->middleware('can:mange');
Route::get('/deleteclient/{id}', 'HomeController@deleteClient')->middleware('can:mange');
Route::get('/users/input', 'HomeController@allUsers')->middleware('auth') ;
Route::get('/clients' , 'ClientController@index')->name('new-client') ;
Route::get('/clients/edit/{id}' , 'ClientController@edit')->middleware('auth') ;
Route::patch('/clients/edit/{id}' , 'ClientController@update')->middleware('auth') ;
Route::patch('/clients/editstaut/{id}' , 'ClientController@statu')->middleware('auth') ;

Route::post('/client' , 'ClientController@store') ;

Route::post('/confirmation' , 'ConfirmationController@store')->middleware(['can:mange'||'can:actiu']) ;
Route::get('/confirmation/{id}' , 'ConfirmationController@index')->middleware(['can:mange'||'can:actiu']) ;

Route::get('/devis/client/{id}' , 'DevisController@index')->middleware('auth') ;
Route::post('/devis' , 'DevisController@store')->middleware('auth') ;
Route::get('/devis' , 'DevisController@tousLesDevis')->middleware('can:mange');
Route::get('/devis/fac' , 'DevisController@tousLesFac')->middleware('can:mange');
Route::delete('/devis/{id}' , 'DevisController@delete')->middleware('can:mange') ;
Route::patch('devis/fact/{id}','DevisController@addFacture')->middleware('auth');
Route::patch('devis/edit/{id}','DevisController@editDevis')->middleware('auth');
    
Route::get('/facture/client/{id}' , 'FactureController@index')->middleware('can:mange') ;
Route::post('/facture' , 'FactureController@store')->middleware('can:mange') ;
Route::get('/factures' , 'FactureController@tousLesFactures')->middleware('can:mange') ;
Route::delete('/facture/{id}' , 'FactureController@delete')->middleware('can:mange') ;
Route::get('/facture/{id}' , 'FactureController@get')->middleware('can:mange') ;
Route::patch('/facture/add/{id}' , 'FactureController@ajouter')->middleware('can:mange') ;
Route::patch('/facture/remove/{id}' , 'FactureController@retirer')->middleware('can:mange') ;

Route::get('/mesures' , 'MesureController@tousLesMesures')->middleware('can:mange') ;
Route::get('/mesuresactiu' , 'MesureController@tousLesMesuresActiu')->middleware('can:actiu') ;
Route::get('/mesures/client/{id}' , 'MesureController@index')->middleware('auth');
Route::post('/mesure' , 'MesureController@store')->middleware('auth');
Route::delete('/mesure/{id}' , 'MesureController@delete')->middleware(['can:mange'||'can:actiu']) ;


Route::post('/croquis' , 'CroquisController@store')->middleware(['can:mange'||'can:actiu']);
Route::get('/croquis/client/{id}' , 'CroquisController@index')->middleware('auth');
Route::post('/croquis/image' , 'CroquisController@upload')->middleware(['can:mange'||'can:actiu']);

Route::post('/reclamations' , 'ReclamationController@store')->middleware('can:mange') ;
Route::get('/reclamations' , 'ReclamationController@index')->middleware('can:mange') ;
Route::patch('/reclamation/edit/{id}' , 'ReclamationController@update')->middleware('can:mange') ;
Route::patch('/reclamation/cancel/{id}' , 'ReclamationController@cancel')->middleware('can:mange') ;
Route::delete('/reclamation/{id}' , 'ReclamationController@delete')->middleware('can:mange') ;

Route::get('/decharges' , 'DechargeController@index')->middleware('can:mange') ;
Route::post('/decharge' , 'DechargeController@store')->middleware('can:mange') ;


Route::get('/files/{type}/{id?}', 'FileController@index');

Route::post('files/add', 'FileController@store');
Route::post('files/edit/{id}', 'FileController@edit');
Route::post('files/delete/{id}', 'FileController@destroy');


/*  admins stuff */ 
  //Route::resource('/admin', 'Admin\\UsersController');
  
  Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:mange')->group(function(){
    Route::resource('/', 'UsersController');
    Route::get('/users/{id}', 'UsersController@edit')->name('edit');
    Route::post('/users/{id}', 'UsersController@update')->name('update');
    //Route::get('/clients', 'UsersController@showClients')->name('clients');
    //Route::get('/users', 'UsersController@showUsers')->name('users');
   
    Route::get('/clients/{id}', 'UsersController@showClient')->name('client');
  }) ;

