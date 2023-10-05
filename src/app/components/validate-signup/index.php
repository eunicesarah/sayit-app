<?php 
    require_once "src/app/models/validate-signup.php";

    $validateSignup = new validateSignup;
?>

<div id="overlay" class="overlay">
    <div class="validate-nama"></div>
    <div class="error-nama">
        <div class="closeOverlayButton" id="closeOverlayButton" onclick="showOverlay()">&times;</div>
            <div class="content">
                <a class="username" href="#">Lengkapi Nama Anda!</a>
            </div>
        </div>
    </div>
</div>