<?php
require_once 'BaseMap.php';

class SpecialMap extends BaseMap {
  
public function arrSpecials()
{
    return $this->db->query("SELECT * FROM special")->fetchAll();
}
// все специальности
public function allSpecials()
{
    return $this->db->query("SELECT * FROM special INNER JOIN otdel ON special.otdel_id = otdel.id")->fetchAll();
}

public function findSpeicalById($id)
{
    return $this->db->query("SELECT * FROM special INNER JOIN otdel ON special.otdel_id = otdel.id WHERE special.id = $id")->fetch(PDO::FETCH_ASSOC);;
}

  // Вставить новую строку
  public function insert(Special $special)
  {
    $name = $this->db->quote($special->otdelName);
    $otdel_id = $this->db->quote($special->otdel_id);
    
      $a = $this->db->exec("INSERT INTO special (special.specialName, special.otdel_id, special.active) VALUES ($name, $otdel_id, $special->active)");
      if ($a== 1) {
  return true;
  }
  return false;
  }
}