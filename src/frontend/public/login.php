<?php
$title = "SayIt";
$page = "LogIn";

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "../../../db.php";

    $sql = sprintf(
        "SELECT * FROM user WHERE user_email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    if ($user) {
        if (password_verify($_POST["password"], $user["user_pass"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];

            header("Location: ../../../../index.php");
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar">
        <input type="checkbox" id="nav-check">
        <label for="nav-check" class="check-button">
            <i class="fa fa-bars"></i>
        </label>
        <label class="logo"><span class="say">Say</span><span class="it">It</span></label>
        <ul>
            <li <?php if ($page == "Home")
                echo "class='active'"; ?>><a href="../../../../index.php">Home</a></li>
            <li <?php if ($page == "Artikel")
                echo "class='active'"; ?>><a href="artikel.php">Artikel</a></li>
            <li <?php if ($page == "Ruang Diskusi")
                echo "class='active'"; ?>><a href="ruangdiskusi.php">Ruang Diskusi</a>
            </li>
            <li <?php if ($page == "Lapor")
                echo "class='active'"; ?>><a href="lapor.php">Lapor</a></li>
            <li <?php if ($page == "SignUp")
                echo "class='active'"; ?>><a href="signup.php">Sign Up</a></li>
        </ul>
    </nav>
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
</body>

</html>