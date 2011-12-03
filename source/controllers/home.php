<?php

class Home extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		Loader::model("balance");
		$balance = new BalanceModel();
		var_dump($balance->getBalance());

		$inView = new View("home/index");
		$inView->setData(array("hola" => array("PEPE")));
		$js = array();
		$css = array('screen', 'app');
		View::defaultLayoutRender($inView, "Home", true, $js, $css);
	}
}