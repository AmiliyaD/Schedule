<?php 
session_start();
require "secure.php";
require_once "../../BaseMapClass/GruppaMap.php";
require_once "../../classes/Otdel.php";
require_once "../../BaseMapClass/OtdelMap.php";
require_once "../../BaseMapClass/Helper.php";
require_once "../../classes/Gruppa.php";
require_once "../../BaseMapClass/SpecialMap.php";
require_once "../../classes/Special.php";





// Добавить отдел
if (isset($_POST['saveOtdel'])) {
    $otdel = new Otdel;
    $otdel->otdelName = $_POST['otdel_nam'];
    $otdel->active = $_POST['active'];
    $insertOtdel = new OtdelMap;

    $in = $insertOtdel->insert($otdel);
   
    if ($in) {
        $_SESSION['message'] = "Новый отдел добавлен";
        header("Location: ../otdelList.php");
    }
    var_dump($in);
}

// Добавить группу
if (isset($_POST['saveGruppa'])) {
    $gruppa = new Gruppa;
    $gruppa->GruppaName = Helper::clearString($_POST['GruppaName']);
    $gruppa->special_id = $_POST['special_id'];
    $gruppa->date_begin = $_POST['date_begin'];
    $gruppa->date_end = $_POST['date_end']; 

    if($gruppa) {
        $saveGruppa = new GruppaMap;
        $saveGrup = $saveGruppa->insert($gruppa);
        $_SESSION['message'] = "Новая группа добавлена";
        header("Location: ../gruppaList.php");
    }
}