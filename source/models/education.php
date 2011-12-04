<?php

class EducationModel extends Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function getFailureAverageYears($from=false, $max=false) {
		$query = ConnectionManager::getQuery();
		$query->select("year")
				->fromTable("ma_department_failures", "df")
				->groupBy("df.year");
		$wh = false;
		if ($from) {
			$query->where("df.year", ">=", $from);
			$wh = true;
		}
		if ($max) {
			if ($wh)
				$query->wand("df.year", "<=", $max);	
			else 
				$query->where("df.year", "<=", $max);
		}
		return $this->db->executeQuery($query)->fetchAllObjects();
	}
	
	public function getFailureAverageByDepartment($year) {
		$query = ConnectionManager::getQuery();
		$query->select("d.name", "df.year", "df.average")
				->fromTable("ma_departments", "d")
				->addExplicitJoin(_INNER_JOIN, "ma_department_failures", "df", "department_id", "d", "id")
				->where("df.year", "=", $year)
				->orderBy("df.year", "ASC", "d.id", "ASC");
		$result = $this->db->executeQuery($query)->fetchAllObjects();
		return $result;
	}
	
	public function getAverageFailureRatesByYear() {
		$query = ConnectionManager::getQuery();
		$query->select("df.year", "ROUND(AVG(df.average), 2) AS average")
				->fromTable("ma_department_failures", "df")
				->groupBy("df.year");
		return $this->db->executeQuery($query)->fetchAllObjects();
	}

	public function getAbandonAverageByDepartment($year) {
		$query = ConnectionManager::getQuery();
		$query->select("d.name", "df.year", "df.average")
		->fromTable("ma_departments", "d")
		->addExplicitJoin(_INNER_JOIN, "ma_department_abandon", "df", "department_id", "d", "id")
		->where("df.year", "=", $year)
		->orderBy("df.year", "ASC", "d.id", "ASC");
		$result = $this->db->executeQuery($query)->fetchAllObjects();
		return $result;
	}
	
	public function getAverageAbandonRatesByYear() {
		$query = ConnectionManager::getQuery();
		$query->select("df.year", "ROUND(AVG(df.average), 2) AS average")
		->fromTable("ma_department_abandon", "df")
		->groupBy("df.year");
		return $this->db->executeQuery($query)->fetchAllObjects();
	}
	
	public function getRegistersByDepartment($year) {
		$query = ConnectionManager::getQuery();
		$query->select("d.name", "df.year", "df.average")
				->fromTable("ma_departments", "d")
				->addExplicitJoin(_INNER_JOIN, "ma_department_registry", "df", "department_id", "d", "id")
				->where("df.year", "=", $year)
				->orderBy("df.year", "ASC", "d.id", "ASC");
		$result = $this->db->executeQuery($query)->fetchAllObjects();
		return $result;
	}
	
	public function getRegistrationsByYear() {
		$query = ConnectionManager::getQuery();
		$query->select("df.year", "ROUND(SUM(df.average), 2) AS average")
				->fromTable("ma_department_registry", "df")
				->groupBy("df.year");
		return $this->db->executeQuery($query)->fetchAllObjects();
	}
}