<?php
require_once 'Table.php';

class Classroom extends Table {
    public $className = '';
    public $active = 0;
    public function validate()
    {
        return false;
       
    }
}