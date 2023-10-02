<?php
$title = "SayIt";
$page = "LogIn";


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
        echo "<script>console.log('Debug Objects: " . json_encode($user) . "' );</script>";
        echo "<script>console.log('Debug Objects: " .  password_verify($password, $user["user_pass"]) . "' );</script>";
        if (password_verify($password, $user["user_pass"])) {
            echo "<script>console.log('password Objects: " . $password . "' );</script>";
            echo "<script>console.log('password Objects: " . $user["user_pass"] . "' );</script>";
            session_regenerate_id();
            $_SESSION["user_id"] = $user["user_id"];

            header("Location: home.php");
            exit;
        }
    }
    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SayIt</title>
    <link rel="stylesheet" href="/src/public/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>
    
    <section class="signupcont">
        <div class="boxsignup">
            <h1 class="judulsignup">Log In</h1>
            <?php if (($is_invalid) && isset($is_invalid)): ?>
                <em>Invalid login</em>
            <?php endif; ?>
            <form class="form" method="post">
                <div class="input-box">
                    <label for="email" class="labelsignup">E-mail</label><br>
                    <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                </div>
                <div class="input-box">
                    <label for="password" class="labelsignup">Password</label><br>
                    <input type="password" id="password" name="password">
                </div>
                <button type="submit" id="login">Log In</button><br>
                <label class="detailtext">Do not have an account?</label>
                <u><a class="linklogin" href="signup.php">Register here</a></u>
            </form>
    </section>
    <footer class="footer">
            <div class="footer-container">
                <div class="row">
                    <div class="footer-col">
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4></h4>
                        <ul>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Our Partner</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
</body>

</html>