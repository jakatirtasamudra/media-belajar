<?php 


    if ( isset ( $_POST['BtnTambah'] ) ) {

        @$maxid          = queryid (" SELECT MAX( Id ) AS MaxKode_Id FROM Tbl_Materi ");
        @$barumax_id     = @$maxid['MaxKode_Id'];
        @$urutmax        = @$barumax_id; @$urutmax++; @$barumax_id = @$urutmax;

        @$uploads_file_media         = dirname(dirname(__DIR__)) . '/media/materi';

        @$nama_files_upload          = @$_FILES['File-Upload']['name'];
        
        @$nama_file_media            = explode('.', $nama_files_upload); 
        @$ekstensi_file_media        = strtolower(end($nama_file_media));

        @$ukuran_file_media          = @$_FILES['File-Upload']['size'];
        @$tipe_file_media            = @$_FILES['File-Upload']['type'];
        @$tmp_file_media             = @$_FILES['File-Upload']['tmp_name'];

        @$extensions_file_media      = array('jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'pdf', 'PDF', 'mp4', 'pptx','ppt','pptm','vnd.openxmlformats-officedocument.presentationml.presentation','vnd.ms-powerpoint');
        @$path_file_file_media       = @$uploads_file_media  . "/" . @$_POST['Tujuan'] . "_" . date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media;

        @$extension_file_media       = array_pop($nama_file_media);

        @$file_explode_ekstensi      = explode("/", $tipe_file_media);


        if ( @$_POST['Tujuan'] == 'Gambar' ) {

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

        } else if ( @$_POST['Tujuan'] == 'Pdf' ) {

            @$ambil_ekstensi_file        = $file_explode_ekstensi[1];
            if ( @$ambil_ekstensi_file == 'pdf' OR @$ambil_ekstensi_file == 'PDF' ) {
                @$hasil_ekstensi_file    = 'PDF';
            } else {
                @$hasil_ekstensi_file    = 'Tidak Dapat Ekstensi';
            }    

        } elseif ( @$_POST['Tujuan'] == 'Video' ) {

            @$ambil_ekstensi_file        = $file_explode_ekstensi[1];
            if ( @$ambil_ekstensi_file == 'mp4' OR @$ambil_ekstensi_file == 'mp4' ) {
                @$hasil_ekstensi_file    = 'mp4';
            } else {
                @$hasil_ekstensi_file    = 'Tidak Dapat Ekstensi';
            }    

        } elseif ( @$_POST['Tujuan'] == 'PPT' ) {

            @$ambil_ekstensi_file        = $file_explode_ekstensi[1];
            if ( @$ambil_ekstensi_file == 'pptx' OR @$ambil_ekstensi_file == 'PPTX' ) {
                @$hasil_ekstensi_file    = 'PPTX';
            } elseif ( @$ambil_ekstensi_file == 'ppt' OR @$ambil_ekstensi_file == 'PPT' ) {
                @$hasil_ekstensi_file    = 'PPT';
            } elseif ( @$ambil_ekstensi_file == 'vnd.openxmlformats-officedocument.presentationml.presentation' OR @$ambil_ekstensi_file == 'vnd.ms-powerpoint' ) {
                @$hasil_ekstensi_file    = 'PPT';
            } elseif ( ($ambil_ekstensi_file == 'pptx') ) {
                $hasil_ekstensi_file    = 'PPT';
            } elseif ( ($ambil_ekstensi_file == 'pptm') ) {
                $hasil_ekstensi_file    = 'PPT';
            } else {
                @$hasil_ekstensi_file    = 'Tidak Dapat Ekstensi';
            }    

        }

        
        if ( @$hasil_ekstensi_file != 'Tidak Dapat Ekstensi' ) {

            if ( in_array($extension_file_media, $extensions_file_media) ) {

                if ( $ukuran_file_media <= 5000000 ) {

                    if ( move_uploaded_file($tmp_file_media, $path_file_file_media) ) {

                        @$query_insert = mysqli_query ( @$koneksi ,  
                            "
                                INSERT INTO Tbl_Materi VALUES
                                (
                                    '". @$barumax_id ."', '". @$_POST['Judul'] ."', 
                                    '". @$_POST['Deskripsi'] ."', '". @$_POST['Tujuan'] ."', 
                                    '". @$_POST['Tujuan'] . "_" . date('dmY') . "_" . date('Hi') . "." . @$ekstensi_file_media ."',
                                    '". @$_POST['Evaluasi'] ."'
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
                                            window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                                            window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                                        window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                                    window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                                window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                            window.location.replace('". base_url() ."admin/?url=Materi'); 
                        } ,2000);
                    </script>" ;

        }

    }


    if ( isset ( $_POST['BtnUbah'] ) ) {

        @$query_ubah = mysqli_query ( @$koneksi ,  
            "
                UPDATE Tbl_Indikator SET
                    Judul       = '". @$_POST['Indikator'] ."'
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
                            window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                            window.location.replace('". base_url() ."admin/?url=Materi'); 
                        } ,2000);
                    </script>" ;

        }

    }



    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Hapus' ) {

            if ( @$_GET['Id'] == TRUE AND @$_GET['B'] == TRUE ) {

                @unlink ( "../media/materi/" . @$_GET['B'] );

                @$query_delete = mysqli_query ( @$koneksi ,  
                    "
                        DELETE FROM Tbl_Materi 
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
                                    window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                                    window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                                window.location.replace('". base_url() ."admin/?url=Materi'); 
                            } ,2000);
                        </script>" ;

            }

        } elseif ( @$_GET['mod'] == 'Ubah' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$ubah = queryid (" SELECT Id, Judul FROM Tbl_Indikator WHERE Id = '". @$_GET['Id'] ."' ORDER BY Id DESC ");

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
                                window.location.replace('". base_url() ."admin/?url=Materi'); 
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
                    Materi Ajar
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Materi Ajar.
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
                            <a href="?url=Materi">
                                Materi Ajar
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
                    Halaman Data Materi Ajar !
                </h4>

                <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">

                    <?php if ( @$ubah['Id'] == TRUE ) { ?>

                    <input type="hidden" name="Id" class="form-control" placeholder="Masukkan Judul Indikator"
                        value="<?= @$ubah['Id']; ?>" autocomplete="off" required readonly>

                    <?php }?>

                    <div class="form-group">
                        <label class="mb-2">
                            Judul Materi
                        </label>
                        <input type="text" name="Judul" class="form-control" placeholder="Masukkan Judul Indikator"
                            value="<?= @$ubah['Judul']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Deskripsi Materi
                        </label>
                        <input type="text" name="Deskripsi" class="form-control" placeholder="Masukkan Judul Indikator"
                            value="<?= @$ubah['Deskripsi']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Tujuan Materi
                        </label>
                        <select name="Tujuan" class="form-control">
                            <option value="" selected disabled>--- Pilih Tujuan Tujuan ---</option>
                            <option value="Gambar">Gambar</option>
                            <option value="Pdf">PDF</option>
                            <option value="PPT">Power Point</option>
                            <option value="Video">Video</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Bahan Materi
                            <br>
                            <small class="text-danger">
                                * Bahan Materi Tidak Boleh Lebih Dari 5 MB
                                <br>
                                * Format JPG, JPEG, PNG, PDF, MP4
                            </small>
                        </label>
                        <br>
                        <input type="file" class="form-control" name="File-Upload" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Evaluasi Jawaban Materi
                        </label>
                        <input type="text" name="Evaluasi" class="form-control" placeholder="Masukkan Judul Indikator"
                            value="<?= @$ubah['Evaluasi']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group mt-2">
                        <?php if ( @$ubah['Id'] == TRUE ) { ?>
                        <button type="submit" name="Btnbah" class="btn btn-success btn-block">
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
                            <th class="text-center">Judul</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Tujuan</th>
                            <th class="text-center">Bahan</th>
                            <th class="text-center">Evaluasi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                                @$nomor = '1';
                                
                                @$session_request_data = query (" SELECT Id, Judul, Deskripsi, Tujuan, Bahan, Evaluasi FROM Tbl_Materi ORDER BY Id DESC ");

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
                                    <a href="?url=Materi&mod=Hapus&Id=<?= @$request_data['Id'] ?>&B=<?= @$request_data['Bahan'] ?>"
                                        class="btn icon btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <!-- <a href="?url=Materi&mod=Ubah&Id=<?= @$request_data['Id'] ?>"
                                        class="btn icon btn-sm btn-success">
                                        <i class="bi bi-pen"></i>
                                    </a> -->
                                </div>
                                <?php } ?>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                                <?= @$request_data['Judul']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['Deskripsi']; ?>
                            </td>
                            <td class="text-center">
                                <?php
                                    if ( @$request_data['Tujuan'] == 'Gambar' ) {
                                        echo 
                                            "
                                                <span class='badge bg-success'>
                                                    Gambar
                                                </span>
                                            ";
                                    } elseif ( @$request_data['Tujuan'] == 'Pdf' ) {
                                        echo 
                                            "
                                                <span class='badge bg-danger'>
                                                    PDF
                                                </span>
                                            ";
                                    } elseif ( @$request_data['Tujuan'] == 'Video' ) {
                                        echo 
                                            "
                                                <span class='badge bg-primary'>
                                                    Video
                                                </span>
                                            ";
                                    } elseif ( @$request_data['Tujuan'] == 'PPT' ) {
                                        echo 
                                            "
                                                <span class='badge bg-info'>
                                                    PPT
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
                                <button type="button" class="btn icon btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#Modal-Read-Bahan-Materi-<?= @$request_data['Id']; ?>">
                                    <i class="bi bi-eye"></i>
                                </button>
                                <div class="modal fade text-center"
                                    id="Modal-Read-Bahan-Materi-<?= @$request_data['Id']; ?>" tabindex="-1"
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
                                                    @$session_modal_read_materi = queryid (" SELECT Judul, Deskripsi, Tujuan, Bahan, Evaluasi FROM Tbl_Materi WHERE Id = '". @$request_data['Id'] ."' ORDER BY Id DESC ");
                                                ?>
                                                <h3 class="text-center">
                                                    <?= @$session_modal_read_materi['Judul']; ?>
                                                </h3>
                                                <h5 class="text-center">
                                                    <?= @$session_modal_read_materi['Deskripsi']; ?>
                                                </h5>
                                                <hr>
                                                <?php if ( @$session_modal_read_materi['Tujuan'] == 'Gambar' ) { ?>
                                                <img class="w-100 active"
                                                    src="<?= base_url(); ?>media/materi/<?= @$session_modal_read_materi['Bahan']; ?>"
                                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                                <?php } elseif ( @$session_modal_read_materi['Tujuan'] == 'Pdf' ) { ?>
                                                <iframe class="w-100 active"
                                                    src="<?= base_url(); ?>media/materi/<?= @$session_modal_read_materi['Bahan']; ?>"
                                                    frameborder="0" height="500px;" width="100%">
                                                </iframe>
                                                <?php } elseif ( @$session_modal_read_materi['Tujuan'] == 'Video' ) { ?>
                                                <video controls>
                                                    <source
                                                        src="<?= base_url(); ?>media/materi/<?= @$session_modal_read_materi['Bahan']; ?>"
                                                        type="video/webm">
                                                    Browsermu tidak mendukung tag ini, upgrade donk!
                                                </video>
                                                <?php } elseif ( @$session_modal_read_materi['Tujuan'] == 'PPT' ) { ?>
                                                <!-- <iframe class="w-100 active"
                                                    src="<?= base_url(); ?>media/materi/<?= @$session_modal_read_materi['Bahan']; ?>"
                                                    frameborder="0" height="500px;" width="100%" allowfullscreen="true"
                                                    mozallowfullscreen="true" webkitallowfullscreen="true"></iframe> -->
                                                <a href="<?= base_url(); ?>media/materi/<?= @$session_modal_read_materi['Bahan']; ?>"
                                                    target="_blank">Open ppt</a>
                                                <?php } else { ?>
                                                <h3>
                                                    Tidak Ada Kondisi
                                                </h3>
                                                <?php } ?>
                                                <hr>
                                                <h5 class="text-center">
                                                    <?= @$session_modal_read_materi['Evaluasi']; ?>
                                                </h5>
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
                            <td class="text-center">
                                <?= @$request_data['Evaluasi']; ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>