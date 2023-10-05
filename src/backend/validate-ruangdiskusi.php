<?php
session_start();
require_once __DIR__ . "/../db.php"; 
require_once __DIR__ . "/../app/models/timelineModel.php";

// if ($_SERVER["REQUEST_METHOD"] === "POST"){
//     $currentDateTime = date('Y-m-d');
//     if ($_SESSION["user_id"] != null){
//         $addTimeline = new timelineModel;
//         $addTimeline->postTimeline($_SESSION["user_id"], $_POST['timeline_content'], $currentDateTime, $_POST['timeline_path']);
//     }
//     else {
//         echo "<script>alert('Please login first!')</script>";
//         echo "<script>window.location.href='/?Login';</script>";
//     }
// }
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $currentDateTime = date('Y-m-d');

    if ($_SESSION["user_id"] != null) {
        // Cek apakah ada file gambar yang diunggah
        if (isset($_FILES['image_file']) && $_FILES['image_file']['error'] === UPLOAD_ERR_OK) {
            // Baca file gambar
            $image_data = file_get_contents($_FILES['image_file']['tmp_name']);

            // Masukkan data gambar ke dalam database
            $addTimeline = new timelineModel;
            $addTimeline->postTimeline(
                $_SESSION["user_id"],
                $_POST['timeline_content'],
                $currentDateTime,
                $image_data // Simpan data gambar dalam BLOB
            );

            // direct to home
            header('Location: /?ruangdiskusi');
        } else {
            echo "<script>alert('Please select an image file.')</script>";
            echo "<script>window.location.href='/?ruangdiskusi';</script>";
        }
    } else {
        echo "<script>alert('Please login first!')</script>";
        echo "<script>window.location.href='/?Login';</script>";
    }
}
