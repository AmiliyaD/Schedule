<?php 
session_start();
require "secure.php";
require_once "../../BaseMapClass/GruppaMap.php";
require_once "../../BaseMapClass/OtdelMap.php";
require_once "../../BaseMapClass/Helper.php";
require_once "../../classes/Gruppa.php";
require_once "../../BaseMapClass/SpecialMap.php";
require_once "../../classes/Special.php";

// сохранить специальности
if (isset($_POST['saveSpecial'])) {
    $special = new Special;
    $special->otdelName = $_POST['otdel_name'];
    $special->otdel_id = $_POST['special_id'];
    $special->active = $_POST['active'];
    $in = new SpecialMap;
    $inser = $in->insert($special);
   if ($inser) {
    $_SESSION['message'] = "Новая специальность добавлена";
    header("Location: ../specialList.php");

   }
    }