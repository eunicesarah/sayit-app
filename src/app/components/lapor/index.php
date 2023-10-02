<?php
    $title = "SayIt";
    $page = "Lapor";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SayIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/src/public/css/lapor.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>
        
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