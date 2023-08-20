<?php 


    @$session_data_indikator = queryid (" SELECT Id, Judul FROM Tbl_Indikator WHERE Id = '". @$_GET['Id'] ."' ORDER BY Id DESC ");


    if ( isset ( $_POST['BtnTambah'] ) ) {

        @$maxid          = queryid (" SELECT MAX( Id ) AS MaxKode_Id FROM Tbl_Indikator_Isi ");
        @$barumax_id     = @$maxid['MaxKode_Id'];
        @$urutmax        = @$barumax_id; @$urutmax++; @$barumax_id = @$urutmax;

        @$query_insert = mysqli_query ( @$koneksi ,  
            "
                INSERT INTO Tbl_Indikator_Isi VALUES
                (
                    '". @$barumax_id ."', '". @$_POST['Isi'] ."', '". @$_POST['IdK'] ."'
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
                            window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_POST['IdK'] ."'); 
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
                            window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_POST['IdK'] ."'); 
                        } ,2000);
                    </script>" ;

        }

    }


    if ( isset ( $_POST['BtnUbah'] ) ) {

        @$query_ubah = mysqli_query ( @$koneksi ,  
            "
                UPDATE Tbl_Indikator_Isi SET
                    Isi             = '". @$_POST['Isi'] ."'
                WHERE Id            = '". @$_POST['Id'] ."'
                AND Id_Indikator   = '". @$_POST['IdK'] ."'
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
                            window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_POST['IdK'] ."'); 
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
                            window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_POST['IdK'] ."'); 
                        } ,2000);
                    </script>" ;

        }

    }



    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Hapus' ) {

            if ( @$_GET['Id'] == TRUE AND @$_GET['IdI'] == TRUE ) {

                @$query_delete = mysqli_query ( @$koneksi ,  
                    "
                        DELETE FROM Tbl_Indikator_Isi 
                        WHERE Id            = '". @$_GET['IdI'] ."'
                        AND Id_Indikator   = '". @$_GET['Id'] ."'
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
                                    window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_GET['Id'] ."'); 
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
                                    window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_GET['Id'] ."'); 
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
                                window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_GET['Id'] ."'); 
                            } ,2000);
                        </script>" ;

            }

        } elseif ( @$_GET['mod'] == 'Ubah' ) {

            if ( @$_GET['Id'] == TRUE AND @$_GET['IdI'] == TRUE ) {

                @$ubah = queryid (" SELECT Id, Isi FROM Tbl_Indikator_Isi WHERE Id = '". @$_GET['IdI'] ."' AND Id_Indikator = '". @$_GET['Id'] ."' ORDER BY Id DESC ");

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
                                window.location.replace('". base_url() ."admin/?url=IndikatorIsi&Id=". @$_GET['Id'] ."'); 
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
                    Indikator
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Indikator.
                    <br>
                    <strong>
                        Judul, <?= @$session_data_indikator['Judul']; ?>
                    </strong>
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
                            <a href="?url=Indikator">
                                Indikator
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?url=IndikatorIsi&Id=<?= @$session_data_indikator['Id']; ?>">
                                Indikator Isian
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
                    Halaman Data Indikator Dasar !
                </h4>

                <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="IdK" class="form-control" placeholder="Masukkan Judul Indikator"
                        value="<?= @$session_data_indikator['Id']; ?>" autocomplete="off" required readonly>

                    <?php if ( @$ubah['Id'] == TRUE ) { ?>

                    <input type="hidden" name="Id" class="form-control" placeholder="Masukkan Judul Indikator"
                        value="<?= @$ubah['Id']; ?>" autocomplete="off" required readonly>

                    <?php }?>

                    <div class="form-group">
                        <label class="mb-2">
                            Isi Indikator
                        </label>
                        <input type="text" name="Isi" class="form-control" placeholder="Contoh : 1.2 Tingkat Dasar"
                            value="<?= @$ubah['Isi']; ?>" autocomplete="off" required>
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

            </div>
            <hr>
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
                                <th class="text-center">Judul Indikator</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                @$nomor = '1';

                                @$session_request_data = query (" SELECT Id, Isi FROM Tbl_Indikator_Isi WHERE Id_Indikator = '". @$session_data_indikator['Id'] ."' ORDER BY Id DESC ");

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
                                        <a href="?url=IndikatorIsi&Id=<?= @$session_data_indikator['Id']; ?>&mod=Hapus&IdI=<?= @$request_data['Id'] ?>"
                                            class="btn icon btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="?url=IndikatorIsi&Id=<?= @$session_data_indikator['Id']; ?>&mod=Ubah&IdI=<?= @$request_data['Id'] ?>"
                                            class="btn icon btn-sm btn-success">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </td>
                                <?php } ?>
                                <td class="text-center">
                                    <?= @$request_data['Isi']; ?>
                                </td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

</div>