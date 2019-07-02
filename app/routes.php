<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::when('*', 'csrf', array('post'));


// Visitor
Route::get('/',
	array(
		'as' => 'home',
		'uses' => 'HomeController@getIndex'
	)
);

Route::get('login', 'HomeController@getLogin');
Route::post('login', 'HomeController@postLogin');
Route::get('logout', 'HomeController@getlogout');


Route::get('register', 'UserController@getRegister');
Route::post('register', 'UserController@postRegister');

//detail products
Route::get('/detail/{id}',
	array(
		'as' => 'detail',
		'uses' => 'HomeController@detail'
	)
);
Route::get('/cart/add', function() {
	return Redirect::to('home');
});

Route::get('/cart', array( 'as'=> 'cart.index', 'uses'=>'CartController@index'));
Route::post('/cart/finish', array( 'as'=> 'finish', 'uses'=>'CartController@finish'));

Route::post('search', array( 'as'=> 'search', 'uses'=>'HomeController@search'));

//Checks if user is logged in
Route::group(array('before' => 'auth'), function()
{
	
// Article Routes
Route::controller('home', 'HomeController');
	
//cart
	Route::post('/cart/add',
		array(
			'as' => 'cart.add',
			'uses' => 'CartController@add'
		)
	);
	
	// Rotas do administrador
	Route::group(array('before' => 'auth.admin'), function()
	{
		Route::controller('report','ReportController'
		);
		// User Routes
		Route::controller('user', 'UserController');
		
		// Product Routes
		Route::controller('product', 'ProductController');
	});
	
});