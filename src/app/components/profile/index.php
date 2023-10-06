<?php
    $title = "SayIt";
    $page = "Profile";
    ob_start();

    if (!isset($_SESSION["user_id"])) {
        header("Location: /?login");
        exit;
    }
    else{
        $mysqli = require __DIR__ . "/../../../db.php";
        $user_id = $_SESSION["user_id"];
        $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
    }
    if (isset($_POST['update_profile'])) {
        $servername = "db";
        $username = "php_docker";
        $password = "password";
        $dbname = "php_docker";
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }
        if (empty($_POST['user_name'])) {
            $newName = $user['user_name'];
        } else {
            $newName = mysqli_real_escape_string($conn, $_POST['user_name']);
        }
        
        if (empty($_POST['user_email'])) {
            $newEmail = $user['user_email'];
        } else {
            $newEmail = mysqli_real_escape_string($conn, $_POST['user_email']);
        }
        
        if (empty($_POST['user_phone'])) {
            $newPhone = $user['user_phone'];
        } else {
            $newPhone = mysqli_real_escape_string($conn, $_POST['user_phone']);
        }
        
   
        // Validasi input sesuai kebutuhan Anda
    
        // Update data pengguna di database
        $updateQuery = "UPDATE user SET user_name = '$newName', user_email = '$newEmail', user_phone = '$newPhone' WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $updateQuery)) {
            // Redirect atau berikan pesan sukses, misalnya:
            header("Location: /?profile");
            exit;
        } else {
            // Handle kesalahan jika gagal melakukan pembaruan
            echo "Error: " . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/public/css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Navbar -->
    <?php include(dirname(__DIR__)) . "/navbar/index.php" ?>

    <section class="container">

        <div class="boxsignup">
            <form id="edit-profile-form" method="POST">
                <h1>Profile</h1>
                <div class="label-container">
                <label for="username">Username:</label>
                <input type="text" id="user_name" name="user_name" value="<?= $user["user_name"] ?>" disabled>
                <button class="edit-button" id="edit-username-button" type="button">Edit</button>
                </div>
                <div class="label-container">
                <label for="email">Email:</label>
                <input type="email" id="user_email" name="user_email" value="<?= $user["user_email"] ?>" disabled>

                <button class="edit-button" id="edit-email-button" type="button">Edit</button>
                </div>
                <div class="label-container">
                <label for="phone">Phone:</label>
                <input type="text" id="user_phone" name="user_phone" value="<?= $user["user_phone"] ?>" disabled>
                <button class="edit-button" id="edit-phone-button" type="button">Edit</button>
                </div>

                <button type="submit" id="update_profile" name="update_profile" style="display: none;">Update</button>

            </form>
        </div>
    </section>
    <script src="/src/public/js/profile.js"></script>
</body>
</html>
