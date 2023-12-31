<?php
ob_start();
$title = "SayIt";
$page = "LogIn";


$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/../../../db.php";

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


            echo "<script>location.href='/?home'</script>";
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
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
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
            <form class="form" method="post" id='form'>
                <div class="input-box">
                    <label for="email" class="labelsignup">E-mail</label><br>
                    <input type="text" id="email" name="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                    <div class="error"></div>

                </div>
                <div class="input-box">
                    <label for="password" class="labelsignup">Password</label><br>
                    <input type="password" id="password" name="password">
                    <div class="error"></div>

                </div>
                <div class="submit-button">
                <button type="submit" class="btn" id="login">Log In</button><br>
                <label class="detailtext">Do not have an account?</label>
                <u><a class="linklogin" href="/?signup">Register here</a></u>
                </div>
            </form>
    </section>
    <footer class="footer">
            <div class="footer-container">
                <div class="row">
                    <div class="footer-col">
                        <ul>
                            <img src="/src/public/img/gimmick.png" alt="logo" class="logofooter">
                            <li><a class="footer-content">SayIt adalah platform yang mewadahi pendidikan seks dan pelaporan pelecehan seksual</a></li>
                            <li><a class="footer-content">Contact Us</a></li>
                        </ul>
                    </div>
                    </div>
                </div>
            </div>
        </footer>

</body>

</html>