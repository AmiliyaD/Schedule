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
  // Вставить новую строку
  public function insert(Subject $subject)
  {
    $name = $this->db->quote($subject->subjectName);
    $otdel_id = $this->db->quote($subject->otdel_id);
    
      $a = $this->db->exec("INSERT INTO subject (subject.subjectName, subject.otdel_id, subject.hours, subject.active) VALUES ($name, $otdel_id, $subject->hours, $subject->active)");
      if ($a== 1) {
  return true;
  }
  return false;
  }
}