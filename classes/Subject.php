<?php
require_once 'Table.php';

class Subject extends Table {
    public $subjectName = '';
    public $otdel_id = 0;
    public $hours = 0;
    public $active = 0;
    public function validate()
    {
        return false;
       
    }
}