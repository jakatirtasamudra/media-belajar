<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url(); ?>user/">
                    <img src="<?= base_url(); ?>media/logo1.png" alt="Logo">
                </a>
            </div>
        </div>
    </div>
</header>
<div class="content-wrapper container">
    <div class="page-heading">
        <h3>
            Pengerjaan Soal, <?= @$session_user['Nama']; ?> !
        </h3>
        <p>
            Selamat Mengerjakan !
        </p>
    </div>
    <div class="page-heading">
        <form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">
            <section class="section">

                <?php

                    @$nomor = '1';

                    @$session_request_data = query (" SELECT Id, Soal, A, B, C, D, Kunci, Jenis, Gambar FROM Tbl_Evaluasi ORDER BY Id DESC ");

                        foreach ( $session_request_data AS $data => $request_data ) :
                
                ?>


                <input class="form-control" type="hidden" name="Id[]" value="<?= @$request_data['Id']; ?>" required>


                <div class="card shadow">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="ms-3 name">
                                <h5 class="font-bold">
                                    <?= @$nomor++; ?>. <?= @$request_data['Soal']; ?>
                                    <?php if ( @$request_data['Jenis'] == 'Y' ) { ?>
                                    <hr>
                                    <center>
                                        <img class="w-100 active text-center"
                                            src="<?= base_url(); ?>media/soal/<?= @$request_data['Gambar']; ?>"
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                    </center>
                                    <?php } ?>
                                </h5>
                                <br>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" value="A"
                                        name="CheckJawab[<?= @$request_data['Id']; ?>]" id="flexRadioDefault">
                                    <label class="form-check-label">
                                        A. <?= @$request_data['A']; ?>
                                    </label>
                                </div>
                                <div class="form-check  mb-2">
                                    <input class="form-check-input" type="radio" value="B"
                                        name="CheckJawab[<?= @$request_data['Id']; ?>]" id="flexRadioDefault">
                                    <label class="form-check-label">
                                        B. <?= @$request_data['B']; ?>
                                    </label>
                                </div>
                                <div class="form-check  mb-2">
                                    <input class="form-check-input" type="radio" value="C"
                                        name="CheckJawab[<?= @$request_data['Id']; ?>]" id="flexRadioDefault">
                                    <label class="form-check-label">
                                        C. <?= @$request_data['C']; ?>
                                    </label>
                                </div>
                                <div class="form-check  mb-2">
                                    <input class="form-check-input" type="radio" value="D"
                                        name="CheckJawab[<?= @$request_data['Id']; ?>]" id="flexRadioDefault">
                                    <label class="form-check-label">
                                        D. <?= @$request_data['D']; ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <?php endforeach; ?>

                <button type="button" class="btn btn-block btn-lg btn-primary" data-bs-toggle="modal"
                    data-bs-target="#Modal-Read-Hasil">
                    Lihat Hasil
                </button>
                <div class="modal fade text-center" id="Modal-Read-Hasil" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="myModalLabel1">
                                    Informasi
                                </h5>
                                <button type="button" class="close rounded-pill text-white" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <i data-feather="x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah Kamu Sudah Yakin Dengan Hasil Jawaban Kamu ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    Tutup
                                </button>
                                <button type="submit" class="btn btn-primary" name="BtnHasilEvaluasi">
                                    Lihat Hasil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </form>
    </div>
</div>





<?php 


    if ( isset ( $_POST['BtnHasilEvaluasi'] ) ) {

        if ( @$_POST['Id'] == TRUE ) {

            @$total_soal = queryid (" SELECT COUNT( Id ) AS Total FROM Tbl_Evaluasi ");

            @$txt_id_gudangsoal                 = @$_POST['Id'];
            @$option_pilihan_jawabanbenar       = @$_POST['CheckJawab'];

            if ( @$total_soal['Total'] == COUNT( @$txt_id_gudangsoal ) ) {

                @$jumlah     = COUNT( @$txt_id_gudangsoal );

                @$benar      = 0;
                @$salah      = 0;
                @$score      = 0;

                for ( $x = 0; $x < $jumlah; $x++ ) :

                    @$nomor_id_soal      = @$txt_id_gudangsoal[$x];
                    @$jawaban_mahasiswa  = @$option_pilihan_jawabanbenar[$nomor_id_soal];

                    @$row_jawaban_benar = queryrow (" SELECT Id FROM Tbl_Evaluasi WHERE Id = '". @$nomor_id_soal ."' AND Kunci = '". @$jawaban_mahasiswa ."' ");

                    if ( @$row_jawaban_benar > 0 ) {

                        @$benar++;

                    } else {

                        @$salah++;

                    }

                endfor;

                @$score    = 100 / @$total_soal['Total'] * @$benar;
                @$hasil    = number_format( @$score , 2 );

                @$query_update = mysqli_query ( @$koneksi ,  
                    "
                        UPDATE Tbl_User SET
                            Skor    = '". @$hasil ."',
                            Tanggal = '". date('Y-m-d') ."'
                        WHERE Id    = '". @$session_user['Id'] ."'
                    "
                );

                if ( @$query_update == TRUE ) {

                    echo "<script language='javascript'>
                                window.location.replace('". base_url() ."user/?url=Hasil'); 
                            </script>" ;

                } else {

                    echo "<script language='javascript'>
                            setTimeout(function () { 
                                Swal.fire({ 
                                    title: 'Error', 
                                    text: 'Error Saat Update Data', 
                                    icon: 'error',
                                        showConfirmButton: false 
                                    }); 
                                }, 5);
                                window.setTimeout(function() { 
                                    window.location.replace('". base_url() ."user/?url=Soal'); 
                                } ,2000);
                            </script>" ;

                }

            } else {

                echo "<script language='javascript'>
                        setTimeout(function () { 
                            Swal.fire({ 
                                title: 'Error', 
                                text: 'Total Soal Jawaban Tidak Sama Dengan Soal Yang Ada', 
                                icon: 'error',
                                    showConfirmButton: false 
                                }); 
                            }, 5);
                            window.setTimeout(function() { 
                                window.location.replace('". base_url() ."user/?url=Soal'); 
                            } ,2000);
                        </script>" ;

            }

        } else {

            echo "<script language='javascript'>
                    setTimeout(function () { 
                        Swal.fire({ 
                            title: 'Error', 
                            text: 'Request Jawaban Tidak Ada', 
                            icon: 'error',
                                showConfirmButton: false 
                            }); 
                        }, 5);
                        window.setTimeout(function() { 
                            window.location.replace('". base_url() ."user/?url=Soal'); 
                        } ,2000);
                    </script>" ;

        }

    }


?>