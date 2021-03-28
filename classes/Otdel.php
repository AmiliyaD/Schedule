<?php
require_once 'Table.php';

class Otdel extends Table {
    public $otdelName = '';
    public $active = 0;
    public function validate()
    {
        return false;
       
    }
}