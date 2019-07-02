<?php

class UserController extends BaseController {
	public function getIndex() {
		$users = User::get();
		
		return View::make('user.index', compact('users'));
	}
	
	public function getNew() {
		$titulo = 'Cadastro de utilizadores';
		
		$user = new User();
		return View::make('user.new', compact('titulo', 'user'));
	}
	
	public function postNew() {
		
		$user = new User();
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->role = Input::get('role');
		$user->country = Input::get('country');
		$user->password = Hash::make(Input::get('password'));
		
		$user->save();
		
		return Redirect::to('/user');
	}
	
	public function getUpdate($id) {
		$user = User::find($id);
		$titulo = 'Editar utilizador';
		
		return View::make('user.update', compact('user', 'titulo'));
	}
	
	public function postUpdate() {
		$user = User::find(Input::get('id'));
		
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->country = Input::get('country');
		$user->role = Input::get('role');
		
		if(Input::get('password')) {
			$user->password = Hash::make(Input::get('password'));
		}
		
		$user->save();
		
		return Redirect::to('/user');
	}
	
	public function getDelete($id) {
		$user = User::find($id);
		$user->delete();
		
		return Redirect::to('/user');
	}
	
	public function getLogout() {
		Auth::logout();
		return Redirect::to('login');
	}
	
	public function getRegister() {
		$titulo = 'Cadastro de utilizadores';
			
		$user = new User();
		return View::make('user.new', compact('titulo', 'user'));
	}
	
	public function postRegister() {
		$user = new User();
		$user->name = Input::get('name');
		$user->email = Input::get('email');
		$user->country = Input::get('country');
		$user->password = Hash::make(Input::get('password'));
		
		$user->role = (Auth::guest()) ? 'client' : Input::get('role');
		
		$user->save();
		
		return Redirect::to('/user');
	}
	
}
