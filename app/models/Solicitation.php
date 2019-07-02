<?php

class Solicitation extends Eloquent {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'solicitation';
	
	protected $fillable = [
		'user_id',
		'status'
	];
	
	public function getSolicitationProduct() {
		return self::hasMany('PurchaseSolicitation')
			->select(\DB::raw('product_id, price, count(1) as qtd, (select sum(price) from purchase_solicitation where solicitation_id = '.$this->id.' ) as total'))
			->groupBy('product_id')
			->orderBy('product_id', 'desc');
	}
	
	public function pedido_produtos_itens() {
		return $this->hasMany('PurchaseSolicitation');
	}

	public function scopeProducts($query, $id) {
		
		$order = $query->where(['user_id' => $id,
			'status' => array_search('Reservado', Config::get('constants.STATUS')) ])->first(['id']);
		
		return !empty($order->id) ? $order->id : 'null';
	}
	
	public function rProduct() {
		return $this->belongsToMany('Product');
	}
}

?>