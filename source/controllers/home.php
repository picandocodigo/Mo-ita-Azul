<?php

class Home extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		Loader::model("balance");
		$balance = new BalanceModel();
		$balances = $this->prepareBalanceData($balance->getBalance());

		$inView = new View("home/index");
		$inView->setData(array("balances" => $balances));
		$js = array('jquery-1.7.1.min', 'highcharts', 'graph1');
		$css = array('screen', 'app');
		View::defaultLayoutRender($inView, "Home", true, $js, $css);
	}
	
	private function prepareBalanceData( $param ) {
		Loader::util("chart_balance");
		$processed_balances = array();
		$years = array();
		foreach($param as $balance) :
			if ( !isset($processed_balances[$balance->name]) ) :
				$proc_balance = new ChartBalance($balance->name);
				$processed_balances[$balance->name] = $proc_balance;
			endif;
			if ( !in_array($balance->year, $years) ):
				$years[] = $balance->year;
			endif;
			$processed_balances[$balance->name]->setMaleData($balance->year, $balance->credit);
			$processed_balances[$balance->name]->setFemaleData($balance->year, $balance->expenses);
		endforeach;

		return array($processed_balances, $years);
	}
}