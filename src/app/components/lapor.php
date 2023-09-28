<?php
    $title = "SayIt";
    $page = "Lapor";
    session_start();

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
                <li <?php if($page == "Home") echo "class='active'"; ?>><a href="../../../../index.php">Home</a></li>
                <li <?php if($page == "Artikel") echo "class='active'"; ?>><a href="artikel.php">Artikel</a></li>
                <li <?php if($page == "Ruang Diskusi") echo "class='active'"; ?>><a href="ruangdiskusi.php">Ruang Diskusi</a></li>
                <li <?php if($page == "Lapor") echo "class='active'"; ?>><a href="lapor.php">Lapor</a></li>
                <?php
                if (isset($_SESSION["user_email"])) {
                    echo "<li><a href='../../../../index.php'>Home</a></li>";
                    echo "<li><a href='logout.php'>Log Out</a></li>";
                }
                else{
                    echo "<li><a href='signup.php'>Sign Up</a></li>";
                }
                ?>
            </ul>
        </nav>
        <section class="container">
            <div class="form-lapor">
                <h3 class="judul">Form Laporan Pelecehan Seksual</h3>
                <form action="#" class="form">
                    <div class="radio">
                        <p>Saya adalah...</p>
                        <input type="radio" name="jenis" value="Korban">Saya Korban</input>
                        <br>
                        <input type="radio" name="jenis" value="Saksi">Saya Saksi</input>
                    </div>
                    <div class="input-box">
                        <label for="">Nama Pelapor</label>
                        <input type="text" placeholder="Nama" required>
                    </div>
                    <div class="input-box">
                        <label for="">Lokasi Kejadian</label>
                        <input type="text" placeholder="Input lokasi kejadian" required>
                    </div>
                    <div class="column">
                        <div class="input-box">
                            <label for="">Tanggal Kejadian</label>
                            <input type="text" placeholder="DD/MM/YYYY" required>
                        </div>
                        <div class="input-box">
                            <label for="">Waktu Kejadian</label>
                            <input type="text" placeholder="JJ:MM" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <label for="long-text">Kronologi</label>
                        <br>
                        <textarea id="long-text" name="long-text" rows="4" cols="50" placeholder="Ceritakan kronologi kejadian" required></textarea>
                    </div>
                    <div class="bukti">
                        <label for="">Bukti</label>
                        <br class="spasi">
                        <input type="file" placeholder="Upload bukti">
                        <br>
                    </div>
                    <div class="submit-button">
                        <button class="btn">Submit</button>
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