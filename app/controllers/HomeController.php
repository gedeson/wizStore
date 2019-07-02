<?php

class HomeController extends BaseController {
	
	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	public function getIndex() {
		$products = Product::get();
		return View::make('home.index', compact('products'));
	}
	
	public function detail($id = null)
	{
		if( !empty($id) ) {
			$detail = Product::where([
				'id'    => $id,
			])->first();
			
			if( !empty($detail) ) {
				return View::make('home.detail', compact('detail'));
			}
		}
		
		return Redirect::to('home');
	}
	
	public function getLogin() {
		$titulo = 'Entrar - Desenvolvendo com Laravel';
		return View::make('home.login', compact('titulo'));
	}
	
	public function postLogin() {
		// Opção de lembrar do usuário
		$remember = false;
		if(Input::get('remember')) {
			$remember = true;
		}
		
		// Autenticação
		if(Auth::attempt(array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		), $remember)) {
			return Redirect::to('home');
		} else {
			return Redirect::to('login')
				->with('flash_error', 1)
				->withInput();
		}
	}
	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('login');
	}
	
	public function search() {
		$products = Product::searchProducts();
		
		return View::make('home.index', compact('products'));
	}
	
	public function report() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('title, price, type, count(`product`.`type`) as type_count, color'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			->groupBy('type');
		$reports = $report->get();
		$allReports = $report->count();
		
		return View::make('report.index', compact('reports', 'allReports'));
	}
}
