<?php
session_start();
require_once __DIR__ . "/../db.php"; 
require_once __DIR__ . "/../app/models/laporModel.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    // echo "masuk";x
    $errors = array();
    if(empty($_POST['pelapor'])){
        $errors[] = 'Please enter your name';
    }
    if(empty($_POST['lokasi'])){
        $errors[] = 'Please enter your location';
    }
    if(empty($_POST['tanggal'])){
        $errors[] = 'Please enter the date';
    }
    if(empty($_POST['waktu_kejadian'])){
        $errors[] = 'Please enter the time';
    }
    if(empty($_POST['kronologi'])){
        $errors[] = 'Please enter the chronology';
    }
    if(empty($_POST['jenis'])){
        $errors[] = 'Please choose the type';
    }

    if(empty($errors)){
        // echo "loh";
        // var_dump($_SESSION["user_id"]);
        $addLaporan = new laporModel;
        // echo isset($_SESSION["user_id"]);
        $addLaporan->addLaporan($_SESSION["user_id"], $_POST['jenis'], $_POST['pelapor'], $_POST['lokasi'], $_POST['tanggal'], $_POST['waktu_kejadian'], $_POST['kronologi'], $_POST['bukti'], "pending");
    }
}
?>