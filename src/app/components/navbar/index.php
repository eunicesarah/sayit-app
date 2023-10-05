<?php

    $servername = "db";
    $username = "php_docker";
    $password = "password";
    $dbname = "php_docker";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
?>

<nav class="navbar">
    <input type="checkbox" id="nav-check">
    <label for="nav-check" class="check-button">
        <i class="fa fa-bars"></i>
    </label>
    <label class="logo"><span class="say">Say</span><span class="it">It</span></label>
    <ul>
        <li <?php if($page == "Home") echo "class='active'"; ?>><a href="/?home">Home</a></li>
        <li <?php if($page == "Artikel") echo "class='active'"; ?>><a href="/?artikel">Artikel</a></li>
        <li <?php if($page == "Ruang Diskusi") echo "class='active'"; ?>><a href="/?ruangdiskusi">Ruang Diskusi</a></li>
        <?php
        if (isset($_SESSION["user_id"])) {
            $row = mysqli_query($conn, "SELECT roles FROM user WHERE user_id = '".$_SESSION["user_id"]."'");
            // $roles = mysqli_fetch_assoc($roles);
            $row = mysqli_fetch_assoc($row);
            // echo "<script> console.log('lalala " . json_encode($row) . "' );</script>";
            if ($row['roles'] === "admin") {
                
                echo "<script> console.log('admin')</script>";
                echo "<li";
                if ($page == 'adminLapor') {
                    echo " class='active'";
                }
                echo "><a href='/?admin'>Lapor</a></li>";
                
            }
            else{
                echo "<li";
                if ($page == 'Lapor') {
                    echo " class='active'";
                }
                echo "><a href='/?lapor'>Lapor</a></li>";
            }
        }
        else{
            echo "<li";
                if ($page == 'Lapor') {
                    echo " class='active'";
                }
                echo "><a href='/?lapor'>Lapor</a></li>";
        }
        ?>
        <?php
        if (isset($_SESSION["user_id"])) {
            echo "<li";
                if ($page == 'Profile') {
                    echo " class='active'";
                }
                echo "><a href='/?profile'>Profile</a></li>";
            echo "<li";
                if ($page == 'LogOut') {
                    echo " class='active'";
                }
                echo "><a href='/?logout'>Log Out</a></li>";
        }
        else{
            echo "<li";
                if ($page == 'SignUp') {
                    echo " class='active'";
                }
                echo "><a href='/?signup'>Sign Up</a></li>";
        }
        ?>
    </ul>
</nav>