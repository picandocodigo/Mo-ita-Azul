<?php
class ChartBalance{
	private $name;
	private $male_data = array();
	private $female_data = array();
	
	public function __construct($name) {
		$this->name = $name;
	}
	
	public function setMaleData($year, $data){
		$this->male_data[$year] = $data;
	}
	
	public function setFemaleData($year, $data){
		$this->female_data[$year] = $data;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getMaleData(){
		return $this->male_data;
	}
	
	public function getFemaleData(){
		return $this->female_data;
	}
}
