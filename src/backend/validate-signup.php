<?php
require_once __DIR__ . "/../db.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = array();

    // Validate name
    if (empty($_POST['name'])) {
        $errors[] = 'Please enter your name';
        // echo "<script>alert('Please enter your name!')</script>";
        echo "<script>window.location.href='/?signup';</script>";
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors[] = 'Please enter your email';
        // echo "<script>alert('Please enter your email!')</script>";
        echo "<script>window.location.href='/?signup';</script>";
    } 
    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
        // echo "<script>alert('Please enter a valid email!')</script>";
        echo "<script>window.location.href='/?signup';</script>";
    }

    // Validate phone number
    if (empty($_POST['phone'])) {
        $errors[] = 'Please enter your phone number';
        // echo "<script>alert('Please enter your phone number!')</script>";
        echo "<script>window.location.href='/?signup';</script>";
    } 
    // elseif (!preg_match('^\(\+62|62|0)8[1-9][0-9]{6,9}$^', $_POST['phone'])){
    //     $errors[] = 'Invalid phone number format';
    //     echo "phone";
    // }

    // Validate age
    // if (empty($_POST['age'])) {
    //     $errors[] = 'Please enter your age';
    //     echo "age";
    // } elseif (!is_numeric($_POST['age'])) {
    //     $errors[] = 'Age must be a number';
    //     echo "age";
    // } 

    // Validate password
    if (empty($_POST['password'])) {
        $errors[] = 'Please enter your password';
        // echo "<script>alert('Please enter your password!')</script>";
        echo "<script>window.location.href='/?signup';</script>";
    } elseif (strlen($_POST['password']) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
        // echo "<script>alert('Please enter your password!')</script>";
        echo "<script>window.location.href='/?signup';</script>";
    }

    if (empty($errors)) {
        // All input is valid, proceed to insert into the database
        $mysqli = require __DIR__ . "/../db.php";

        $query = "INSERT INTO user (user_name, user_email, user_pass, user_gender, user_phone, roles) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {
            $password_hash = $_POST['password'];
            $role = 'user';
            $stmt->bind_param('ssssii', $_POST["name"], $_POST["email"], $password_hash, $_POST["gender"], $_POST["phone"], $role);

            if ($stmt->execute()) {
                echo "<script>alert('Register success!')</script>";
                echo "<script>window.location.href='/?home';</script>";
            } else {
                echo $mysqli->error;
            }
        } else {
            die('Prepare failed: (' . $mysqli->errno . ') ' . $mysqli->error);
        }

        $stmt->close();
        $mysqli->close();
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
}
?>