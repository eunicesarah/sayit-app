<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = array();

    // Validate name
    if (empty($_POST['name'])) {
        $errors[] = 'Please enter your name';
        echo "nama";
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors[] = 'Please enter your email';
        echo "email";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
        echo "email";
    }

    // Validate phone number
    if (empty($_POST['phone'])) {
        $errors[] = 'Please enter your phone number';
        echo "phone";
    }

    // Validate age
    if (empty($_POST['age'])) {
        $errors[] = 'Please enter your age';
        echo "age";
    } elseif (!is_numeric($_POST['age'])) {
        $errors[] = 'Age must be a number';
        echo "age";
    }

    // Validate password
    if (empty($_POST['password'])) {
        $errors[] = 'Please enter your password';
        echo "password";
    } elseif (strlen($_POST['password']) < 8) {
        $errors[] = 'Password must be at least 8 characters long';
        echo "password";
    }

    if (empty($errors)) {
        // All input is valid, proceed to insert into the database
        $mysqli = require __DIR__ . "/../db.php";

        $query = "INSERT INTO user (user_name, user_email, user_pass, user_gender, user_phone, user_age) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->stmt_init();

        if ($stmt->prepare($query)) {
            $password_hash = $_POST['password'];

            $stmt->bind_param('ssssii', $_POST["name"], $_POST["email"], $password_hash, $_POST["gender"], $_POST["phone"], $_POST["age"]);

            if ($stmt->execute()) {
                echo "User registered successfully.";
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
