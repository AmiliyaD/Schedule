<?php
require_once 'BaseMap.php';

class SubjectMap extends BaseMap {
  // функция 2.1
public function arrSubject()
{
    $otdel = $this->db->query("SELECT * FROM subject INNER JOIN otdel ON subject.otdel_id = otdel.id");
    return $otdel->fetchAll();
}
 // функция 1.2. Найти профиль одного отдела
 public function findSubjectById($id)
 {
     $res = $this->db->query("SELECT * FROM subject INNER JOIN otdel ON subject.otdel_id = otdel.id WHERE subject.id = $id");
     if ($res) {
         return $res->fetch(PDO::FETCH_ASSOC);
     }
 }

}