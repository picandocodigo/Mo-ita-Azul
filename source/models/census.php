<?php
    class CensusModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        
        public function getCensus(){
            $query = ConnectionManager::getQuery();
            $query->select(
                        "c.nombre, c.tlocales", "c.tviviendas", "c.viviendasdesocupadas",
                        "c.viviendasocupadas", "c.hogares", "c.hombres", "c.mujeres", "c.tpersonas", "d.name");
            $query->fromTable("ma_census", "c")
                ->addExplicitJoin(_INNER_JOIN, "ma_departments", "d", "id", "c", "depto_id");
            return $this->db->executeQuery($query)->fetchAllObjects();
        }
    }
