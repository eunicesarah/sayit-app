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
                    <!-- session destroy -->
                    <form action = "/src/backend/validate-logout.php" method = "post">
                        <button type="submit" class="btn">Log Out</button>
                    
            </div>
        </section>
        
    </body>    
</html>