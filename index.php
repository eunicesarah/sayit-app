<?php

    require_once 'src/app/init.php';

    // if (session_status() == PHP_SESSION_NONE) {
    //     session_start();
    // }

    if (session_status() == PHP_SESSION_ACTIVE) {
        $current_time = time();
        if ($current_time - $_SESSION['updated_at'] > SESSION_REGENERATE_TIME) {
            // Prevent Session Fixation Attacks
            session_regenerate_id(true);
            $_SESSION['updated_at'] = $current_time;
    
            // Prevent CSRF Attacks
            unset($_SESSION['csrf_token']);
        }
    
        if ($current_time - $_SESSION['created_at'] > SESSION_EXPIRATION_TIME) {
            session_unset();
            session_destroy();
        }
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_set_cookie_params(COOKIE_EXPIRE);
        session_start();
    
        $current_time = time();
        $_SESSION['created_at'] = $current_time;
        $_SESSION['updated_at'] = $current_time;
    }

    $app = new App;

?>