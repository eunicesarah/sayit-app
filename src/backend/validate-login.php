<?php
$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "../../../db.php";

    // Sanitize and escape user input
    $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
    $password = mysqli_real_escape_string($mysqli, $_POST["password"]);

    $sql = "SELECT user_id, user_email, user_pass FROM user WHERE user_email = '$email'";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows == 1) {
        $user = $result->fetch_assoc();
        echo "<script>console.log('lalala " . json_encode($user) . "' );</script>";
        echo "<script>console.log('lalala " . $user["user_pass"] . "' );</script>";
        
        echo "<script>console.log('Debug Objects: " .  password_verify($password, $user["user_pass"]) . "' );</script>";
        if ($password == $user["user_pass"]) {
            echo "<script>console.log('lalalala " . $password . "' );</script>";
            echo "<script>console.log('password Objects: " . $user["user_pass"] . "' );</script>";
            // session_regenerate_id();
            $_SESSION["user_id"] = $user["user_id"];

            echo "<script>console.log('dah masuk " . $password . "' );</script>";


            header("location: home.php");
            exit;
        }
    }
    $is_invalid = true;
}