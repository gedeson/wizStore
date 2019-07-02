<?php

class Sale extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sale';
	
	public function rUser() {
		return $this->belongsToMany('User');
	}
	
	public function rProduct() {
		return $this->belongsToMany('Product');
	}
}

?>