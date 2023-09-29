<?php
    $title = "SayIt";
    $page = "Artikel";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SayIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/src/public/css/artikel.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/components/navbar.php" ?>


        <section class="container">
            <input type="text" class="search-bar" placeholder="Cari artikel...">
            <div class="article-container">
                <div class="article">
                    <a href="article1.html" class="article-link">
                        <img src="../../public/img/capek.jpeg" alt="Artikel 1">
                        <div class="../../public/img/capek.jpeg">Title 1</div>
                        <div class="article-date">14/03/2002</div>
                        <div class="article-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </a>
                </div>
                <div class="article">
                    <a href="article2.html" class="article-link">
                        <img src="../../public/img/capek.jpeg" alt="Artikel 2">
                        <div class="article-title">Title 2</div>
                        <div class="article-date">14/03/2002</div>
                        <div class="article-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </a>
                </div>
                <div class="article">
                    <a href="article3.html" class="article-link">
                        <img src="../../public/img/sulit.jpeg" alt="Artikel 3">
                        <div class="article-title">Title 3</div>
                        <div class="article-date">14/03/2002</div>
                        <div class="article-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </a>
                </div>
                <div class="article">
                    <a href="article1.html" class="article-link">
                        <img src="../../public/img/profile.jpg" alt="Artikel 4">
                        <div class="../../public/img/capek.jpeg">Title 1</div>
                        <div class="article-date">14/03/2002</div>
                        <div class="article-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </a>
                </div>
                <div class="article">
                    <a href="article2.html" class="article-link">
                        <img src="../../public/img/capek.jpeg" alt="Artikel 5">
                        <div class="article-title">Title 2</div>
                        <div class="article-date">14/03/2002</div>
                        <div class="article-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </a>
                </div>
                <div class="article">
                    <a href="article3.html" class="article-link">
                        <img src="../../public/img/sulit.jpeg" alt="Artikel 6">
                        <div class="article-title">Title 3</div>
                        <div class="article-date">14/03/2002</div>
                        <div class="article-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                    </a>
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