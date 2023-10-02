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
        <link rel="stylesheet" href="/src/public/css/ruangdiskusi.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>

        <section class="container">
                <div class="row">
                    <div class="col">
                        <h3 class="judul">Ruang Diskusi</h3>
                        <div class="diskusi">
                            <div class="diskusi-box">
                                <div class="diskusi-header">
                                    <div class="column">
                                        <div class="diskusi-user">
                                            <img class="foto-profil" src="../../public/img/profile.jpg" alt="" width="50px" height="50px">
                                        </div>
                                        <div class="diskusi-username">
                                            <a class="host-username" href="#">Diky</a>
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
                            <div class="diskusi-box">
                                <div class="diskusi-header">
                                    <div class="column">
                                        <div class="diskusi-user">
                                            <img class="foto-profil" src="../../public/img/profile.jpg" alt="" width="50px" height="50px">
                                        </div>
                                        <div class="diskusi-username">
                                            <a class="host-username" href="#">Diky</a>
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
                            <div class="diskusi-box">
                                <div class="diskusi-header">
                                    <div class="column">
                                        <div class="diskusi-user">
                                            <img class="foto-profil" src="../../public/img/profile.jpg" alt="" width="50px" height="50px">
                                        </div>
                                        <div class="diskusi-username">
                                            <a class="host-username" href="#">Diky</a>
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