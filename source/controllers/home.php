<?php

class Home extends Controller {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function index() {
		Loader::model("balance");
		$balance = new BalanceModel();
		$balances = $this->prepareBalanceData($balance->getBalance());

		Loader::model("education");
		$educationModel = new EducationModel();
		$failureYears = $educationModel->getFailureAverageYears();
		$failureAverage = $this->prepareFailureAverage($educationModel->getAverageFailureRatesByYear());
		$totalRegistration = $this->prepareRegistrationData($educationModel->getRegistrationsByYear());
				

		$inView = new View("home/index");
		$inView->setData(array("balanceTotal" => json_encode($balances["total"]), "failureYears" => $failureYears, "averages" => json_encode($failureAverage), "totalRegistration" => json_encode($totalRegistration)));
		$js = array('jquery-1.7.1.min', 'highcharts', 'horizontal-bar-graph', 'bar-graph', 'generic');
		$css = array('screen', 'app');
		View::defaultLayoutRender($inView, "Home", true, $js, $css);
	}

	/*private function prepareBalanceData( $param ) {
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
			//$processed_balances[$balance->name]->setMaleData($balance->year, $balance->credit);
			$processed_balances[$balance->name]->setFemaleData($balance->year, $balance->expenses);
		endforeach;

		return array($processed_balances, $years);
    }*/
    private function prepareBalanceData($data) {
    	$arrayResult = array();
    	$total = new stdClass();
    	$total->container = "container";
    	$total->title = "Inversión en educación por año.";
    	$total->categoriesArr = array();
    	$total->yAxisTitle = "Gastos";
    	$total->seriesArr = array();
    	$i = -1;
    	$total->seriesArr[0] = new stdClass();
    	$total->seriesArr[0]->name = "Total";
    	foreach ($data as $balance) {
    		if (!in_array($balance->year, $total->categoriesArr)) {
    			$i++;
    			$total->categoriesArr[] = $balance->year;
    			$total->seriesArr[0]->data[$i] = (integer)$balance->expenses;
    		} else 
    			$total->seriesArr[0]->data[$i] += (integer)$balance->expenses;
    	}
  
    	$arrayResult["total"] = $total;
    	return $arrayResult;
    }
    
	public function loadFailureGraph($year) {
		Loader::model("education");
		$educationModel = new EducationModel();
		$yearData = $educationModel->getFailureAverageByDepartment($year);

		echo json_encode($this->prepareFailureData($yearData));
	}

	public function loadRegistrationGraph() {
		Loader::model("registration");
		$educationModel = new RegistrationModel();
		$yearData = $educationModel->getRegistrationsByYear();
		
		echo json_encode($this->prepareRegistrationData($yearData));
	}

	private function prepareRegistrationData($data) {
		$result = new stdClass();
		$result->container = "registration-bar";
		$result->title = "Inscripciones por año.";
		$result->categoriesArr = array();
		$result->yAxisTitle = "Total";
		$result->seriesName = "Año";
		$result->seriesArr = array();
		foreach ($data as $fail) {
			$result->categoriesArr[] = utf8_encode($fail->year);
			$result->seriesArr[] = (double)$fail->average;
		}
		return $result;
	}
	
	private function prepareFailureData($data) {
		$result = new stdClass();
		$result->container = "failure-bar";
		$result->title = "Porcentaje de repetición por departamento.";
		$result->categoriesArr = array();
		$result->yAxisTitle = "Porcentaje";
		$result->seriesName = "Departamento";
		$result->seriesArr = array();
		foreach ($data as $fail) {
			$result->categoriesArr[] = utf8_encode($fail->name);
			$result->seriesArr[] = (double)$fail->average;
		}
		return $result;
	}
	
	private function prepareFailureAverage($data) {
		$result = new stdClass();
		$result->container = "failure-bar";
		$result->title = "Porcentaje de repetición total por año.";
		$result->categoriesArr = array();
		$result->yAxisTitle = "Porcentaje";
		$result->seriesName = "Año";
		$result->seriesArr = array();
		foreach ($data as $fail) {
			$result->categoriesArr[] = $fail->year;
			$result->seriesArr[] = (double)$fail->average;
		}
		return $result;
	}
}