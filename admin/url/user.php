<?php 


    if ( isset ( $_GET['mod'] ) ) {

        if ( @$_GET['mod'] == 'Hapus' ) {

            if ( @$_GET['Id'] == TRUE ) {

                @$query_delete = mysqli_query ( @$koneksi ,  
                    "
                        DELETE FROM Tbl_User 
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
                                    window.location.replace('". base_url() ."admin/?url=User'); 
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
                                    window.location.replace('". base_url() ."admin/?url=User'); 
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
                                window.location.replace('". base_url() ."admin/?url=User'); 
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
                    User
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data User.
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
                            <a href="?url=User">
                                User
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
                    Halaman Data User !
                </h4>
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
                            <th class="text-center">Sekolah</th>
                            <th class="text-center">Skor</th>
                            <th class="text-center">Tanggal <br> Jawab Evaluasi</th>
                            <th class="text-center">Create</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                                @$nomor = '1';
                                
                                @$session_request_data = query (" SELECT Id, Nama, Sekolah, Skor, Tanggal, C FROM Tbl_User ORDER BY Id DESC ");

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
                                    <a href="?url=User&mod=Hapus&Id=<?= @$request_data['Id'] ?>"
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
                                <?= @$request_data['Sekolah']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['Skor']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['Tanggal']; ?>
                            </td>
                            <td class="text-center">
                                <?= @$request_data['C']; ?>
                            </td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>