<?php

class Home extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		$inView = new View("home/index");
		$inView->setData(array("hola" => array("PEPE")));
		$js = array();
		$css = array('screen', 'app');
		View::defaultLayoutRender($inView, "Home", true, $js, $css);
	}
}