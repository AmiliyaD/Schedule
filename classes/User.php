<?php
require_once 'Table.php';

class User extends Table {
    public $lastname = '';
    public $firstname = '';
    public $patronymic = '';
    public $login = '';
    public $password = '';
    public $gender_id = 0;
    public $birthday = '';
    public $role_id = 0;
    public $active = 0;

    public function validate()
    {
        if  (!empty($this->lastname) 
         && !empty($this->firstname) 
         && !empty($this->patronymic)
         && !empty($this->login)
         && !empty($this->password)
         && !empty($this->gender_id)
         &&!empty($this->birthday)
         && !empty($this->role_id)
         && !empty($this->active) ) {
              return true;
          }
        return false;
       
    }
}