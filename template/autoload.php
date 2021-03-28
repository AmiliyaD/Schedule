<?php
spl_autoload_register(function ($class_name) {
include '../BaseMapClass/'.$class_name . '.php';
});