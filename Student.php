<?php
require 'basics/Table.php';

class Student extends Table {
    public $user_id = 0;
    public $gruppa_id = 0;
    public $num_zach = '';
    public function validate()
    {
        return false;
       
    }
}