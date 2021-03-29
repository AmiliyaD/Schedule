<?php
require_once 'BaseMap.php';
require_once "UserMap.php";
class TeacherMap extends BaseMap {
  
    // функция 1. Найти всех преподавателей
    public function allTeachers($ofset, $limit)
    {
        $ofset = 0;
        $limit = 30;
        $teach = $this->db->query("SELECT * FROM user INNER JOIN teacher ON user.user_id = teacher.user_id INNER JOIN gender ON user.gender_id = gender.id INNER JOIN otdel ON  teacher.otdel_id =  otdel.id INNER JOIN role ON  user.role_id  = role.id LIMIT $ofset, $limit")->fetchAll();
       
        return $teach;
    }
    // функция 1.3. количество
    public function count()
    {
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM teacher")->fetch(PDO::FETCH_OBJ)->cnt;
        return $res;
    }
    // функция 1.2. Найти профиль одного преподавателя
    public function findProfileById($id)
    {
        $res = $this->db->query("SELECT * FROM teacher INNER JOIN user ON teacher.user_id = user.user_id INNER JOIN gender ON user.gender_id = gender.id INNER JOIN otdel ON otdel.id = teacher.otdel_id INNER JOIN role ON role.id = user.role_id WHERE teacher.id = $id");
        if ($res) {
            return $res->fetch(PDO::FETCH_ASSOC);
        }
    }
      // функция 1.2. Найти профиль одного преподавателя
      public function findProfileByUserId($id)
      {
          $res = $this->db->query("SELECT * FROM teacher INNER JOIN user ON teacher.user_id = user.user_id INNER JOIN gender ON user.gender_id = gender.id INNER JOIN otdel ON otdel.id = teacher.otdel_id INNER JOIN role ON role.id = user.role_id WHERE teacher.user_id = $id");
          if ($res) {
              return $res->fetch(PDO::FETCH_ASSOC);
          }
      }
    // фунция 2. Сохранить преподавателя
    public function save(User $user, Teacher $teacher)
    {
        
        if ($teacher->user_id == 0) {
        $teacher->user_id = $user->user_id;
        return $this->insert($teacher);
        } 
        else {
        return $this->update($teacher);
        }
        
        print("не получилось");
        return false;
    }

    // FIND BY ID
    public function findById($id)
    {
        $id = null;
        if ($id) {
            $res = $this->db->query("SELECT * FROM teacher WHERE teacher.user_id = $id");
            $teachers = $res->fetchObject('Teacher');
            if ($teachers) {
                return $teachers;
            }
        }
        
    }

    // Вставить новую строку
    public function insert(Teacher $teacher)
    {
        if ($this->db->exec("INSERT INTO teacher(teacher.user_id,teacher.otdel_id) VALUES($teacher->user_id, $teacher->otdel_id)")== 1) {
    return true;
    }
    return false;
    }
    // Обновить строку
    private  function  update(Teacher $teacher)
    {
        if ($this->db->exec("UPDATE teacher SET otdel_id =
        $teacher->otdel_id WHERE user_id=".$teacher->user_id) ==
        1) {
        return true;
        }
        return false;
    }

}