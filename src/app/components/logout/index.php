<?php
    $title = "SayIt";
    $page = "LogOut";
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SayIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/src/public/css/logout.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>
        
        <section class="container">
            <div class="input-box">
                <h1 class="judul">Log Out</h1>
                    <p class="logout-narasi">Are you sure you want to log out?</p>
                    <div class="submit-button">
                    <form action="/?home" method="post">
                        <button class="btn" type="submit" name="logout">Log Out</button>
                    </form>
                    </div>
            </div>
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