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
	
	private function prepareBalanceData($balances) {
		$result = array();
		foreach ($balances as $balance) 
			$result[$balance->year] = $balance;
		return $result;
	}
}