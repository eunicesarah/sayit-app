<?php
session_start();
require_once __DIR__ . "/../db.php"; 

if (isset($_SESSION["user_id"])){
    //session destroy
    session_destroy();
    header('Location: /?home');
}

?>