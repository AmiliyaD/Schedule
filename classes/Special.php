<?php
require_once 'Table.php';

class Special extends Table {
    public $specialName = '';
    public $otdel_id = 0;
    public $active = 0;
    public function validate()
    {
        if(!empty($this->specialName)&& !empty($this->otdel_id) && !empty($this->active)) {
            return true;
        }
        return false;
       
    }
}