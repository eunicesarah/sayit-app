<?php
session_start();
require_once __DIR__ . "/../db.php"; 
require_once __DIR__ . "/../app/models/timelineModel.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $currentDateTime = date('Y-m-d');
    if ($_SESSION["user_id"] != null){
        $addTimeline = new timelineModel;
        $addTimeline->postTimeline($_SESSION["user_id"], $_POST['timeline_content'], $currentDateTime, $_POST['timeline_path']);
    }
    else {
        echo "<script>alert('Please login first!')</script>";
        echo "<script>window.location.href='/?Login';</script>";
    }
}