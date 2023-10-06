<?php

$title = "SayIt";
$page = "Artikel";

$servername = "db";
$username = "php_docker";
$password = "password";
$dbname = "php_docker";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
$result = mysqli_query($conn, "SELECT * FROM article");
$jumlahData = mysqli_num_rows($result);
$jumlahDataPerHalaman = 3;
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$query = "SELECT * FROM article  LIMIT $awalData, $jumlahDataPerHalaman   ";
$article = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>SayIt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/src/public/img/gimmick.png" type="image/x-icon">
    <link rel="stylesheet" href="/src/public/css/artikel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>


<body>

    <?php include(dirname(__DIR__)) . "/navbar/index.php" ?>

    <section class="container">
        <input type="text" class="search-bar" id="search" placeholder="Cari artikel...">

        <div id="search-results" class="article-container">


        </div>

        <div class="article-container">
            <?php

            while ($row = mysqli_fetch_assoc($article)) {
                echo '<div class="article">';
                echo '<a >';
                echo '<img src="' . $row['article_image'] . '" alt="Gambar'. $row['article_judul'] . '">';
                echo '<div class="article-title">' . $row['article_judul'] . '</div>';
                echo '<div class="article-date">' . $row['article_date'] . '</div>';
                echo '<div class="article-description">' . $row['article_content'] . '</div>';
                echo '</a>';
                echo '</div>';


            }
            ?>
        </div>

        <div class="pagination-nav">
            <?php if ($halamanAktif > 1): ?>
                <a href="?artikel/index.php&halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
                <?php if ($i == $halamanAktif): ?>
                    <a href="?artikel/index.php&halaman=<?= $i; ?>" style="font-weight: bold; color: red;">
                        <?= $i; ?>
                    </a>
                <?php else: ?>
                    <a href="?artikel/index.php&halaman=<?= $i; ?>">
                        <?= $i; ?>
                    </a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($halamanAktif < $jumlahHalaman): ?>
                <a href="?artikel/index.php&halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <?php endif; ?>



        </div>
    </section>
    <?php if (isset($_SESSION["user_id"])): ?>
        <?php
        $roles = mysqli_query($conn, "SELECT roles FROM user WHERE user_id = '" . $_SESSION["user_id"] . "'");
        $roles = mysqli_fetch_assoc($roles);
        if ($roles['roles'] === "admin"):
            ?>
            <button class="add-article-button" onclick="openAddArticleOverlay()">Add Article</button>
            <div id="addArticleOverlay" class="overlay">
                <div class="overlay-content">
                    <!-- Add Article Form -->
                    <form action="/src/backend/addArticle.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="add" value="1">
                        <input type="text" name="article_judul" placeholder="Judul Artikel" required>
                        <input type="text" name="article_category" placeholder="Kategori Artikel" required>
                        <input type="file" name="article_image">
                        <textarea name="article_content" id="article_content" cols="30" rows="10" placeholder="Isi Artikel"
                            required></textarea>
                        <!-- Add your form fields for adding articles here -->

                        <button class="btn" type="submit">Submit</button>
                    </form>
                    <button class="close-overlay-button" onclick="closeAddArticleOverlay()">&times;</button>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>




    <!-- <button class="showOverlayButton" id="showOverlayButton" onclick="showOverlay()">Tambah Diskusi</button> -->
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
    <script src="src/public/js/artikel.js"></script>
</body>
<script>
    // JavaScript to open the Add Article overlay
    function openAddArticleOverlay() {
        var overlay = document.getElementById("addArticleOverlay");
        overlay.style.display = "block";
    }

    // JavaScript to close the Add Article overlay
    function closeAddArticleOverlay() {
        var overlay = document.getElementById("addArticleOverlay");
        overlay.style.display = "none";
    }
</script>


</html>

<?php

mysqli_close($conn);
?>