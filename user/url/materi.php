<div class="page-heading">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Materi
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Materi.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>user/">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?url=Materi">
                                Materi
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
                    Halaman Data Materi Dasar !
                </h4>
            </div>
        </div>
    </section>
    <section class="section">

        <?php

            @$session_request_data = query (" SELECT Id, Judul, Deskripsi, Tujuan, Bahan, Evaluasi FROM Tbl_Materi ORDER BY Id DESC ");

                foreach ( $session_request_data AS $data => $request_data ) :
        
        ?>

        <div class="card shadow">
            <a type="button" data-bs-toggle="modal"
                data-bs-target="#Modal-Read-Bahan-Materi-<?= @$request_data['Id']; ?>">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url(); ?>assets/images/logo/favicon.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">
                                Materi, <?= @$request_data['Judul']; ?>
                            </h5>
                            <h6 class="text-muted mb-0">
                                <?= @$request_data['Deskripsi']; ?>
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="modal fade text-center" id="Modal-Read-Bahan-Materi-<?= @$request_data['Id']; ?>"
                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
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
                                <?php
                                    @$session_modal_read_materi = queryid (" SELECT Judul, Deskripsi, Tujuan, Bahan, Evaluasi FROM Tbl_Materi WHERE Id = '". @$request_data['Id'] ."' ORDER BY Id DESC ");
                                ?>
                                <div class="row">
                                    <div class="col-12">
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
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <hr>

        <?php endforeach; ?>

    </section>

</div>