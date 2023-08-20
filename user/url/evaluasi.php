<div class="error-page container my-4">
    <div class="col-md-12 col-12">
        <div class="text-center">
            <img class="img-error" src="<?= base_url(); ?>assets/images/samples/error-403.svg" alt="Not Found"
                style="width: 50%;">
            <br>
            <h1 class="error-title mt-5">
                Hallo, <?= @$session_user['Nama']; ?>
            </h1>
            <h4 class="fs-5 text-gray-600">
                Petunjuk Dalam Pengerjaan Evaluasi !
                <hr>
                <strong>
                    Kerjakan Soal Dengan Benar.
                    <br>
                    Pilih Opsi Jawaban Salah Satu.
                    <br>
                    Pada Akhir Evaluasi Akan Tampil Hasil Nilai Akhir Anda.
                </strong>
            </h4>
            <a href="?url=Soal" class="btn btn-lg btn-primary mt-3">
                Mulai Menjawab
            </a>
        </div>
    </div>
</div>