<?php
    $title = "SayIt";
    $page = "Home";
    
    // Variabel untuk melacak slide saat ini
    $currentSlide = 1;

    // Handle navigasi ke slide sebelumnya
    if (isset($_POST['prev_slide'])) {
        if ($currentSlide > 1) {
            $currentSlide--;
        }
    }

    // Handle navigasi ke slide berikutnya
    if (isset($_POST['next_slide'])) {
        if ($currentSlide < 4) { // Ganti "3" dengan jumlah total slide Anda
            $currentSlide++;
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
        <title>SayIt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/src/public/css/home.css">        	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        <?php include (dirname(__DIR__)) . "/navbar/index.php" ?>
        
        <section class="container">
            <div class= "slider-container">
                <div class="slider-inner">
                    <div class="slider-item">
                        <?php if ($currentSlide == 1): ?>
                            <img id="slide-1" src="src\public\img\profile.jpg" alt="SayIt">
                        <?php elseif ($currentSlide == 2): ?>
                            <img id="slide-2" src="src\public\img\profile.jpg" alt="SayIt">
                        <?php elseif ($currentSlide == 3): ?>
                            <img id="slide-3" src="src\public\img\profile.jpg" alt="SayIt">
                        <?php endif; ?>
                    </div>
                </div>
                <form method="post" action="">
                    <!-- Tombol untuk slide sebelumnya -->
                    <button type="submit" class="slide-button slide-button-left" name="prev_slide">
                        <img src="src/public/img/left-button.png" alt="Left">
                    </button>
                    <!-- Tombol untuk slide berikutnya -->
                    <button type="submit" class="slide-button slide-button-right" name="next_slide">
                        <img src="src/public/img/right-button.png" alt="Right">
                    </button>
                </form>
            </div>
            <div class="hot-container">
                <h3 class="judul">Hot News</h3>
                <hr class="hot-line" size="1px" width="300px" align="center" color="black">
                <div class="hot-news">
                    <div class="hot-news-item">
                        <img src="src\public\img\profile.jpg" alt="Hot News 1">
                        <h4>Judul Berita 1</h4>
                        <p>Isi berita singkat untuk Hot News 1.</p>
                    </div>
                    <div class="hot-news-item">
                        <img src="src\public\img\profile.jpg" alt="Hot News 2">
                        <h4>Judul Berita 2</h4>
                        <p>Isi berita singkat untuk Hot News 2.</p>
                    </div>
                    <div class="hot-news-item">
                        <img src="src\public\img\profile.jpg" alt="Hot News 3">
                        <h4>Judul Berita 3</h4>
                        <p>Isi berita singkat untuk Hot News 3.</p>
                    </div>
                </div>
                <button onclick="window.location.href='/?artikel'" class="more-articles-button">More Articles</button>
            </div>
            
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