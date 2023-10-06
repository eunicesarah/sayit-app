<?php

if (isset($_POST['add'])) {
    $currentDateTime = date('Y-m-d');
    $query = 'INSERT INTO article (article_judul, article_content, article_image, article_date, article_video, article_category) VALUES (?, ?, ?, ?, ?, ?)';
    $mysqli = require __DIR__ . '/../db.php';
    $stmt = $mysqli->stmt_init();

    if ($stmt->prepare($query)) {
        $stmt->bind_param('ssssss', $_POST['article_judul'], $_POST['article_content'], $_POST['article_image'],  $currentDateTime, $_POST['article_video'], $_POST['article_category']); // Use uppercase "ID" to match the variable name

        if ($stmt->execute()) {
            //direct to home
            // echo "berhasil";
            // header('Location: /?ruangdiskusi');
            echo "<script>alert('Artikel berhasil ditambahkan!')</script>";
            echo "<script>window.location.href='/?artikel';</script>";
            exit; // Add this line to stop script execution after redirection
        } else {
            echo $mysqli->error;
        }
    } else {
        die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
    }

    $stmt->close();
    $mysqli->close();
}
