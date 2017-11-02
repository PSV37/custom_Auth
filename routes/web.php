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
});

Route::post('login','LoginController@login')->name('login');


Route::post('logout','LoginController@logout')->name('logout');



Auth::routes();

//display hom page
Route::get('/home', 'HomeController@index')->name('home');

//display registred User list
Route::get('register/user','UserController@index')->name('registeruser');

//display edit view of registred user
Route::get('user/{id}/edit','UserController@registereditview');

//update data of registred user
Route::post('register/update','UserController@registeredit')->name('registerupdate');

//deleted registred user
Route::get('user/{id}/delete','UserController@registerdelete');

//Add new user
Route::get('create/user','AddController@create')->name('createuser');

//updata added user
Route::post('add/user','AddController@adduser');

//added userlist
Route::get('userlist','AddController@userlist')->name('userlist');

//display edit view of added user
Route::get('adduser/{id}/edit','AddController@addeduseredit');

//update data of added user
Route::post('user/update','AddController@userupdate')->name('addedupdate');

//deleted added user
Route::get('adduser/{id}/delete','AddController@userdelete');

//Display View For set user password
Route::get('sendEmailDone/{email}/{verifyToken}','AddController@sendEmailDone');

//Set Password
Route::post('reset/password','AddController@setpassword')->name('reset');

//User Profile
Route::get('adduser/image/{id}','UserController@profile')->name('profile');

Route::post('image/upload','UserController@upload');


/*********************************** About Orgnization  ***************************************/

//create orgnization
Route::get('create/orgnization','OrgnizationController@create')->name('create');

//add orgnization
Route::post('add/orgnization','OrgnizationController@store');

//orgnization list
Route::get('orgnization/list','OrgnizationController@index')->name('list');

//display edit view
Route::get('orgnization/{id}/edit','OrgnizationController@edit');

//update orgnization
Route::post('update/orgnization','OrgnizationController@update');

//Delete Orgnization 
Route::get('orgnization/{id}/delete','OrgnizationController@destroy');