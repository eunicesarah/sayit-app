<?php

    session_start();
    require_once __DIR__ . "/../db.php"; 


    if (isset($_POST['timeline_path'])){
        echo "<pre>";
        print_r($_FILES['timeline_path']);
        echo "</pre>";

        $media_name = $_FILES['timeline_path']['name'];
        $media_size = $_FILES['timeline_path']['size'];
        $media_tmp = $_FILES['timeline_path']['tmp_name'];
        $error = $_FILES['timeline_path']['error'];

        if ($error === 0){
            if ($media_size > 65535){
                $em = "Sorry, your file is too large.";
                header("Location: /?ruangdiskusi&error=$em");
            }
            else{
                $media_ex = pathinfo($media_name, PATHINFO_EXTENSION);
                $media_ex_lc = strtolower($media_ex);

                $allowed_exs = array("jpg", "jpeg", "png", "mov", "mp4", "avi", "mkv");

                if (in_array($media_ex_lc, $allowed_exs)){
                    $new_media_name = uniqid("MD-", true).'.'.$media_ex_lc;
                    $media_upload_path = '/src/public/media/'.$new_media_name;
                    move_uploaded_file($media_tmp, $media_upload_path);

                    $currentDateTime = date('Y-m-d');

                    if ($_SESSION["user_id"] != null){
                        $addTimeline = new timelineModel;
                        $addTimeline->postTimeline($_SESSION["user_id"], $_POST['timeline_content'], $currentDateTime, $new_media_name);
                    }
                    else {
                        echo "<script>alert('Please login first!')</script>";
                        echo "<script>window.location.href='/?Login';</script>";
                    }
                }
                else{
                    $em = "You can't upload files of this type";
                    header("Location: /?ruangdiskusi&error=$em");
                }
            }

        }
        else{
            $em = "unknown error occured!";
            header("Location: /?ruangdiskusi&error=$em");
        }
    }
    else {
        $em = "please select a file";
        header("Location: /?ruangdiskusi&error=$em");
    }