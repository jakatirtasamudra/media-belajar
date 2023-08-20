<?php 


    @$session_judul_apps = queryid (" SELECT Id, Judul FROM Tbl_Judul ORDER BY Id DESC ");


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta name="<?= nama_url(); ?>" content="Aplikasi">
    <meta name="<?= nama_url(); ?>" content="Aplikasi">

    <title>
        Login | <?= nama_url(); ?>
    </title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.png" type="image/png">


    <!-- Base Assets -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main/app-dark.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pages/auth.css">


    <!-- Base Sweetalert -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/extensions/sweetalert2/sweetalert2.min.css">


</head>

<body>

    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-3 col-3"></div>
            <div class="col-lg-6 col-6">
                <div class="text-center mt-lg-4">
                    <a href="<?= base_url(); ?>" class="text-center">
                        <img src="<?= base_url(); ?>media/logo1.png" alt="Logo" width="10%;">
                    </a>
                    <h3 class="mt-4 text-center">
                        Selamat Data
                    </h3>
                    <p class="mb-5 text-black text-center">
                        Semoga Anda Dalam Keadaan Sehat Selalu
                        <br>
                        <?= @$session_judul_apps['Judul']; ?>
                    </p>

                    <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama Lengkap Anda"
                                name="User" autocomplete="off" required>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama Sekolah Anda"
                                name="Pass" autocomplete="off" required>
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <!-- <div class="form-group text-left">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" data-parsley-required="true">
                                <label class="form-check-label form-label text-left" for="flexRadioDefault1">
                                    Perempuan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2">
                                <label class="form-check-label form-label text-left" for="flexRadioDefault2">
                                    Laki-Laki
                                </label>
                            </div>
                        </div> -->
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" name="Login">
                            Saya Siap Belajar !
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-3"></div>
        </div>

    </div>


    <!-- Base Sweetalert -->
    <script src="<?= base_url(); ?>assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/sweetalert2.js"></script>


</body>

</html>





<?php 

    if ( isset ( $_POST['Login'] ) ) {
        if ( isset ( $_POST['User'] ) AND isset ( $_POST['Pass'] ) ) {

            @$data_admin = queryid (" SELECT Id, Nama, Level FROM Tbl_Akun WHERE User = '". @$_POST['User'] ."' AND Pass = '". @$_POST['Pass'] ."' ORDER BY Id DESC ");

            if ( @$data_admin['Level'] == 'Admin' ) {

                @$_SESSION['Id']        = @$data_admin['Id'];
                @$_SESSION['Nama']      = @$data_admin['Nama'];
                @$_SESSION['Status']    = @$data_admin['Level'];

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Selamat Datang ". @$_SESSION['Nama'] ."', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/'); 
                            } ,2000);
                        </script>" ;

            } elseif ( @$data_admin['Level'] == 'Dosen' ) {

                @$_SESSION['Id']        = @$data_admin['Id'];
                @$_SESSION['Nama']      = @$data_admin['Nama'];
                @$_SESSION['Status']    = @$data_admin['Level'];

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Selamat Datang ". @$_SESSION['Nama'] ."', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/'); 
                            } ,2000);
                        </script>" ;

            } else {

                @$maxid          = queryid (" SELECT MAX( Id ) AS MaxKode_Id FROM Tbl_User ");
                @$barumax_id     = @$maxid['MaxKode_Id'];
                @$urutmax        = @$barumax_id; @$urutmax++; @$barumax_id = @$urutmax;

                @$query_insert = mysqli_query ( @$koneksi ,  
                    "
                        INSERT INTO Tbl_User VALUES
                        (
                            '". @$barumax_id ."', '". @$_POST['User'] ."', 
                            '". @$_POST['Pass'] ."', '0', 
                            '". date('Y-m-d') ."', '". date('Y-m-d') ."'
                        )
                    "
                );

                @$_SESSION['User']        = @$barumax_id;

                if ( @$query_insert == TRUE ) {

                    echo "<script language='javascript'>
                                window.location.replace('". base_url() ."konfirmasi/'); 
                            </script>" ;

                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Informasi !', 
                                    text: 'Mohon Maaf Hak Akses Di Tolak', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."'); 
                                } ,2000);
                            </script>" ;
                
                }

            }

        } else {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Informasi !', 
                            text: 'Harap Mengisi Username, Password dan Jenis Kelamin !', 
                            icon: 'error',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."'); 
                        } ,2000);
                    </script>" ;

        }
    }

?>