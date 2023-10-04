<?php
    $title = "SayIt";
    $page = "Ruang Diskusi";

    $servername = "db";
    $username = "php_docker";
    $password = "password";
    $dbname = "php_docker";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, "SELECT * FROM timeline");
    $jumlahData = mysqli_num_rows($result);
    $jumlahDataPerHalaman = 3;
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    $query = "SELECT * FROM timeline LIMIT $awalData, $jumlahDataPerHalaman";
    $timeline = mysqli_query($conn, $query);

    require_once __DIR__ . "/../../models/timelineModel.php";
   
    $timelineModel = new timelineModel;
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
                        <?php
                            while ($row = mysqli_fetch_assoc($timeline)) {
                                echo '<div class="diskusi-box">';
                                echo '<div class="diskusi-header">';
                                echo '<div class="column">';
                                echo '<div class="diskusi-username">';
                                echo '<a class="host-username" href="#">'. htmlspecialchars($timelineModel->getUserName($row['user_id'])).'</a>';
                                echo '<p>'.$row["timeline_date"].'</p>';
                                echo '<img src="'. $row['timeline_path'] . '">';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '<div class="diskusi-body">';
                                echo '<p>'.$row["timeline_content"].'</p>';
                                echo '</div>';
                                echo '<div class="diskusi-footer">';
                                echo '</div>';
                                echo '</div>';
                            }
                        ?>

                    </div>
                </div>
        </section>
    
        
        <div id="overlay" class="overlay">
            <div class="form-diskusi"></div>
            <div class="diskusi-box">
                <form action="/src/backend/validate-ruangdiskusi.php" class="form" method="post">
                <div class="closeOverlayButton" id="closeOverlayButton" onclick="showOverlay()">&times;</div>
                <div class="diskusi-header">
                        <div class="diskusi-username">
                            <a class="host-username" href="#">Tulis Diskusi</a>
                        </div>
                    <div class="input-box">
                        <textarea id="long-text" name="timeline_content" rows="4" cols="50"
                        placeholder="Tulis diskusi anda..." required></textarea>
                    </div>
                    
                    <div class="diskusi-footer">
                        <label for="bukti">Add Media</label>
                            <br class="spasi">
                            <input type="file" placeholder="Upload media" name="timeline_path">
                            <br>
                            <form action="/?home" method="post">
                                <button class="btn" type="submit">Submit</button>
                            </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <button class="showOverlayButton" id="showOverlayButton" onclick="showOverlay()">Tambah Diskusi</button>


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
        
        <script src="/src/public/js/ruangdiskusi.js"></script>
    </body>
</html>