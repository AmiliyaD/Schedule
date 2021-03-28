<?php
require_once '../basics/Table.php';

class Subject extends Table {
    public $name = '';
    public $otdel_id = 0;
    public $hours = 0;
    public $active = 0;
    public function validate()
    {
        return false;
       
    }
}