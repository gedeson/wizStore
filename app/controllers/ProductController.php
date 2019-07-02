<?php


class ProductController extends BaseController {
	
	public function getIndex() {
		
		$products = Product::get();
		return View::make('product.index', compact('products'));
	}
	
	public function getNew() {
		$titulo = 'Novo Produto - Wiz Store';
		$product = new Product();
		
		return View::make('product.new', compact('titulo', 'product'));
	}
	
	public function postNew() {
		$product = new Product();		
		$product->title = Input::get('title');
		$product->size = Input::get('size');
		$product->color = Input::get('color');
		$product->type = Input::get('type');
		$product->amount = Input::get('amount');
		
		if (Input::hasFile('image')) {
			$this->saveFile($product);
		}
		
		$product->save();
		
		return Redirect::to('/product');
	}
	
	public function getUpdate($id) {
		$product = Product::find($id);
		$titulo = 'Editar product - Wiz Store';
		
		return View::make('product.update', compact('product', 'titulo', 'product'));
	}
	
	public function postUpdate() {
		$product = Product::find(Input::get('id'));
		
		$product->title = Input::get('title');
		$product->size = Input::get('size');
		$product->color = Input::get('color');
		$product->type = Input::get('type');
		$product->amount = Input::get('amount');
		
		if (Input::hasFile('image')) {
			$this->saveFile($product);
		}
	
		$product->save();
		
		return Redirect::to('/product');
	}
	
	public function getDelete($id) {
		$product = Product::find($id);
		$product->delete();
		
		return Redirect::to('/product');
	}
	
	public function saveFile($product) {
			$uniqueId = uniqid();
			$path = public_path()."/assets/images/";
			File::makeDirectory($path, $mode = 0777, true, true);
			
			$image      = Input::file('image');
			$extension  = $image->getClientOriginalExtension();
			$filename   = "$uniqueId.$extension";
			Image::make($image->getRealPath())->resize(150,150)->save($path.$filename);
			
			$product->image   =   $filename;
	}
}