<?php 


    if ( isset ( $_POST['BtnTambah'] ) ) {

        @$maxid          = queryid (" SELECT MAX( Id ) AS MaxKode_Id FROM Tbl_Evaluasi ");
        @$barumax_id     = @$maxid['MaxKode_Id'];
        @$urutmax        = @$barumax_id; @$urutmax++; @$barumax_id = @$urutmax;


        if ( @$_POST['Jenis'] == 'Y' ) {

            @$uploads_file_media         = dirname(dirname(__DIR__)) . '/media/soal';

            @$nama_files_upload          = @$_FILES['File-Upload']['name'];
            
            @$nama_file_media            = explode('.', $nama_files_upload); 
            @$ekstensi_file_media        = strtolower(end($nama_file_media));

            @$ukuran_file_media          = @$_FILES['File-Upload']['size'];
            @$tipe_file_media            = @$_FILES['File-Upload']['type'];
            @$tmp_file_media             = @$_FILES['File-Upload']['tmp_name'];

            @$extensions_file_media      = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG');
            @$path_file_file_media       = @$uploads_file_media  . "/Soal_" . @$barumax_id . "_" . date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media;

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

                    if ( $ukuran_file_media <= 2000000 ) {

                        if ( move_uploaded_file($tmp_file_media, $path_file_file_media) ) {

                            @$query_insert = mysqli_query ( @$koneksi ,  
                                "
                                    INSERT INTO Tbl_Evaluasi VALUES
                                    (
                                        '". @$barumax_id ."', '". @$_POST['Soal'] ."', 
                                        '". @$_POST['A'] ."', '". @$_POST['B'] ."', 
                                        '". @$_POST['C'] ."', '". @$_POST['D'] ."', 
                                        '". @$_POST['Kunci'] ."', '". @$_POST['Jenis'] ."', 
                                        'Soal_" . @$barumax_id . "_" . date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media . "',
                                        '". date('Y-m-d') ."'
                                    )
                                "
                            );

                            if ( @$query_insert == TRUE ) {

                                echo "<script language='javascript'>
                                        setTimeout(function () { 
                                            Swal.fire({ 
                                                title: 'Berhasil', 
                                                text: 'Simpan Data', 
                                                icon: 'success',
                                                    showConfirmButton: false 
                                                }); 
                                            }, 5);
                                            window.setTimeout(function() { 
                                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                                            } ,2000);
                                        </script>" ;

                            } else {

                                echo "<script language='javascript'>
                                        setTimeout(function () { 
                                            Swal.fire({ 
                                                title: 'Tidak Berhasil', 
                                                text: 'Error Query Data', 
                                                icon: 'error',
                                                    showConfirmButton: false 
                                                }); 
                                            }, 5);
                                            window.setTimeout(function() { 
                                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
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
                                            window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                                        } ,2000);
                                    </script>" ;

                        }

                    } else {

                        echo "<script language='javascript'>
                                setTimeout(function () { 
                                    Swal.fire({ 
                                        title: 'Tidak Berhasil', 
                                        text: 'Ukuran Tidak Boleh Lebih Dari 2 MB', 
                                        icon: 'error',
                                            showConfirmButton: false 
                                        }); 
                                    }, 5);
                                    window.setTimeout(function() { 
                                        window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                                    } ,2000);
                                </script>" ;

                    }

                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Tidak Berhasil', 
                                    text: 'Format JPG, JPEG, PNG, PDF, PPT dan mp4 Saja', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
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
                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                            } ,2000);
                        </script>" ;

            }

        } elseif ( @$_POST['Jenis'] == 'T' ) {

            @$query_insert = mysqli_query ( @$koneksi ,  
                "
                    INSERT INTO Tbl_Evaluasi VALUES
                    (
                        '". @$barumax_id ."', '". @$_POST['Soal'] ."', 
                        '". @$_POST['A'] ."', '". @$_POST['B'] ."', 
                        '". @$_POST['C'] ."', '". @$_POST['D'] ."', 
                        '". @$_POST['Kunci'] ."', '". @$_POST['Jenis'] ."', 
                        '',
                        '". date('Y-m-d') ."'
                    )
                "
            );

            if ( @$query_insert == TRUE ) {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Berhasil', 
                                text: 'Simpan Data', 
                                icon: 'success',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                            } ,2000);
                        </script>" ;

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Error Query Data', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                            } ,2000);
                        </script>" ;

            }

        } else {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Tidak Berhasil', 
                            text: 'Tidak Ada Pilihan Jenis', 
                            icon: 'error',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                        } ,2000);
                    </script>" ;

        }

    }


    if ( isset ( $_POST['BtnUbah'] ) ) {

        @$query_ubah = mysqli_query ( @$koneksi ,  
            "
                UPDATE Tbl_Evaluasi SET
                    Soal        = '". @$_POST['Soal'] ."',
                    A           = '". @$_POST['A'] ."',
                    B           = '". @$_POST['B'] ."',
                    C           = '". @$_POST['C'] ."',
                    D           = '". @$_POST['D'] ."',
                    Kunci       = '". @$_POST['Kunci'] ."'
                WHERE Id        = '". @$_POST['Id'] ."'
            "
        );

        if ( @$query_ubah == TRUE ) {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Berhasil', 
                            text: 'Simpan Data', 
                            icon: 'success',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                        } ,2000);
                    </script>" ;

        } else {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Tidak Berhasil', 
                            text: 'Error Query Data', 
                            icon: 'error',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                        } ,2000);
                    </script>" ;

        }

    }



    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Ubah' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$ubah = queryid (" SELECT Id, Soal, A, B, C, D, Kunci, Jenis, Gambar FROM Tbl_Evaluasi WHERE Id = '". @$_GET['Id'] ."' ORDER BY Id DESC ");

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Parameter Tidak Di ketahui', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                            } ,2000);
                        </script>" ;

            }

        } elseif ( @$_GET['mod'] == 'Hapus' ) {

            if ( @$_GET['Id'] == TRUE AND @$_GET['B'] == TRUE ) {

                @unlink ( "../media/soal/" . @$_GET['B'] );

                @$query_delete = mysqli_query ( @$koneksi ,  
                    "
                        DELETE FROM Tbl_Evaluasi 
                        WHERE Id    = '". @$_GET['Id'] ."'
                    "
                );

                if ( @$query_delete == TRUE ) {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Berhasil', 
                                    text: 'Hapus Data', 
                                    icon: 'success',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                                } ,2000);
                            </script>" ;

                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Tidak Berhasil', 
                                    text: 'Error Query Data', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                                } ,2000);
                            </script>" ;

                }

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Tidak Berhasil', 
                                text: 'Parameter Tidak Di ketahui', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."admin/?url=Evaluasi'); 
                            } ,2000);
                        </script>" ;

            }

        }

    }
    

?>


<div class="page-heading">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Evaluasi
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Evaluasi.
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
                            <a href="?url=Evaluasi">
                                Evaluasi
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
                    Halaman Data Evaluasi !
                </h4>

                <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">

                    <?php if ( @$ubah['Id'] == TRUE ) { ?>

                    <input type="hidden" name="Id" class="form-control" placeholder="Masukkan ID Evaluasi"
                        value="<?= @$ubah['Id']; ?>" autocomplete="off" required readonly>

                    <?php }?>

                    <div class="form-group">
                        <label class="mb-2">
                            Soal
                        </label>
                        <input type="text" name="Soal" class="form-control" placeholder="Masukkan Soal"
                            value="<?= @$ubah['Soal']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Jawaban A
                        </label>
                        <input type="text" name="A" class="form-control" placeholder="Masukkan Jawaban A"
                            value="<?= @$ubah['A']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Jawaban B
                        </label>
                        <input type="text" name="B" class="form-control" placeholder="Masukkan Jawaban B"
                            value="<?= @$ubah['B']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Jawaban C
                        </label>
                        <input type="text" name="C" class="form-control" placeholder="Masukkan Jawaban C"
                            value="<?= @$ubah['C']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Jawaban D
                        </label>
                        <input type="text" name="D" class="form-control" placeholder="Masukkan Jawaban D"
                            value="<?= @$ubah['D']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Kunci Jawaban
                        </label>
                        <select name="Kunci" class="form-control" id="select">
                            <?php if ( @$ubah['Kunci'] == TRUE ) { ?>
                            <option value="<?= @$ubah['Kunci']; ?>">Jawaban Benar <?= @$ubah['Kunci']; ?></option>
                            <option value="" disabled>--- ##### ---</option>
                            <?php } else { ?>
                            <option value="" selected disabled>--- Pilih Kunci Jawaban ---</option>
                            <?php } ?>
                            <option value="A">Jawaban Benar A</option>
                            <option value="B">Jawaban Benar B</option>
                            <option value="C">Jawaban Benar C</option>
                            <option value="D">Jawaban Benar D</option>
                        </select>
                    </div>
                    <?php if ( @$ubah['Id'] == TRUE ) { ?>
                    <div>
                        <?php if ( @$ubah['Jenis'] == 'Y' ) { ?>
                        <div class="form-group">
                            <label class="mb-2">
                                Gambar Soal
                            </label>
                            <br>
                            <center>
                                <img class="w-50 active text-center"
                                    src="<?= base_url(); ?>media/soal/<?= @$ubah['Gambar']; ?>">
                            </center>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } else { ?>
                    <div class="form-group">
                        <label class="mb-2">
                            Pilih Jenis Tambahan
                        </label>
                        <select name="Jenis" class="form-control" id="test" onchange="showDiv(this)" required>
                            <option value="T" selected>Tidak Pakai Gambar</option>
                            <option value="Y">Pakai Gambar</option>
                        </select>
                    </div>
                    <div class="form-group" id="hidden_div" style="display:none;">
                        <label class="mb-2">
                            Bahan Soal
                            <br>
                            <small class="text-danger">
                                * Bahan Soal Tidak Boleh Lebih Dari 2 MB
                                <br>
                                * Format JPG, JPEG, PNG
                            </small>
                        </label>
                        <br>
                        <input type="file" class="form-control" name="File-Upload">
                    </div>
                    <?php } ?>
                    <div class="form-group mt-2">
                        <?php if ( @$ubah['Id'] == TRUE ) { ?>
                        <button type="submit" name="BtnUbah" class="btn btn-success btn-block">
                            Ubah Data
                        </button>
                        <?php } else { ?>
                        <button type="submit" name="BtnTambah" class="btn btn-primary btn-block">
                            Simpan Data
                        </button>
                        <?php } ?>
                    </div>
                </form>
                <?php } ?>

            </div>
        </div>
    </section>

</div>


<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-borderless table-hover table-lg" width="100%"
                    cellspacing="0" id="table1">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="text-center">Nomor</th>
                            <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                            <th class="text-center">Aksi</th>
                            <?php } ?>
                            <th class="text-center">Soal</th>
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Detail</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                                @$nomor = '1';
                                
                                @$session_request_data = query (" SELECT Id, Soal, Jenis, Tanggal, Gambar FROM Tbl_Evaluasi ORDER BY Id DESC ");

                                    foreach ( $session_request_data AS $data => $request_data ) :
                            
                            ?>

                        <tr>
                            <td class="text-center">
                                <?= @$nomor++; ?>
                            </td>
                            <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                            <td class="text-center">
                                <?php if ( @$ubah['Id'] == TRUE ) { ?>
                                <div>
                                    <span class="badge bg-danger">
                                        Kunci
                                    </span>
                                </div>
                                <?php } else { ?>
                                <div class="buttons">
                                    <a href="?url=Evaluasi&mod=Hapus&Id=<?= @$request_data['Id'] ?>&B=<?= @$request_data['Gambar'] ?>"
                                        class="btn icon btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <a href="?url=Evaluasi&mod=Ubah&Id=<?= @$request_data['Id'] ?>"
                                        class="btn icon btn-sm btn-success">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </div>
                                <?php } ?>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                                <?= @$request_data['Soal']; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                    if ( @$request_data['Jenis'] == 'Y' ) {
                                        echo 
                                            "
                                                <span class='badge bg-success'>
                                                    Pakai Gambar
                                                </span>
                                            ";
                                    } elseif ( @$request_data['Jenis'] == 'T' ) {
                                        echo 
                                            "
                                                <span class='badge bg-danger'>
                                                    Tidak Pakai Gambar
                                                </span>
                                            ";
                                    } else {
                                        echo 
                                            "
                                                <span class='badge bg-warning'>
                                                    Tidak Ada Kondisi
                                                </span>
                                            ";
                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?= date('m F Y', strtotime(@$request_data['Tanggal'])); ?>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#Modal-Read-Bahan-Evaluasi-<?= @$request_data['Id']; ?>">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="modal fade text-center"
                                    id="Modal-Read-Bahan-Evaluasi-<?= @$request_data['Id']; ?>" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary">
                                                <h5 class="modal-title text-white" id="myModalLabel1">
                                                    Informasi
                                                </h5>
                                                <button type="button" class="close rounded-pill text-white"
                                                    data-bs-dismiss="modal" aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                    @$session_modal_read_soal = queryid (" SELECT Soal, A, B, C, D, Kunci, Jenis, Gambar FROM Tbl_Evaluasi WHERE Id = '". @$request_data['Id'] ."' ORDER BY Id DESC ");
                                                ?>
                                                <h4 class="text-center text-center">
                                                    <?= @$session_modal_read_soal['Soal']; ?>
                                                </h4>
                                                <hr>
                                                <h5 class="text-center text-danger">
                                                    Kunci Jawaban <?= @$session_modal_read_soal['Kunci']; ?>
                                                </h5>
                                                <?php if ( @$session_modal_read_soal['Jenis'] == 'Y' ) { ?>
                                                <hr>
                                                <img class="w-100 active text-center"
                                                    src="<?= base_url(); ?>media/soal/<?= @$session_modal_read_soal['Gambar']; ?>"
                                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                                <?php } ?>
                                                <hr>
                                                <p class="text-left">
                                                    A. <?= @$session_modal_read_soal['A']; ?>
                                                    <br>
                                                    B. <?= @$session_modal_read_soal['B']; ?>
                                                    <br>
                                                    C. <?= @$session_modal_read_soal['C']; ?>
                                                    <br>
                                                    D. <?= @$session_modal_read_soal['D']; ?>
                                                    <br>
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    Tutup
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>