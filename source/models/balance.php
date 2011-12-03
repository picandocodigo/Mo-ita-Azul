<?php
class BalanceModel extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function getBalance(){
		$query = ConnectionManager::getQuery();
		$query->select("*");
		$query->fromTable("ma_balance", "b");
		
		$result = $this->db->executeQuery($query);
		return $result->fetchAllObjects();
	}	

}
