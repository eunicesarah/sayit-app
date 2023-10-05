<?php
$title = "SayIt";
$page = "SignUp";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
    <link rel="stylesheet" href="/src/public/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>
    
    <section class="signupcont">
        <div class="boxsignup">
            <h1 class="judulsignup">Sign Up</h1>
            <form class="form" action="/src/backend/validate-signup.php" method="post">
                <div class="column">
                    <div class="input-box">
                        <label for="name" class="labelsignup">Name</label><br>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="input-box">
                        <label for="email" class="labelsignup">Email</label><br>
                        <input type="text" id="email" name="email">
                    </div>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label for="phone" class="labelsignup">Phone Number</label><br>
                        <input type="tel" id="phone" name="phone">
                    </div>
                    <div class="input-box">
                        <label for="password" class="labelsignup">Password</label><br>
                        <input type="password" id="password" name="password">
                    </div>
                </div>
                <br>
                <div class="genderbox">
                    <label for="gender" class="labelsignup">Gender</label><br>
                    <input type="radio" id="female" name="gender" value="Female">
                    <label for="female" class="labelsignup">Female</label><br>
                    <input type="radio" id="male" name="gender" value="Male">
                    <label for="male" class="labelsignup">Male</label>
                </div>
                <div class="submit-button">
                <button type="submit" class="btn" id="register">Register</button><br>
                <label class="detailtext">Already have an account?</label>
                <u><a class="linklogin" href="/?login">Login here</a></u>
                </div>
        </div>
        </form>
        </div>
    </section>
    
    <div class="name-overlay">
    </div>

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

    <script src="/src/public/js/signup.js"></script>
</body>

</html>