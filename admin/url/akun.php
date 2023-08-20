<?php 


    if ( isset ( $_POST['BtnTambah'] ) ) {

        @$maxid          = queryid (" SELECT MAX( Id ) AS MaxKode_Id FROM Tbl_Akun ");
        @$barumax_id     = @$maxid['MaxKode_Id'];
        @$urutmax        = @$barumax_id; @$urutmax++; @$barumax_id = @$urutmax;

        @$session_row = queryrow (" SELECT Id FROM Tbl_Akun WHERE User = '". @$_POST['User'] ."' ");

        if ( @$session_row == TRUE ) {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Tidak Berhasil', 
                            text: 'Mohon Maaf Username Sudah Terdaftar', 
                            icon: 'error',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."admin/?url=Akun'); 
                        } ,2000);
                    </script>" ;

        } else {

            @$query_insert = mysqli_query ( @$koneksi ,  
                "
                    INSERT INTO Tbl_Akun VALUES
                    (
                        '". @$barumax_id ."', '". @$_POST['Nama'] ."', 
                        '". @$_POST['User'] ."', '". @$_POST['Pass'] ."', 
                        'Dosen'
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
                                window.location.replace('". base_url() ."admin/?url=Akun'); 
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
                                window.location.replace('". base_url() ."admin/?url=Akun'); 
                            } ,2000);
                        </script>" ;

            }

        }

    }



    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Hapus' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$query_delete = mysqli_query ( @$koneksi ,  
                    "
                        DELETE FROM Tbl_Akun 
                        WHERE Id    = '". @$_GET['Id'] ."'
                        AND Level   = 'Dosen'
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
                                    window.location.replace('". base_url() ."admin/?url=Akun'); 
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
                                    window.location.replace('". base_url() ."admin/?url=Akun'); 
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
                                window.location.replace('". base_url() ."admin/?url=Akun'); 
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
                    Akun
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Akun Dosen.
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
                            <a href="?url=Akun">
                                Akun Dosen
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
                    Halaman Data Akun !
                </h4>
                <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="mb-2">
                            Nama Lengkap
                        </label>
                        <input type="text" name="Nama" class="form-control" placeholder="Masukkan Nama Lengkap"
                            value="<?= @$ubah['Nama']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Username Login
                        </label>
                        <input type="text" name="User" class="form-control" placeholder="Masukkan Username Login"
                            value="<?= @$ubah['User']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label class="mb-2">
                            Password Login
                        </label>
                        <input type="text" name="Pass" class="form-control" placeholder="Masukkan Password Login"
                            value="<?= @$ubah['Pass']; ?>" autocomplete="off" required>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" name="BtnTambah" class="btn btn-primary btn-block">
                            Simpan Data
                        </button>
                    </div>
                </form>
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
                            <th class="text-center">Aksi</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Password</th>
                            <th class="text-center">Level</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                                @$nomor = '1';
                                
                                @$session_request_data = query (" SELECT Id, Nama, User, Pass, Level FROM Tbl_Akun WHERE NOT Level = 'Admin' ORDER BY Id DESC ");

                                    foreach ( $session_request_data AS $data => $request_data ) :
                            
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
                                    <a href="?url=Akun&mod=Hapus&Id=<?= @$request_data['Id'] ?>"
                                        class="btn icon btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['Nama']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['User']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['Pass']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['Level']; ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>