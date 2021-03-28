<?php
require_once '../basics/Table.php';

class Special extends Table {
    public function validate()
    {
        return false;
       
    }
}