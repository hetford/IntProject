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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/archive', 'ArchiveController@index')->name('archiveindex');

Route::get('/document/add', 'DocumentController@add')->name('documentadd');

Route::post('/document/upload', 'DocumentController@uploadFile')->name('documentupload');

Route::get('/document/edit/{docId}', 'DocumentController@editView')->name('documentedit');

Route::post('/document/edit/{docId}', 'DocumentController@editSubmit')->name('documenteditsubmit');

Route::get('/document/delete/{docId}', 'DocumentController@deleteDoc')->name('documentdelete');

Route::get('/document/activate/{docId}', 'DocumentController@activateDoc')->name('documentactivate');

Route::get('/admin/users/', 'UserController@getUsers')->name('sysadminuserindex');

Route::get('/admin/users/edit/{userID}', 'UserController@editUser')->name('sysadminuseredit');

Route::post('/admin/users/edit/{userID}', 'UserController@submitEditUser')->name('sysadminusereditsubmit');

Route::get('/admin/users/delete/{userID}', 'UserController@deleteUser')->name('sysadminuserdelete');