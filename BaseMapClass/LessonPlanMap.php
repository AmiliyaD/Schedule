<?php
require_once 'BaseMap.php';

class LessonPlanMap extends BaseMap {
    // все планы
    public function arrPlans()
    {
        $res = $this->db->query("SELECT user.user_id,
CONCAT(user.lastname, user.firstname,user.patronymic) AS fio, otdel.otdelName AS otdel,
COUNT(lesson_plan.subject_id) AS
count_plan,SUM(subject.hours) AS sum_hours FROM user INNER JOIN teacher ON
user.user_id=teacher.user_id INNER JOIN otdel ON teacher.otdel_id=otdel.id
LEFT OUTER JOIN lesson_plan ON
teacher.user_id=lesson_plan.user_id LEFT OUTER JOIN subject ON
lesson_plan.subject_id=subject.id GROUP BY
user.user_id");
return $res->fetchAll(PDO::FETCH_OBJ);
    }
    // план одного преподавателя
public function arrPlan($id)
{
    return $this->db->query("SELECT * FROM lesson_plan INNER JOIN gruppa ON
    lesson_plan.gruppa_id=gruppa.id INNER JOIN subject ON
    lesson_plan.subject_id=subject.id WHERE
    lesson_plan.user_id=$id")->fetchAll();
}
// вытащить номер уроков
public function arrLessonNums()
{
    return $this->db->query("SELECT * FROM lesson_num")->fetchAll();
}
// добавить план
public function insert(LessonPlan $lesson)
{
    $otdelName = $this->db->quote($lesson->otdelName);
    $a = $this->db->exec("INSERT INTO `lesson_plan` (`gruppa_id`, `subject_id`,`user_id`) VALUES ($lesson->gruppa_id, $lesson->subject_id, $lesson->user_id)");
    if ($a== 1) {
return true;
}
return false;
}
// удаление плана
public function delete($id)
{
    $del = $this->db->query("DELETE FROM lesson_plan WHERE lesson_plan.id = $id");
    if ($del) {
        return true;
    }
    return false;
}
}