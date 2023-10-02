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
        <li <?php if($page == "Lapor") echo "class='active'"; ?>><a href="/?lapor">Lapor</a></li>
        <?php
        if (isset($_SESSION["user_email"])) {
            echo "<li>", "<a href='/?home'>Log Out</a></li>";
        }
        else{
            echo "<li><a href='/?signup'>Sign Up</a></li>";
        }
        ?>
    </ul>
</nav>