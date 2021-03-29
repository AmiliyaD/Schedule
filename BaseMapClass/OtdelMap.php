<?php
require_once 'BaseMap.php';

class OtdelMap extends BaseMap {
  
// функция 2.1
public function otdel()
{
    $otdel = $this->db->query("SELECT * FROM otdel");
    return $otdel->fetchAll();
}
 // функция 1.2. Найти профиль одного отдела
 public function findOtdelById($id)
 {
     $res = $this->db->query("SELECT * FROM otdel WHERE otdel.id = $id");
     if ($res) {
         return $res->fetch(PDO::FETCH_ASSOC);
     }
 }


   // Вставить новую строку
   public function insert(Otdel $otdel)
   {
    $otdelName = $this->db->quote($otdel->otdelName);
       $a = $this->db->exec("INSERT INTO `otdel` (`otdelName`, `active`) VALUES ($otdelName, $otdel->active)");
       if ($a== 1) {
   return true;
   }
   return false;
   }
//Обновить
   public function update(Otdel $otdel, $id)
   {
    $otdelName = $this->db->quote($otdel->otdelName);
     $updateOtdel =   $this->db->query("UPDATE `otdel` SET `otdelName` = $otdelName AND `active` = $otdel->active WHERE `otdel`.`id` = $id;");
     if($updateOtdel == 1) {
         return true;
     }
     return false;
   }
}