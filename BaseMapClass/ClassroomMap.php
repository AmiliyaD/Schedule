<?php
require_once 'BaseMap.php';

class ClassroomMap extends BaseMap {
  // функция 2.1
public function arrClassroom()
{
    $otdel = $this->db->query("SELECT * FROM classroom");
    return $otdel->fetchAll();
}
 // функция 1.2. Найти профиль одного отдела
 public function findClassById($id)
 {
     $res = $this->db->query("SELECT * FROM classroom WHERE classroom.id = $id");
     if ($res) {
         return $res->fetch(PDO::FETCH_ASSOC);
     }
 }

}