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
                            <a href="<?= base_url(); ?>user/">
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
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card shadow">
            <a type="button" data-bs-toggle="modal" data-bs-target="#Modal-Read-Bahan-Kompetensi">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url(); ?>assets/images/logo/favicon.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">
                                Kompetensi Dasar !
                            </h5>
                            <h6 class="text-muted mb-0">
                                Yuk Cek Sekarang !
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <hr>
        <div class="card shadow">
            <a type="button" data-bs-toggle="modal" data-bs-target="#Modal-Read-Bahan-Indikator">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url(); ?>assets/images/logo/favicon.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">
                                Indikator !
                            </h5>
                            <h6 class="text-muted mb-0">
                                Yuk Cek Sekarang !
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <hr>
        <div class="card shadow">
            <a type="button" data-bs-toggle="modal" data-bs-target="#Modal-Read-Bahan-TujuanPembelajaran">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= base_url(); ?>assets/images/logo/favicon.png" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">
                                Tujuan Pembelajaran !
                            </h5>
                            <h6 class="text-muted mb-0">
                                Yuk Cek Sekarang !
                            </h6>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <hr>
    </section>

</div>




<div class="modal fade text-center" id="Modal-Read-Bahan-Kompetensi" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="myModalLabel1">
                    Informasi
                </h5>
                <button type="button" class="close rounded-pill text-white" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    @$session_request_data = query (" SELECT Id, Judul FROM Tbl_Kompetensi ORDER BY Id DESC ");

                        foreach ( $session_request_data AS $data => $request_data ) :
                ?>
                <div class="row">
                    <div class="col-12">
                        <p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample-<?= @$request_data['Id']; ?>" aria-expanded="false"
                                aria-controls="collapseExample-<?= @$request_data['Id']; ?>">
                                <?= @$request_data['Judul']; ?>
                            </button>
                        <div class="collapse" id="collapseExample-<?= @$request_data['Id']; ?>">
                            <?php
                                @$session_request_data_isi = query (" SELECT Id, Isi FROM Tbl_Kompetensi_Isi WHERE Id_Kompetensi = '". @$request_data['Id'] ."' ORDER BY Id DESC ");

                                    foreach ( $session_request_data_isi AS $data => $request_data_isi ) :

                                        echo 
                                            "
                                                <p class='my-2'>
                                                    ". @$request_data_isi['Isi'] ."
                                                </p>
                                            ";

                                    endforeach;
                            ?>
                        </div>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade text-center" id="Modal-Read-Bahan-Indikator" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="myModalLabel1">
                    Informasi
                </h5>
                <button type="button" class="close rounded-pill text-white" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    @$session_request_data = query (" SELECT Id, Judul FROM Tbl_Indikator ORDER BY Id DESC ");

                        foreach ( $session_request_data AS $data => $request_data ) :
                ?>
                <div class="row">
                    <div class="col-12">
                        <p>
                            <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseExample-<?= @$request_data['Id']; ?>" aria-expanded="false"
                                aria-controls="collapseExample-<?= @$request_data['Id']; ?>">
                                <?= @$request_data['Judul']; ?>
                            </button>
                        <div class="collapse" id="collapseExample-<?= @$request_data['Id']; ?>">
                            <?php
                                @$session_request_data_isi = query (" SELECT Id, Isi FROM Tbl_Indikator_Isi WHERE Id_Indikator = '". @$request_data['Id'] ."' ORDER BY Id DESC ");

                                    foreach ( $session_request_data_isi AS $data => $request_data_isi ) :

                                        echo 
                                            "
                                                <p class='my-2'>
                                                    ". @$request_data_isi['Isi'] ."
                                                </p>
                                            ";

                                    endforeach;
                            ?>
                        </div>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade text-center" id="Modal-Read-Bahan-TujuanPembelajaran" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="myModalLabel1">
                    Informasi
                </h5>
                <button type="button" class="close rounded-pill text-white" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php
                    @$session_request_data = query (" SELECT Id, Judul FROM Tbl_Tujuan ORDER BY Id DESC ");

                        foreach ( $session_request_data AS $data => $request_data ) :
                ?>
                <div class="row">
                    <div class="col-12">
                        <p>
                            <?= @$request_data['Judul']; ?>
                        </p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>
        </div>
    </div>
</div>