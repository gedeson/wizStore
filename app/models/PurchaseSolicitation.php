<?php

class PurchaseSolicitation extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'purchase_solicitation';
	
	public function purchase() {
		return $this->belongsTo('Product', 'product_id', 'id');
	}
}

?>