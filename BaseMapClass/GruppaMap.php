<?php
require_once 'BaseMap.php';

class GruppaMap extends BaseMap {
  // вытащить все группы
    public function arrGruppas()
    {
       return $this->db->query("SELECT * FROM gruppa")->fetchAll();
    }
}