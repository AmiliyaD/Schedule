<?php
require_once 'BaseMap.php';

class StudentMap extends BaseMap {
// найти всех студентов
public function allStudents()
{
    return $this->db->query("SELECT * FROM student INNER JOIN user ON student.user_id = user.user_id INNER JOIN role ON user.role_id = role.id INNER JOIN gender ON user.gender_id = gender.id INNER JOIN gruppa ON student.gruppa_id = gruppa.id INNER JOIN special ON gruppa.special_id = special.id")->fetchAll();
}

// найти студента по id
public function findProfileById($id)
{
    return $this->db->query("SELECT * FROM student INNER JOIN user ON student.user_id = user.user_id INNER JOIN role ON user.role_id = role.id INNER JOIN gender ON user.gender_id = gender.id INNER JOIN gruppa ON student.gruppa_id = gruppa.id INNER JOIN special ON gruppa.special_id = special.id WHERE student.student_id = $id")->fetch(PDO::FETCH_ASSOC);
}    

// Добавить студента
 public function insert(Student $student)
 {
    $zach = $this->db->quote($student->num_zach);
  
    if ($this->db->exec("INSERT INTO student(student.user_id,student.gruppa_id, student.num_zach) VALUES($student->user_id, $student->gruppa_id, $zach)")== 1) {
        return true;
        }
        return false;
 }

}