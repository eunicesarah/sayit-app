<?php
    $title = "SayIt";
    $page = "Artikel";
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
        <section></section>
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