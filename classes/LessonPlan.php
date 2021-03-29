<?php
require_once 'Table.php';

class LessonPlan extends Table {
    public $gruppa_id = 0;
    public $subject_id = 0;
    public $user_id = 0;
    public function validate()
    {
        if(!empty($gruppa_id) && !empty($subject_id) && !empty($user_id)) {
            return true;
        }
        return false;
       
    }
}