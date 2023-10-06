<?php

$title = "SayIt";
$page = "Lapor";
// $_SESSION["user_id"] = ;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
    <link rel="stylesheet" href="/src/public/css/lapor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include(dirname(__DIR__)) . "/navbar/index.php" ?>

    <section class="container">
        <div class="form-lapor">
            <h3 class="judul">Form Laporan Pelecehan Seksual</h3>
            <form action="/src/backend/validate-lapor.php" class="form" method="post" enctype="multipart/form-data">
                <div class="radio">
                    <p>Saya adalah...</p>
                    <input type="radio" name="jenis" value="Korban">Saya Korban</input>
                    <br>
                    <input type="radio" name="jenis" value="Saksi">Saya Saksi</input>
                </div>
                <div class="input-box">
                    <label for="pelapor">Nama Pelapor</label>
                    <input type="text" placeholder="Nama" name="pelapor" required>
                </div>
                <div class="input-box">
                    <label for="lokasi">Lokasi Kejadian</label>
                    <input type="text" placeholder="Input lokasi kejadian" name="lokasi" required>
                </div>
                <div class="column">
                    <div class="input-box">
                        <label for="tanggal_kejadian">Tanggal Kejadian</label>
                        <input type="date" placeholder="DD/MM/YYYY" name="tanggal" required>
                    </div>
                    <div class="input-box">
                        <label for="waktu_kejadian">Waktu Kejadian</label>
                        <input type="time" placeholder="JJ:MM" name="waktu_kejadian" required>
                    </div>
                </div>
                <div class="input-box">
                    <label for="kronologi">Kronologi</label>
                    <br>
                    <textarea id="long-text" name="kronologi" rows="4" cols="50"
                        placeholder="Ceritakan kronologi kejadian" required></textarea>
                </div>
                <div class="bukti">
                    <label>Bukti</label>
                    <br class="spasi">
                    <input type="file" placeholder="Upload bukti" name="lapor_bukti">
                    <br>
                </div>
                <div class="submit-button">
                    <form action="/?lapor" method="post">
                        <button class="btn" type="submit">Submit</button>
                    </form>
                </div>
            </form>
    </section>

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
</body>

</html>