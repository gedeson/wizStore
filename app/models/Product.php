<?php

class Product extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'product';
	
	protected $fillable = ['title', 'size', 'image'];
	
	// Relationship with Sale
	public function rSale() {
		return $this->hasMany('sale');
	}
	
	
	public function scopeSearchProducts($query) {
		
		if(!empty(Input::get('color'))) {
			$query->where(['color' => Input::get('color')]);
		}
		if(!empty(Input::get('type'))) {
			$query->where(['type' => Input::get('type')]);
		}
		
		
		return $query->get();
	}
}