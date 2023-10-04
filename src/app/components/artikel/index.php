<?php

    $title = "SayIt";
    $page = "Artikel";
    // require __DIR__ .'/../../../backend/query.php';
 
    $servername = "db";
    $username = "php_docker";
    $password = "password";
    $dbname = "php_docker"; 
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // $conn = mysqli_connect(
    //     $hostname = ini_get("mysqli.default_host"),
    //     $username = ini_get("mysqli.default_user"),
    //     $password = ini_get("mysqli.default_pw"),
    //     $database = "",
    //     $port = ini_get("mysqli.default_port"),
    //     $socket = ini_get("mysqli.default_socket")
    // );
    if (!$conn) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, "SELECT * FROM article");
    $jumlahData = mysqli_num_rows($result);
    $jumlahDataPerHalaman = 3;
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    $query = "SELECT * FROM article LIMIT $awalData, $jumlahDataPerHalaman";
    $article = mysqli_query($conn, $query);


    // $query = "SELECT * FROM article";
    // $result = mysqli_query($conn, $query);
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
    <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>

    <section class="container">
        <input type="text" class="search-bar" placeholder="Cari artikel...">

        <div class="article-container">
            <?php

                    while($row = mysqli_fetch_assoc($article)) {
                    echo '<div class="article">';
                    echo '<a >';
                    echo '<img src="' . $row['article_image'] .  '">';
                    echo '<div class="article-title">' . $row['article_judul'] . '</div>';
                    echo '<div class="article-date">' . $row['article_date'] . '</div>';
                    echo '<div class="article-description">' . $row['article_content'] . '</div>';
                    echo '</a>';
                    echo '</div>';


                }
            ?>
        </div>
        <div class ="pagination">
        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
                <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
            <?php else : ?>
                <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        </div>
    </section>
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

<?php
    // 4. Menutup koneksi ke database
    mysqli_close($conn);
?>