<?php


    ob_start();
    session_start();
    

    require_once dirname(__DIR__) . '/base_url.php';


    if ( @$_SESSION['User'] == FALSE ) {

        @$_SESSION = array();

        session_unset();
        session_destroy();

        echo "<script> 
                location.href='". base_url() ."';
            </script>";

    }


    @$session_user = queryid (" SELECT Id, Nama FROM Tbl_User WHERE Id = '". @$_SESSION['User'] ."' ORDER BY Id DESC ");

    
    @$session_judul_apps = queryid (" SELECT Id, Judul FROM Tbl_Judul ORDER BY Id DESC ");


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Apps | <?= nama_url(); ?>
    </title>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pages/error.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                    <img class="img-error" src="<?= base_url(); ?>assets/images/samples/error-404.svg" alt="Not Found"
                        style="width: 50%;">
                    <h1 class="error-title">
                        Selamat Datang, <?= @$session_user['Nama']; ?>
                    </h1>
                    <p class="fs-5 text-gray-600">
                        <?= @$session_judul_apps['Judul']; ?>
                    </p>
                    <a href="<?= base_url(); ?>user/" class="btn btn-lg btn-outline-primary mt-3">
                        Saatnya Belajar
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>