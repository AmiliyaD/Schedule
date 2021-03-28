<?php
require_once 'BaseMap.php';

class ClassroomMap extends BaseMap {
  // функция 2.1
public function arrClassroom()
{
    $otdel = $this->db->query("SELECT * FROM classroom");
    return $otdel->fetchAll();
}
 // функция 1.2. Найти профиль одной аудитории
 public function findClassById($id)
 {
     $res = $this->db->query("SELECT * FROM classroom WHERE classroom.id = $id");
     if ($res) {
         return $res->fetch(PDO::FETCH_ASSOC);
     }
 }
// Добавить аудиторию
public function insert(Classroom $class)
{
   $classname = $this->db->quote($class->className);
 
   if ($this->db->exec("INSERT INTO classroom(classroom.classroomName, classroom.active) VALUES($classname, 1)")== 1) {
       return true;
       }
       $i = $this->db->exec("INSERT INTO classroom(classroom.classroomName, classroom.active) VALUES($classname, $class->acitve)");
       var_dump($i);
       return false;


}
}
