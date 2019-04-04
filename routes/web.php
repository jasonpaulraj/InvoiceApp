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
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/phpinfo', function () {
    return view('phpinfo');
})->name('phpinfo');
//Companies
Route::get('companies', 'Companies@index')->name('company-list');
Route::get('company/view/{id}', 'Companies@show')->name('company-view');
Route::get('company/add', 'Companies@create')->name('company-add');
Route::post('company/store', 'Companies@store')->name('company-add-store');
Route::get('company/edit/{id}', 'Companies@edit')->name('company-edit');
Route::post('company/update/{id}', 'Companies@update')->name('company-update');
Route::get('company/delete/{id}', 'Companies@delete')->name('company-delete');

//Invoices
Route::get('invoices', 'InvoiceController@show')->name('invoice-list');
Route::get('invoice/view/{id}', 'InvoiceController@show')->name('invoice-view');
Route::get('invoice/add', 'InvoiceController@create')->name('invoice-add');
Route::post('invoice/store', 'InvoiceController@store')->name('invoice-store');
Route::get('invoice/edit/{id}', 'InvoiceController@edit')->name('invoice-edit');
Route::post('invoice/update/{id}', 'InvoiceController@update')->name('invoice-update');
Route::get('invoice/delete/{id}', 'InvoiceController@delete')->name('invoice-delete');
Route::get('generate-pdf', 'InvoiceController@pdfview')->name('generate-pdf');
