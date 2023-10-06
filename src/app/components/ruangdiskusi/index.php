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
// $result = mysqli_query($conn, "SELECT * FROM timeline");
// $jumlahData = mysqli_num_rows($result);
// $jumlahDataPerHalaman = 3;
// $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
// $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
// $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$query = "SELECT * FROM timeline ";
$timeline = mysqli_query($conn, $query);

require_once __DIR__ . "/../../models/timelineModel.php";
require __DIR__ . "/../../../backend/validate-ruangdiskusi.php";

$timelineModel = new timelineModel;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
    <link rel="stylesheet" href="/src/public/css/ruangdiskusi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navbar -->
    <?php include(dirname(__DIR__)) . "/navbar/index.php" ?>

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

                    echo '<a class="host-username" href="#">' . htmlspecialchars($timelineModel->getUserName($row['user_id'])) . '</a>';
                    echo '<p>' . $row["timeline_date"] . '</p>';
                    // echo '<img src="data:image/jpeg;base64,'. base64_encode($row['timeline_path']) . '">'; // Menampilkan gambar BLOB
                    // echo '<img src="/src/public/media/'. ($row['timeline_path']) . '">';
                    // echo '<video width="320" height="240" controls>';
                    // echo '<source src="/src/public/media/'. ($row['timeline_path']) . '" type="video/mp4">';
                    // echo '</video>';
                    // echo '<script>console.log("haaha" . $_SESSION["roles"])</script>';
                   
                    if ($row['timeline_path']) {
                        $media_path = "/src/public/media/" . $row['timeline_path'];
                        $file_extension = pathinfo($media_path, PATHINFO_EXTENSION);

                        if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])) {
                            // Tampilkan gambar jika ekstensi file adalah gambar
                            echo '<img src="' . $media_path . '">';
                        } elseif ($file_extension == 'mp4') {
                            // Tampilkan video jika ekstensi file adalah mp4
                            echo '<video width="320" height="240" controls>';
                            echo '<source src="' . $media_path . '" type="video/mp4">';
                            echo '</video>';
                        } else {
                            // Tampilkan pesan jika jenis media tidak dikenali
                            echo 'Jenis media tidak didukung';
                        }
                    }
                    echo "<script> console.log('lalala " . $row['timeline_path'] . "' );</script>";
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="diskusi-body">';
                    echo '<p>' . $row["timeline_content"] . '</p>';
                    if (isset($_SESSION["user_id"])) {
                        $roles = mysqli_query($conn, "SELECT roles FROM user WHERE user_id = '" . $_SESSION["user_id"] . "'");
                        // $roles = mysqli_fetch_assoc($roles);
                        $roles = mysqli_fetch_assoc($roles);
                        if ($roles['roles'] === "admin") {
                            // echo '<form action="/src/backend/editTimeline.php" method="post">';
                            // echo '<input type="hidden" name="timeline_id" value="' . $row['timeline_id'] . '">';
                            echo '<br>';
                            echo '<a class="btn edit-button" href="?edit/index.php&timeline_id=' . $row['timeline_id'] . '">Edit</a>';
                            echo '<form action="/src/backend/deleteTimeline.php" method="post">';
                            echo '<input type="hidden" name="timeline_id" value="' . $row['timeline_id'] . '">';
                            echo '<button class="btn delete-button" name="delete")">Delete</button>';
                            echo '</form>';

                            echo '<br>';

                        }
                    }

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
            <form action="/src/backend/validate-ruangdiskusi.php" class="form" method="post"
                enctype="multipart/form-data">
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
                        <input type="file" placeholder="Upload media" name="image_file">
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
                        <img src="/src/public/img/gimmick.png" alt="logo" class="logofooter">
                        <li><a class="footer-content">SayIt adalah platform yang mewadahi pendidikan seks dan pelaporan
                                pelecehan seksual</a></li>
                        <li><a class="footer-content">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </footer>

    <script src="/src/public/js/ruangdiskusi.js"></script>
</body>

</html>