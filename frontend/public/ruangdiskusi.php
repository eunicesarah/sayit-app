<?php
    $title = "SayIt";
    $page = "Ruang Diskusi";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SayIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/css/style.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar">
            <input type="checkbox" id="nav-check">
            <label for="nav-check" class="check-button">
                <i class="fa fa-bars"></i>
            </label>
            <label class="logo"><span class="say">Say</span><span class="it">It</span></label>
            <ul>
                <li <?php if($page == "Home") echo "class='active'"; ?>><a href="../index.php">Home</a></li>
                <li <?php if($page == "Artikel") echo "class='active'"; ?>><a href="artikel.php">Artikel</a></li>
                <li <?php if($page == "Ruang Diskusi") echo "class='active'"; ?>><a href="ruangdiskusi.php">Ruang Diskusi</a></li>
                <li <?php if($page == "Lapor") echo "class='active'"; ?>><a href="lapor.php">Lapor</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="judul">Ruang Diskusi</h3>
                        <div class="diskusi">
                            <div class="diskusi-box">
                                <div class="diskusi-header">
                                    <div class="column">
                                        <div class="diskusi-user">
                                            <img class="foto-profil" src="../assets/img/profile.jpg" alt="" width="50px" height="50px">
                                        </div>
                                        <div class="diskusi-username">
                                            <a class="username" href="#">Username</a>
                                            <p>12 Desember 2020</p>
                                        </div>
                                    </div>
                                    <div class="diskusi-title">
                                        <h4>Apakah pelecehan seksual dapat terjadi di lingkungan sekolah?</h4>
                                    </div>
                                </div>
                                <div class="diskusi-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                                </div>
                                <div class="diskusi-footer">
                                </div>
                            </div>
                            <div class="komentar">
                                <div class="komentar-box">
                                    <div class="komen">
                                    <div class="column">
                                        <div class="diskusi-user">
                                            <img class="foto-profil" src="../assets/img/profile.jpg" alt="" width="50px" height="50px">
                                        </div>
                                        <div class="diskusi-username">
                                            <a class="username" href="#">Username</a>
                                            <p>12 Desember 2020</p>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
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