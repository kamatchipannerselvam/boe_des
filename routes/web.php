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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
Route::get('boeinb/', 'ReceiveboeinbController@index')->name('boeinb.index');
Route::get('boeinb/stepone', 'ReceiveboeinbController@createStepOne')->name('boeinb.stepone');
Route::post('boeinb/poststepone', 'ReceiveboeinbController@postCreateStepOne')->name('boeinb.poststepone');
Route::get('boeinb/steptwo', 'ReceiveboeinbController@createStepTwo')->name('boeinb.steptwo');
Route::post('boeinb/poststeptwo', 'ReceiveboeinbController@postCreateStepTwo')->name('boeinb.poststeptwo');
Route::get('boeinb/stepthree', 'ReceiveboeinbController@createStepThree')->name('boeinb.stepthree');
Route::post('boeinb/poststepthree', 'ReceiveboeinbController@postCreateStepThree')->name('boeinb.poststepthree');
  
Route::get('mproducts/file-import-export', 'MProductController@fileImportExport')->name('mproducts.file-import-export');
Route::post('mproducts/file-import', 'MProductController@fileImport')->name('mproducts.file-import');
Route::get('mproducts/file-export', 'MProductController@fileExport')->name('mproducts.file-export');
Route::get('mproducts/listitems', 'MProductController@getProducts')->name('mproducts.listitems');
Route::get('mproducts/itemdetails', 'MProductController@getProductdetails')->name('mproducts.itemdetails');

Route::get('mpcoos/file-import-export', 'MPcooController@fileImportExport')->name('mpcoos.file-import-export');
Route::post('mpcoos/file-import', 'MPcooController@fileImport')->name('mpcoos.file-import');
Route::get('mpcoos/file-export', 'MPcooController@fileExport')->name('mpcoos.file-export');
Route::get('mpcoos/listcoo', 'MPcooController@getCoo')->name('mpcoos.listcoo');

Route::get('mpcurs/file-import-export', 'MpcurController@fileImportExport')->name('mpcurs.file-import-export');
Route::post('mpcurs/file-import', 'MpcurController@fileImport')->name('mpcurs.file-import');
Route::get('mpcurs/file-export', 'MpcurController@fileExport')->name('mpcurs.file-export');
Route::get('mpcurs/listcurrency', 'MpcurController@getCurrency')->name('mpcurs.listcurrency');

Route::get('mcustomers/file-import-export', 'McustomersController@fileImportExport')->name('mcustomers.file-import-export');
Route::post('mcustomers/file-import', 'McustomersController@fileImport')->name('mcustomers.file-import');
Route::get('mcustomers/file-export', 'McustomersController@fileExport')->name('mcustomers.file-export');
Route::get('mcustomers/listcustomer', 'McustomersController@getCustomer')->name('mcustomers.listcustomer');


Route::post('obstockreq/create-order', 'ObstockreqControler@createOrder')->name('obstockreq.create-order');
Route::get('obstockreq/send-order', 'ObstockreqControler@sendOrder')->name('obstockreq.send-order');

});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('home', HomeController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('mproducts', MProductController::class);
    Route::resource('mpcoos', MPcooController::class);
    Route::resource('mpcurs', MpcurController::class);
    Route::resource('mcustomers', McustomersController::class);
    Route::resource('boeinb', ReceiveboeinbController::class);
});
