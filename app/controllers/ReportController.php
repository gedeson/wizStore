<?php
/**
 * Created by PhpStorm.
 * User: gedeson
 * Date: 02/07/19
 * Time: 08:03
 */

class ReportController  extends BaseController {
	public function getIndex() {
		
		return View::make('report.index');
	}
	public function getDesign() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, type, count(`product`.`type`) as type_count'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')));
		
		$allReports = $report->get();
		$reports = $report->groupBy('type')->get();
		
		return View::make('report.design', compact('reports', 'allReports'));
	}
	public function getColor() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`color`) as color_count, color'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			;
		$allReports = $report->get();
		$reports = $report->groupBy('color')->get();
			
		return View::make('report.color', compact('reports', 'allReports'));
	}
	public function getSize() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`size`) as size_count, size'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			;
		$allReports = $report->get();
		$reports = $report->groupBy('size')->get();
			
		return View::make('report.size', compact('reports', 'allReports'));
	}
	public function getDesignAndCountry() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`type`) as type_count, type, country'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->join('solicitation', 'solicitation.id', '=', 'purchase_solicitation.solicitation_id')
			->join('user', 'user.id', '=', 'solicitation.user_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			;
		$allReports = $report->get();
		$reports = $report->groupBy('type', 'country')->get();
			
		return View::make('report.design-country', compact('reports', 'allReports'));
	}
	public function getColorAndCountry() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`color`) as color_count, color, country'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->join('solicitation', 'solicitation.id', '=', 'purchase_solicitation.solicitation_id')
			->join('user', 'user.id', '=', 'solicitation.user_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			;
		$allReports = $report->get();
		$reports = $report->groupBy('color', 'country')->get();
			
		return View::make('report.color-country', compact('reports', 'allReports'));
	}
	public function getSizeAndCountry() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`size`) as size_count, size, country'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->join('solicitation', 'solicitation.id', '=', 'purchase_solicitation.solicitation_id')
			->join('user', 'user.id', '=', 'solicitation.user_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			;
		$allReports = $report->get();
		$reports = $report->groupBy('size', 'country')->get();
			
		return View::make('report.size-country', compact('reports', 'allReports'));
	}
	public function getTopSale() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('title, price, product_id, image'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')))
			;
		$allReports = $report->max('product_id');
		$reports = $report->orderBy('product_id', 'desc')->groupBy('product_id')->take(1)->get();
			
		return View::make('report.top-sale', compact('reports', 'allReports'));
	}
	public function getTopSize() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`size`) as size_count, size'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')));
		
		$reports = $report->orderBy('size_count', 'desc')->groupBy('size')->take(1)->get();
		return View::make('report.top-size', compact('reports'));
	}
	public function getTopColor() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(`product`.`color`) as color_count, color, image'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')));
		
		$reports = $report->orderBy('color_count', 'desc')->groupBy('color')->take(1)->get();
		return View::make('report.top-color', compact('reports'));
	}
	public function getTopUser() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(name) as name_count, name, image'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->join('solicitation', 'solicitation.id', '=', 'purchase_solicitation.solicitation_id')
			->join('user', 'user.id', '=', 'solicitation.user_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')));
		
		$reports = $report->orderBy('name', 'desc')->groupBy('name')->take(1)->get();
		
		return View::make('report.top-user', compact('reports'));
	}
	public function getTopCountry() {
		
		$report = DB::table('purchase_solicitation')
			->select(DB::raw('price, count(country) as country_count, country, image'))
			->join('product', 'product.id', '=', 'purchase_solicitation.product_id')
			->join('solicitation', 'solicitation.id', '=', 'purchase_solicitation.solicitation_id')
			->join('user', 'user.id', '=', 'solicitation.user_id')
			->where('purchase_solicitation.status', '=', array_search('Pago', Config::get('constants.STATUS')));
		
		$reports = $report->orderBy('country', 'desc')->groupBy('country')->take(1)->get();
		
		return View::make('report.top-country', compact('reports'));
	}
}

?>