<div class="error-page container my-4">
    <div class="col-md-12 col-12">
        <div class="text-center">
            <img class="img-error" src="<?= base_url(); ?>assets/images/samples/error-500.svg" alt="Not Found"
                style="width: 20%;">
            <br>
            <h1 class="error-title mt-5">
                Hallo, <?= @$session_user['Nama']; ?>
            </h1>
            <h3>
                Hasil Evaluasi Kamu
                <hr>
                <strong>
                    Nilai Anda Mendapatkan Skor
                    <br>
                    <strong class="text-danger">
                        <?= @$session_user['Skor']; ?> Point
                    </strong>
                    <br>
                    Dengan Kriteria Lulus
                    <br>
                    <strong class="text-danger">
                        50 Point
                    </strong>
                    <br>
                    <strong class="text-primary">
                        Kamu Dinyatakan
                        <?php 
                            if ( @$session_user['Skor'] >= '50' ) {
                                echo 'Lulus';
                            } else {
                                echo 'Tidak Lulus';
                            }
                        ?>
                    </strong>
                </strong>
            </h3>
            <a href="<?= base_url(); ?>user/" class="btn btn-lg btn-outline-primary mt-3">
                Kembali Ke Halaman Utama
            </a>
        </div>
    </div>
</div>