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

        //jika ada bukti
        // echo json_encode($_FILES['lapor_bukti']);
        
        if (isset($_FILES['lapor_bukti'])){
            $bukti_name = $_FILES['lapor_bukti']['name'];
            $bukti_size = $_FILES['lapor_bukti']['size'];
            $bukti_tmp = $_FILES['lapor_bukti']['tmp_name'];
            $error = $_FILES['lapor_bukti']['error'];
            // echo $bukti_name;

            // echo "<script>console.log($bukti_name)</script>";

            if ($error === 0){
                if ($bukti_size > 4294967295){
                    echo "<script>alert('Sorry, your file is too large.')</script>";
                    echo "<script>window.location.href='/?lapor';</script>";
                }
                else{
                    $bukti_ex = pathinfo($bukti_name, PATHINFO_EXTENSION);
                    // echo $bukti_ex;
                    $bukti_ex_lc = strtolower($bukti_ex);
                    // echo $bukti_ex_lc;

                    $allowed_exs = array("jpg", "jpeg", "png", "mov", "mp4", "avi", "mkv");

                    if (in_array($bukti_ex_lc, $allowed_exs)){
                        $new_bukti_name = uniqid("BK-", true).'.'.$bukti_ex_lc;
                        // echo $new_bukti_name;
                        $bukti_upload_path = '../public/bukti/'.$new_bukti_name;
                        // echo $bukti_upload_path;
                        move_uploaded_file($bukti_tmp, $bukti_upload_path);

                        $addLaporan = new laporModel;
                        // echo isset($_SESSION["user_id"]);
                        $addLaporan->addLaporan($_SESSION["user_id"], $_POST['jenis'], $_POST['pelapor'], $_POST['lokasi'], $_POST['tanggal'], $_POST['waktu_kejadian'], $_POST['kronologi'], $new_bukti_name, "pending");
                        echo "<script>alert('Laporan telah ditambahkan!')</script>";
                        echo "<script>window.location.href='/?home';</script>";
                    }
                    else{
                        echo "<script>alert('You can't upload files of this type')</script>";
                        echo "<script>window.location.href='/?lapor';</script>";
                    }
                }
            }
        }
        else{
            $addLaporan = new laporModel;
            // // echo isset($_SESSION["user_id"]);
            $addLaporan->addLaporan($_SESSION["user_id"], $_POST['jenis'], $_POST['pelapor'], $_POST['lokasi'], $_POST['tanggal'], $_POST['waktu_kejadian'], $_POST['kronologi'], $_POST['bukti'], "pending");
            echo "<script>alert('Laporan telah ditambahkan!')</script>";
            echo "<script>window.location.href='/?lapor';</script>";
        }
    }   
}
?>