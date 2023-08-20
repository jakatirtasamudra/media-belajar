<div class="page-heading">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Profile
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Profile Saya.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>admin/">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?url=Profile">
                                Profile
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Halaman Data Identitas Diri Pengembang !
                </h4>
            </div>
            <div class="card-body">
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3 text-center">
                            <?php if ( @$session_profile['Photo'] == TRUE ) { ?>
                            <img src="<?= base_url(); ?>media/photo/<?= @$session_profile['Photo']; ?>"
                                alt="<?= nama_url(); ?>" class="rounded-circle" width="150px;" height="160;">
                            <?php } else { ?>
                            <img src="<?= base_url(); ?>assets/images/faces/5.jpg" alt="<?= nama_url(); ?>"
                                class="rounded-circle" width="150">
                            <?php } ?>
                        </div>

                        <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                        <br>
                        <div class="form-group mt-2">
                            <small class="text-danger">
                                * Gambar Tidak Boleh Lebih Dari 5 MB
                                <br>
                                * Format : JPG, JPEG, PNG
                            </small>
                            <br>
                            <input type="file" class="form-control" name="File-Upload" required>
                            <br>
                            <button type="submit" name="BtnPhoto" class="btn btn-primary btn-block">
                                <?php 
                                    if ( @$session_profile['Photo'] == TRUE ) {
                                        echo 'Ubah Data';
                                    } else {
                                        echo 'Simpan Data';
                                    }
                                ?>
                            </button>
                        </div>
                        <?php } ?>

                    </div>
                </form>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="DataDiri-tab" data-bs-toggle="tab" href="#DataDiri"
                                    role="tab" aria-controls="DataDiri" aria-selected="true">
                                    Data Diri
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="Akademik-tab" data-bs-toggle="tab" href="#Akademik" role="tab"
                                    aria-controls="Akademik" aria-selected="false">
                                    Akademik
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="Motivasi-tab" data-bs-toggle="tab" href="#Motivasi" role="tab"
                                    aria-controls="Motivasi" aria-selected="false">
                                    Motivasi
                                </a>
                            </li>
                        </ul>
                        <br>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="DataDiri" role="tabpanel"
                                aria-labelledby="DataDiri-tab">

                                <?php require_once __DIR__ . '/profile-d.php'; ?>

                            </div>
                            <div class="tab-pane fade" id="Akademik" role="tabpanel" aria-labelledby="Akademik-tab">
                                <p class="mt-2">

                                    <?php require_once __DIR__ . '/profile-a.php'; ?>

                                </p>
                            </div>
                            <div class="tab-pane fade" id="Motivasi" role="tabpanel" aria-labelledby="Motivasi-tab">
                                <p class="mt-2">

                                    <?php require_once __DIR__ . '/profile-m.php'; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>



<?php 


    if ( isset ( $_POST['BtnDataDiri'] ) ) {

        @$row_data = queryrow (" SELECT Id FROM Tbl_Profile ");

        if ( @$row_data == TRUE ) {

            @$query_update = mysqli_query ( @$koneksi ,  
                "
                    UPDATE Tbl_Profile SET
                        Nama        = '". @$_POST['Nama'] ."',
                        Nim         = '". @$_POST['Nim'] ."',
                        Agama       = '". @$_POST['Agama'] ."',
                        Tempat      = '". @$_POST['TempatLahir'] ."',
                        Lahir       = '". @$_POST['TanggalLahir'] ."',
                        Kelamin     = '". @$_POST['JenisKelamin'] ."',
                        Cita        = '". @$_POST['Cita'] ."',
                        Hobi        = '". @$_POST['Hobi'] ."',
                        Motto       = '". @$_POST['Motto'] ."'
                "
            );

            if ( @$query_update == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data Diri', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Simpan Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        } else {

            @$query_insert = mysqli_query ( @$koneksi , 
                "
                    INSERT INTO Tbl_Profile VALUES (
                        '1',
                        '". @$_POST['Nama'] ."',
                        '". @$_POST['Nim'] ."',
                        '". @$_POST['Agama'] ."',
                        '". @$_POST['TempatLahir'] ."',
                        '". @$_POST['TanggalLahir'] ."',
                        '". @$_POST['JenisKelamin'] ."',
                        '". @$_POST['Cita'] ."',
                        '". @$_POST['Hobi'] ."',
                        '". @$_POST['Motto'] ."',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        ''
                    )    
                " 
            );

            if ( @$query_insert == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data Diri', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Simpan Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        }

    }



    if ( isset ( $_POST['BtnAkademik'] ) ) {

        @$row_data = queryrow (" SELECT Id FROM Tbl_Profile ");

        if ( @$row_data == TRUE ) {

            @$query_update = mysqli_query ( @$koneksi ,  
                "
                    UPDATE Tbl_Profile SET
                        SD          = '". @$_POST['SD'] ."',
                        SD_T        = '". @$_POST['SD_1'] ."',
                        SD_A        = '". @$_POST['SD_2'] ."',
                        SMP         = '". @$_POST['SMP'] ."',
                        SMP_T       = '". @$_POST['SMP_1'] ."',
                        SMP_A       = '". @$_POST['SMP_2'] ."',
                        SMA         = '". @$_POST['SMA'] ."',
                        SMA_T       = '". @$_POST['SMA_1'] ."',
                        SMA_A       = '". @$_POST['SMA_2'] ."',
                        S1          = '". @$_POST['S1'] ."',
                        S1_T        = '". @$_POST['S1_1'] ."',
                        S1_A        = '". @$_POST['S1_2'] ."'
                "
            );

            if ( @$query_update == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data Diri', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Simpan Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        } else {

            @$query_insert = mysqli_query ( @$koneksi , 
                "
                    INSERT INTO Tbl_Profile VALUES (
                        '1',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '". @$_POST['SD'] ."',
                        '". @$_POST['SD_1'] ."',
                        '". @$_POST['SD_2'] ."',
                        '". @$_POST['SMP'] ."',
                        '". @$_POST['SMP_1'] ."',
                        '". @$_POST['SMP_2'] ."',
                        '". @$_POST['SMA'] ."',
                        '". @$_POST['SMA_1'] ."',
                        '". @$_POST['SMA_2'] ."',
                        '". @$_POST['S1'] ."',
                        '". @$_POST['S1_1'] ."',
                        '". @$_POST['S1_2'] ."',
                        '',
                        ''
                    )    
                " 
            );

            if ( @$query_insert == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data Diri', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Simpan Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        }

    }



    if ( isset ( $_POST['BtnMotivasi'] ) ) {

        @$row_data = queryrow (" SELECT Id FROM Tbl_Profile ");

        if ( @$row_data == TRUE ) {

            @$query_update = mysqli_query ( @$koneksi ,  
                "
                    UPDATE Tbl_Profile SET
                        Motivasi    = '". @$_POST['Motivasi'] ."'
                "
            );

            if ( @$query_update == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data Diri', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Simpan Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        } else {

            @$query_insert = mysqli_query ( @$koneksi , 
                "
                    INSERT INTO Tbl_Profile VALUES (
                        '1',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '',
                        '". @$_POST['Motovasi'] ."',
                        ''
                    )    
                " 
            );

            if ( @$query_insert == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data Diri', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Simpan Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        }

    }



    if ( isset ( $_POST['BtnPhoto'] ) ) {

        @$row_data = queryrow (" SELECT Id FROM Tbl_Profile ");

        if ( @$row_data == TRUE ) {

            @$uploads_file_media         = dirname(dirname(__DIR__)) . '/media/photo';

            @$nama_files_upload          = @$_FILES['File-Upload']['name'];
            
            @$nama_file_media            = explode('.', $nama_files_upload);
            @$ekstensi_file_media        = strtolower(end($nama_file_media));

            @$ukuran_file_media          = @$_FILES['File-Upload']['size'];
            @$tipe_file_media            = @$_FILES['File-Upload']['type'];
            @$tmp_file_media             = @$_FILES['File-Upload']['tmp_name'];

            @$extensions_file_media      = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
            @$path_file_file_media       = @$uploads_file_media  . "/" . date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media;

            @$extension_file_media       = array_pop($nama_file_media);

            @$file_explode_ekstensi      = explode("/", $tipe_file_media);

            @$ambil_ekstensi_file        = $file_explode_ekstensi[1];
            if ( @$ambil_ekstensi_file == 'jpg' OR @$ambil_ekstensi_file == 'JPG' ) {
                @$hasil_ekstensi_file    = 'JPG';
            } elseif ( @$ambil_ekstensi_file == 'jpeg' OR @$ambil_ekstensi_file == 'JPEG' ) {
                @$hasil_ekstensi_file    = 'JPEG';
            } elseif ( @$ambil_ekstensi_file == 'png' OR @$ambil_ekstensi_file == 'PNG' ) {
                @$hasil_ekstensi_file    = 'PNG';
            } else {
                @$hasil_ekstensi_file    = 'Tidak Dapat Ekstensi';
            }

            if ( @$hasil_ekstensi_file != 'Tidak Dapat Ekstensi' ) {

                if ( in_array($extension_file_media, $extensions_file_media) ) {

                    if ( $ukuran_file_media <= 5000000 ) {

                        if ( move_uploaded_file($tmp_file_media, $path_file_file_media) ) {

                            @$query_update = mysqli_query ( @$koneksi ,  
                                "
                                    UPDATE Tbl_Profile SET
                                        Photo    = '". date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media ."'
                                "
                            );

                            if ( @$query_update == TRUE ) {

                                echo "<script language='javascript'>
                                        setTimeout(function () { 
                                            Swal.fire({ 
                                                title: 'Berhasil', 
                                                text: 'Simpan Data Diri', 
                                                icon: 'success',
                                                    showConfirmButton: false 
                                                }); 
                                            }, 5);
                                            window.setTimeout(function() { 
                                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                                            } ,2000);
                                        </script>" ;

                            } else {

                                echo "<script language='javascript'>
                                        setTimeout(function () { 
                                            Swal.fire({ 
                                                title: 'Tidak Berhasil', 
                                                text: 'Error Simpan Data', 
                                                icon: 'error',
                                                    showConfirmButton: false 
                                                }); 
                                            }, 5);
                                            window.setTimeout(function() { 
                                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                                            } ,2000);
                                        </script>" ;

                            }

                        } else {

                            echo "<script language='javascript'>
                                    setTimeout(function () { 
                                        Swal.fire({ 
                                            title: 'Tidak Berhasil', 
                                            text: 'Transfer Ke Folder Gagal', 
                                            icon: 'error',
                                                showConfirmButton: false 
                                            }); 
                                        }, 5);
                                        window.setTimeout(function() { 
                                            window.location.replace('". base_url() ."admin/?url=Profile'); 
                                        } ,2000);
                                    </script>" ;

                        }

                    } else {

                        echo "<script language='javascript'>
                                setTimeout(function () { 
                                    Swal.fire({ 
                                        title: 'Tidak Berhasil', 
                                        text: 'Ukuran Tidak Boleh Lebih Dari 5 MB', 
                                        icon: 'error',
                                            showConfirmButton: false 
                                        }); 
                                    }, 5);
                                    window.setTimeout(function() { 
                                        window.location.replace('". base_url() ."admin/?url=Profile'); 
                                    } ,2000);
                                </script>" ;

                    }

                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Tidak Berhasil', 
                                    text: 'Format JPG, JPEG, dan PNG Saja', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."admin/?url=Profile'); 
                                } ,2000);
                            </script>" ;

                }

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Ekstensi Tidak Ada Pada Format', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        } else {

            @$uploads_file_media         = dirname(dirname(__DIR__)) . '/media/photo';

            @$nama_files_upload          = @$_FILES['File-Upload']['name'];
            
            @$nama_file_media            = explode('.', $nama_files_upload);
            @$ekstensi_file_media        = strtolower(end($nama_file_media));

            @$ukuran_file_media          = @$_FILES['File-Upload']['size'];
            @$tipe_file_media            = @$_FILES['File-Upload']['type'];
            @$tmp_file_media             = @$_FILES['File-Upload']['tmp_name'];

            @$extensions_file_media      = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
            @$path_file_file_media       = @$uploads_file_media  . "/" . date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media;

            @$extension_file_media       = array_pop($nama_file_media);

            @$file_explode_ekstensi      = explode("/", $tipe_file_media);

            @$ambil_ekstensi_file        = $file_explode_ekstensi[1];
            if ( @$ambil_ekstensi_file == 'jpg' OR @$ambil_ekstensi_file == 'JPG' ) {
                @$hasil_ekstensi_file    = 'JPG';
            } elseif ( @$ambil_ekstensi_file == 'jpeg' OR @$ambil_ekstensi_file == 'JPEG' ) {
                @$hasil_ekstensi_file    = 'JPEG';
            } elseif ( @$ambil_ekstensi_file == 'png' OR @$ambil_ekstensi_file == 'PNG' ) {
                @$hasil_ekstensi_file    = 'PNG';
            } else {
                @$hasil_ekstensi_file    = 'Tidak Dapat Ekstensi';
            }

            if ( @$hasil_ekstensi_file != 'Tidak Dapat Ekstensi' ) {

                if ( in_array($extension_file_media, $extensions_file_media) ) {

                    if ( $ukuran_file_media <= 5000000 ) {

                        if ( move_uploaded_file($tmp_file_media, $path_file_file_media) ) {

                            @$query_insert = mysqli_query ( @$koneksi , 
                                "
                                    INSERT INTO Tbl_Profile VALUES (
                                        '1',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '". date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media ."'
                                    )    
                                " 
                            );

                            if ( @$query_insert == TRUE ) {

                                echo "<script language='javascript'>
                                        setTimeout(function () { 
                                            Swal.fire({ 
                                                title: 'Berhasil', 
                                                text: 'Simpan Data Diri', 
                                                icon: 'success',
                                                    showConfirmButton: false 
                                                }); 
                                            }, 5);
                                            window.setTimeout(function() { 
                                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                                            } ,2000);
                                        </script>" ;

                            } else {

                                echo "<script language='javascript'>
                                        setTimeout(function () { 
                                            Swal.fire({ 
                                                title: 'Tidak Berhasil', 
                                                text: 'Error Simpan Data', 
                                                icon: 'error',
                                                    showConfirmButton: false 
                                                }); 
                                            }, 5);
                                            window.setTimeout(function() { 
                                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                                            } ,2000);
                                        </script>" ;

                            }

                        } else {

                            echo "<script language='javascript'>
                                    setTimeout(function () { 
                                        Swal.fire({ 
                                            title: 'Tidak Berhasil', 
                                            text: 'Transfer Ke Folder Gagal', 
                                            icon: 'error',
                                                showConfirmButton: false 
                                            }); 
                                        }, 5);
                                        window.setTimeout(function() { 
                                            window.location.replace('". base_url() ."admin/?url=Profile'); 
                                        } ,2000);
                                    </script>" ;

                        }

                    } else {

                        echo "<script language='javascript'>
                                setTimeout(function () { 
                                    Swal.fire({ 
                                        title: 'Tidak Berhasil', 
                                        text: 'Ukuran Tidak Boleh Lebih Dari 5 MB', 
                                        icon: 'error',
                                            showConfirmButton: false 
                                        }); 
                                    }, 5);
                                    window.setTimeout(function() { 
                                        window.location.replace('". base_url() ."admin/?url=Profile'); 
                                    } ,2000);
                                </script>" ;

                    }

                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Tidak Berhasil', 
                                    text: 'Format JPG, JPEG, dan PNG Saja', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."admin/?url=Profile'); 
                                } ,2000);
                            </script>" ;

                }

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Ekstensi Tidak Ada Pada Format', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Profile'); 
                            } ,2000);
                        </script>" ;

            }

        }

    }


?>