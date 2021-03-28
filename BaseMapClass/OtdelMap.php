<?php
require_once 'BaseMap.php';

class OtdelMap extends BaseMap {
  
// функция 2.1
public function otdel()
{
    $otdel = $this->db->query("SELECT * FROM otdel");
    return $otdel->fetchAll();
}

}