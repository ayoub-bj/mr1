<?php

use App\Http\Controllers\EmployesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetardController;

use App\Http\Controllers\AbsenceController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\StatisticsController;



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

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('employes', 'EmployesController');
    Route::get('employes/{id}/certificate', 'EmployesController@getWorkCertificate')
        ->name('work.certificate');
    Route::get('employes/{id}/vacation', 'EmployesController@vacationRequest')
        ->name('work.vacation');
        Route::resource('conges', 'CongeController');
       Route::resource('accomplissements', 'AccomplissementController');
      //  Route::get('admin/accomplissements/create', 'AccomplissementController@create')->name('accomplissements.create');
      Route::resource('absences', 'AbsenceController');
     

      Route::resource('retards', 'RetardController');
        
      Route::resource('statistics', 'StatisticsController');
      // routes/web.php

Route::get('/statistics/{id}/retards', 'StatisticsController@retards')->name('statistics.retards');

Route::get('/statistics/{id}/conges', 'StatisticsController@conges')->name('statistics.conges');
Route::get('/statistics/{id}/accomplissements', 'StatisticsController@accomplissements')->name('statistics.accomplissements');
Route::get('/statistics/{id}/absences', 'StatisticsController@absences')->name('statistics.absences');



    // web.php


});
