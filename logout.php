<?php


    ob_start();
    session_start();


    require_once __DIR__ . '/base_url.php';
    

    @$_SESSION = array();

    session_unset();
    session_destroy();

    echo "<script> 
            location.href='". base_url() ."';
        </script>";