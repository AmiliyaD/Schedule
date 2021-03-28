<?php
require_once 'Table.php';

class Gruppa extends Table {
    public function validate()
    {
        if (!empty($this->GruppaName) &&
            !empty($this->special_id)&&
            !empty($this->date_begin)&&
            !empty($this->date_end)) {
            return true;
            }
            return false;
       
        }
}