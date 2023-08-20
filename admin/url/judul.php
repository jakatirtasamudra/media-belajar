<?php 


    if ( isset ( $_POST['BtnTambah'] ) ) {

        @$query_insert = mysqli_query ( @$koneksi ,  
            "
                INSERT INTO Tbl_Judul VALUES
                (
                    '1', '". @$_POST['Judul'] ."'
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
                            window.location.replace('". base_url() ."admin/?url=Judul'); 
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
                            window.location.replace('". base_url() ."admin/?url=Judul'); 
                        } ,2000);
                    </script>" ;

        }

    }


    if ( isset ( $_POST['BtnUbah'] ) ) {

        @$query_update = mysqli_query ( @$koneksi ,  
            "
                UPDATE Tbl_Judul SET
                    Judul   = '". @$_POST['Judul'] ."'
            "
        );

        if ( @$query_update == TRUE ) {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Berhasil', 
                            text: 'Ubah Data', 
                            icon: 'success',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."admin/?url=Judul'); 
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
                            window.location.replace('". base_url() ."admin/?url=Judul'); 
                        } ,2000);
                    </script>" ;

        }

    }



    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Ubah' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$ubah = queryid (" SELECT Id, Judul FROM Tbl_Judul WHERE Id = '". @$_GET['Id'] ."' ORDER BY Id DESC ");

                if ( @$ubah['Id'] == @$_GET['Id'] ) {


                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Tidak Berhasil', 
                                    text: 'Data Not Found', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."admin/?url=Judul'); 
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
                                window.location.replace('". base_url() ."admin/?url=Judul'); 
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
                    Judul
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Judul Apps.
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
                            <a href="?url=Judul">
                                Judul Apps
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
                    Halaman Data Judul !
                </h4>

                <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                <?php if ( @$session_judul_apps['Id'] == FALSE OR @$ubah['Id'] == TRUE ) { ?>
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="mb-2">
                            Judul Aplikasi
                        </label>
                        <input type="text" name="Judul" class="form-control" placeholder="Masukkan Judul Aplikasi"
                            value="<?= @$ubah['Judul']; ?>" autocomplete="off" required>
                    </div>
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
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                                @$nomor = '1';
                                
                                @$session_request_data = query (" SELECT Id, Judul FROM Tbl_Judul ORDER BY Id DESC ");

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
                                    <a href="?url=Judul&mod=Ubah&Id=<?= @$request_data['Id'] ?>"
                                        class="btn icon btn-sm btn-success">
                                        <i class="bi bi-pen"></i>
                                    </a>
                                </div>
                                <?php } ?>
                            </td>
                            <?php } ?>
                            <td class="text-center">
                                <?= @$request_data['Judul']; ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>