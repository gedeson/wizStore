<?php

class CartController extends BaseController {
	
	public function index() {
		
		$solicitations = Solicitation::where([
			'status' => array_search('Reservado', Config::get('constants.STATUS')),
			'user_id' => Auth::id()
		])->get();
		
		return View::make('cart.index', compact('solicitations'));
	}
	
	public function add() {
		
		$idProduct = Input::get('id');
		
		$product = Product::find($idProduct);
		if(empty($product->id)) {
			Session::flash('message-failure', 'T-shirt não encontrado em nossa loja!');
			return Redirect::route('cart.index');
		}
		
		$idUser = Auth::id();
		
		$idSolicitation = Solicitation::products($idUser);
		
		if(!is_numeric($idSolicitation)) {
			$newSolicitation = new Solicitation();
			$newSolicitation->user_id = $idUser;
			$newSolicitation->status = array_search('Reservado', Config::get('constants.STATUS'));
			$newSolicitation->save();
			
			$idSolicitation = $newSolicitation->id;
		}
		
		$purchase = new PurchaseSolicitation();
		
		$purchase->solicitation_id = $idSolicitation;
		$purchase->product_id = $idProduct;
		$purchase->price = $product->amount;
		$purchase->status = array_search('Reservado', Config::get('constants.STATUS'));
		$purchase->save();
		
		Session::flash('message-success', 'T-shirt adicionado ao carrinho com sucesso!');
		
		return Redirect::route('cart.index');
	}
	
	public function finish() {
		$idSolicitation = Input::get('solicitation_id');
		
		$idUser = Auth::id();
		
		$check_pedido = Solicitation::where([
			'id' => $idSolicitation,
			'user_id' => $idUser,
			'status' => array_search('Reservado', Config::get('constants.STATUS'))
		])->exists();
		
		if(!$check_pedido) {
			Session::flash('message-failure', 'Pedido não encontrado!');
			return Redirect::route('home');
		}
		
		$check_produtos = PurchaseSolicitation::where([
			'solicitation_id' => $idSolicitation
		])->exists();
		if(!$check_produtos) {
			Session::flash('message-failure', 'Produtos do pedido não encontrados!');
			return Redirect::route('home');
		}
		
		PurchaseSolicitation::where([
			'solicitation_id' => $idSolicitation
		])->update([
			'status' => array_search('Pago', Config::get('constants.STATUS'))
		]);
		Solicitation::where([
			'id' => $idSolicitation
		])->update([
			'status' => array_search('Pago', Config::get('constants.STATUS'))
		]);
		
		Session::flash('message-success', 'Compra concluída com sucesso!');
		
		return Redirect::route('home');
	}
	
}

?>