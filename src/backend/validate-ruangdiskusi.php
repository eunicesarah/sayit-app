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
            // echo "<pre>";
            // print_r($_FILES['image_file']);
            // echo "</pre>";
    
            $media_name = $_FILES['image_file']['name'];
            $media_size = $_FILES['image_file']['size'];
            $media_tmp = $_FILES['image_file']['tmp_name'];
            $error = $_FILES['image_file']['error'];
    
            if ($error === 0){
                if ($media_size >  4294967295){
                    $em = "Sorry, your file is too large.";
                    echo "<script>alert('Sorry, your file is too large.')</script>";
                    echo "<script>window.location.href='/?ruangdiskusi';</script>";
                }
                else{
                    $media_ex = pathinfo($media_name, PATHINFO_EXTENSION);
                    $media_ex_lc = strtolower($media_ex);
    
                    $allowed_exs = array("jpg", "jpeg", "png", "mov", "mp4", "avi", "mkv");
    
                    if (in_array($media_ex_lc, $allowed_exs)){
                        $new_media_name = uniqid("MD-", true).'.'.$media_ex_lc;
                        $media_upload_path = '../public/media/'.$new_media_name;
                        move_uploaded_file($media_tmp, $media_upload_path);
    
                        if ($_SESSION["user_id"] != null){
                            $addTimeline = new timelineModel;
                            $addTimeline->postTimeline($_SESSION["user_id"], $_POST['timeline_content'], $currentDateTime, $new_media_name);
                            // header("Location: /?ruangdiskusi");
                        }
                        else {
                            echo "<script>alert('Please login first!')</script>";
                            echo "<script>window.location.href='/?Login';</script>";
                        }
                    }
                    else{
                        echo "<script>alert('You can't upload files of this type')</script>";
                        echo "<script>window.location.href='/?ruangdiskusi';</script>";
                    }
                }
    
            }
            else{
                echo "<script>alert('unknown error occured!')</script>";
                echo "<script>window.location.href='/?ruangdiskusi';</script>";
            }
        }
    } else {
        echo "<script>alert('Please login first!')</script>";
        echo "<script>window.location.href='/?Login';</script>";
    }
}
