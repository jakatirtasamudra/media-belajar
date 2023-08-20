<?php 


    if ( isset ( $_POST['BtnKompetensi'] ) ) {

        @$maxid          = queryid (" SELECT MAX( Id ) AS MaxKode_Id FROM Tbl_Kompetensi ");
        @$barumax_id     = @$maxid['MaxKode_Id'];
        @$urutmax        = @$barumax_id; @$urutmax++; @$barumax_id = @$urutmax;

        @$query_insert = mysqli_query ( @$koneksi ,  
            "
                INSERT INTO Tbl_Kompetensi VALUES
                (
                    '". @$barumax_id ."', '". @$_POST['Kompetensi'] ."'
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
                            window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
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
                            window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
                        } ,2000);
                    </script>" ;

        }

    }


    if ( isset ( $_POST['BtnKompetensiUbah'] ) ) {

        @$query_ubah = mysqli_query ( @$koneksi ,  
            "
                UPDATE Tbl_Kompetensi SET
                    Judul       = '". @$_POST['Kompetensi'] ."'
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
                            window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
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
                            window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
                        } ,2000);
                    </script>" ;

        }

    }



    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Hapus' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$query_delete = mysqli_query ( @$koneksi ,  
                    "
                        DELETE FROM Tbl_Kompetensi 
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
                                    window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
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
                                    window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
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
                                window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
                            } ,2000);
                        </script>" ;

            }

        } elseif ( @$_GET['mod'] == 'Ubah' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$ubah = queryid (" SELECT Id, Judul FROM Tbl_Kompetensi WHERE Id = '". @$_GET['Id'] ."' ORDER BY Id DESC ");

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
                                window.location.replace('". base_url() ."admin/?url=Kompetensi'); 
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
                    Kompetensi
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Kompetensi.
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
                            <a href="?url=Kompetensi">
                                Kompetensi
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
                    Halaman Data Kompetensi Dasar !
                </h4>

                <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">

                    <?php if ( @$ubah['Id'] == TRUE ) { ?>

                    <input type="hidden" name="Id" class="form-control" placeholder="Masukkan Judul Kompetensi"
                        value="<?= @$ubah['Id']; ?>" autocomplete="off" required readonly>

                    <?php }?>

                    <div class="form-group">
                        <label class="mb-2">
                            Judul Kompetensi
                        </label>
                        <input type="text" name="Kompetensi" class="form-control"
                            placeholder="Masukkan Judul Kompetensi" value="<?= @$ubah['Judul']; ?>" autocomplete="off"
                            required>
                    </div>
                    <div class="form-group mt-2">
                        <?php if ( @$ubah['Id'] == TRUE ) { ?>
                        <button type="submit" name="BtnKompetensiUbah" class="btn btn-success btn-block">
                            Ubah Data
                        </button>
                        <?php } else { ?>
                        <button type="submit" name="BtnKompetensi" class="btn btn-primary btn-block">
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
                                <th class="text-center">Aksi</th>
                                <th class="text-center">Judul Kompetensi</th>
                                <th class="text-center">Total Isian</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                                @$nomor = '1';

                                @$session_request_data = query (" SELECT Id, Judul FROM Tbl_Kompetensi ORDER BY Id DESC ");

                                    foreach ( $session_request_data AS $data => $request_data ) :

                                        @$row_data = queryrow (" SELECT Id FROM Tbl_Kompetensi_Isi WHERE Id_Kompetensi = '". @$request_data['Id'] ."' ");

                                        @$total = queryid (" SELECT COUNT( Id ) AS Total FROM Tbl_Kompetensi_Isi WHERE Id_Kompetensi = '". @$request_data['Id'] ."' ");
                            
                            ?>

                            <tr>
                                <td class="text-center">
                                    <?= @$nomor++; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ( @$ubah['Id'] == TRUE ) { ?>
                                    <div>
                                        <span class="badge bg-danger">
                                            Kunci
                                        </span>
                                    </div>
                                    <?php } else { ?>
                                    <div class="buttons">
                                        <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                                        <?php if ( @$row_data == FALSE ) { ?>
                                        <a href="?url=Kompetensi&mod=Hapus&Id=<?= @$request_data['Id'] ?>"
                                            class="btn icon btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <a href="?url=Kompetensi&mod=Ubah&Id=<?= @$request_data['Id'] ?>"
                                            class="btn icon btn-sm btn-success">
                                            <i class="bi bi-pen"></i>
                                        </a>
                                        <?php } ?>
                                        <?php } ?>
                                        <a href="?url=KompetensiIsi&Id=<?= @$request_data['Id'] ?>"
                                            class="btn icon btn-sm btn-primary">
                                            <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <?= @$request_data['Judul']; ?>
                                </td>
                                <td class="text-center">
                                    <?= @$total['Total']; ?>
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