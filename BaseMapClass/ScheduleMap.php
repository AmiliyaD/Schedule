<?php
require_once 'BaseMap.php';

class ScheduleMap extends BaseMap {
  
// insert
public function insert(Schedule $schedule)
{
    $lessPlan = $this->db->quote($schedule->lesson_plan_id);
    if ($this->db->exec("INSERT INTO schedule(lesson_plan_id, day_id, lesson_num_id, classroom_id)
     VALUES($lessPlan,$schedule->day_id, $schedule->lesson_num_id, $schedule->classroom_id)") == 1) {
    return true;
    }
    return false;
}

// find days
public function findDays()
{
    return $this->db->query("SELECT * FROM day")->fetchAll(PDO::FETCH_OBJ);
}


public function findGruppasByDayStudents($teacherId, $dayId) {
    $res = $this->db->query("SELECT DISTINCT gruppa.id, gruppa.gruppaName FROM lesson_plan INNER JOIN schedule ON
      lesson_plan.id=schedule.lesson_plan_id
       INNER JOIN gruppa ON 
        lesson_plan.gruppa_id=gruppa.id
         WHERE lesson_plan.user_id=$teacherId
         AND schedule.day_id=$dayId
         ORDER BY gruppa.gruppaName");
    return $res->fetchAll(PDO::FETCH_OBJ);
}
// find Gruppas By Day Teacher
public function findGruppasByDayTeacher($teacherId, $dayId) {
    $res = $this->db->query("SELECT DISTINCT gruppa.id, gruppa.gruppaName FROM lesson_plan INNER JOIN schedule ON
      lesson_plan.id=schedule.lesson_plan_id
       INNER JOIN gruppa ON 
        lesson_plan.gruppa_id=gruppa.id
         WHERE lesson_plan.user_id=$teacherId
         AND schedule.day_id=$dayId
         ORDER BY gruppa.gruppaName");
    return $res->fetchAll(PDO::FETCH_OBJ);
}

// find  By  Gruppas   Day  Teacher
public function findByGruppasDayTeacher($dayId, $teacherId, $gruppaId)
{
    $res = $this->db->query("SELECT
    schedule.id,lesson_num.LessonNumName AS lesson_num, subject.subjectName AS subject,classroom.classroomName 
    AS classroom FROM lesson_plan INNER JOIN schedule ON lesson_plan.id=schedule.lesson_plan_id 
    INNER JOIN subject ON
    lesson_plan.subject_id=subject.id INNER JOIN lesson_num ON
    schedule.lesson_num_id=lesson_num.id INNER JOIN classroom ON
    schedule.classroom_id=classroom.id WHERE lesson_plan.user_id=$teacherId AND
    schedule.day_id=$dayId AND
    lesson_plan.gruppa_id=$gruppaId ORDER BY schedule.lesson_num_id");
    return $res->fetchAll(PDO::FETCH_ASSOC);
}


// РАСПИСАНИЕ СТУДЕНТА
public function getStudentScheduale($userId)
{
    $res = $this->db->query("SELECT `day`.*, `schedule`.*, `lesson_num`.*, `lesson_plan`.*, `gruppa`.*, `subject`.*, `student`.* FROM `day` LEFT JOIN `schedule` ON `schedule`.`day_id` = `day`.`id` LEFT JOIN `lesson_num` ON `schedule`.`lesson_num_id` = `lesson_num`.`id` 
    LEFT JOIN `lesson_plan` ON `schedule`.`lesson_plan_id` = `lesson_plan`.`id`
     LEFT JOIN `gruppa` ON `lesson_plan`.`gruppa_id` = `gruppa`.`id`
      LEFT JOIN `subject` ON `lesson_plan`.`subject_id` = `subject`.`id`
       LEFT JOIN `student` ON `student`.`gruppa_id` = `gruppa`.`id` 
       WHERE student.user_id = $userId")->fetchAll();
    return $res;
}

// find by theacher ID
public function findByTeacherId($id)
{
    $days = $this->findDays();
$result = [];
foreach ($days as $day) {
    $arrDay = [];
    $arrDay['dayId'] = $day->id;
    $arrDay['dayName'] = $day->dayName;
    $arrDay['gruppa'] = [];
$gruppas = $this->findGruppasByDayTeacher($id, $day->id);

foreach ($gruppas as $gruppa) {
    $arrGruppa = [];
    $arrGruppa['gruppaName'] = $gruppa->gruppaName;
    $arrGruppa['schedule'] = $this->findByGruppasDayTeacher($day->id, $id, $gruppa->id);

    $arrDay['gruppa'][] = $arrGruppa;

};
$result[] = $arrDay;
}
return $result;
}
// найти группу студента
public function findGruppaByStudentId($studentId)
{
    $res = $this->db->query("SELECT gruppa.id, gruppa.gruppaName FROM student INNER JOIN gruppa ON
  student.gruppa_id = gruppa.id WHERE student.user_id=$studentId")->fetch(PDO::FETCH_ASSOC);
  return $res;
}

public function findByGruppasDay($dayId, $gruppaId)
{
    $res = $this->db->query("SELECT schedule.id,lesson_num.LessonNumName AS lesson_num, 
    subject.subjectName AS subject,classroom.classroomName AS classroom FROM lesson_plan 
    INNER JOIN schedule ON lesson_plan.id=schedule.lesson_plan_id 
    INNER JOIN subject ON lesson_plan.subject_id=subject.id INNER JOIN lesson_num ON schedule.lesson_num_id=lesson_num.id INNER JOIN classroom ON schedule.classroom_id=classroom.id 
    WHERE lesson_plan.gruppa_id= $gruppaId AND schedule.day_id=$dayId ORDER BY schedule.lesson_num_id");
    return $res->fetchAll(PDO::FETCH_ASSOC);
}


public function findByStudentId($id)
{
    $days = $this->findDays();
$result = [];
$gruppa = $this->findGruppaByStudentId($id);
$result['gruppa'] = $gruppa['gruppaName'];
foreach ($days as $day) {
    $arrDay = [];
    $arrDay['dayId'] = $day->id;
    $arrDay['dayName'] = $day->dayName;
 
    $arrDay['schedule'] = $this->findByGruppasDay($day->id, $gruppa['id']);
$result['studentSchedule'][] = $arrDay;
}
return $result;
}
// удалить расписание
public function deleteScheduale($schedualeId)
{
    $del = $this->db->query("DELETE FROM schedule WHERE schedule.id = $schedualeId");
    if ($del) {
        return true;
    }
    return false;
}



}