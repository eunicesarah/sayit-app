<?php
    $title = "SayIt";
    $page = "Home";
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SayIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/src/public/css/home.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/components/navbar.php" ?>
        
        <section class="container">
            <div class= "slider-container">
                <div class="slider-inner">
                    <div class="slider-item">
                        <img id= "slide-1" src="../../public/img/profile.jpg" alt="SayIt">
                        <img id= "slide-2" src="../../public/img/capek.jpeg" alt="SayIt">
                        <img id= "slide-3" src="../../public/img/sulit.jpeg" alt="SayIt">
                    </div>
                </div>
                <div class="slider-nav">
                    <a href="#slide-1" ></a>
                    <a href="#slide-2" ></a>
                    <a href="#slide-3" ></a>
                </div>
                <button class="btn-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="btn-next"><i class="fas fa-chevron-right"></i></button>

            </div>
            <div class= "hot-container">
                <h3 class="judul">Hot News</h3>
                <hr class="hot-line" size="1px" width="300px" align="center" color="black">
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