<?php
require_once 'BaseMap.php';

class GruppaMap extends BaseMap {
  // вытащить все группы
    public function arrGruppas()
    {
       return $this->db->query("SELECT * FROM gruppa INNER JOIN special ON gruppa.special_id = special.id ")->fetchAll();
    }
    // вытащить одну группу
    public function findGruppaById($id)
    {
      return $this->db->query("SELECT * FROM gruppa INNER JOIN special ON gruppa.special_id = special.id WHERE gruppa.id = $id")->fetch(PDO::FETCH_ASSOC);
    }

    // insert gruppa
    public function insert(Gruppa $gruppa)
    {
      $name = $this->db->quote($gruppa->GruppaName);
      $date_begin = $this->db->quote($gruppa->date_begin);
      $date_end = $this->db->quote($gruppa->date_end);


        if ($this->db->exec("INSERT INTO gruppa(gruppaName, special_id,
        date_begin, date_end) VALUES($name, $gruppa->special_id, $date_begin,
        $date_end)") == 1) {
        $gruppa->gruppa_id = $this->db->lastInsertId();
        return true;

        }

return false;
    }

// update
    public function update(Gruppa $gruppa)
    {
      $name = $this->db->quote($gruppa->name);
      $date_begin = $this->db->quote($gruppa->date_begin);
      $date_end = $this->db->quote($gruppa->date_end);
      if ( $this->db->exec("UPDATE gruppa SET name = $name,
      special_id = $gruppa->special_id,"
      . " date_begin = $date_begin, date_end =
      $date_end WHERE gruppa_id = ".$gruppa->gruppa_id) == 1) {
     
      return true;
      }
      return false;
    }
}