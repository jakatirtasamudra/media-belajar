<form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="mb-2">
            Tingkatan SD
        </label>
        <input type="text" name="SD" class="form-control" placeholder="Masukkan Nama SD"
            value="<?= @$session_profile['SD']; ?>" autocomplete="off" required>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Masuk SD
                </label>
                <input type="number" name="SD_1" class="form-control" placeholder="Masukkan Tahun Masuk SD"
                    value="<?= @$session_profile['SD_T']; ?>" autocomplete="off" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Selesai SD
                </label>
                <input type="number" name="SD_2" class="form-control" placeholder="Masukkan Tahun Selesai SD"
                    value="<?= @$session_profile['SD_A']; ?>" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Tingkatan SMP
        </label>
        <input type="text" name="SMP" class="form-control" placeholder="Masukkan Nama SMP"
            value="<?= @$session_profile['SMP']; ?>" autocomplete="off" required>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Masuk SMP
                </label>
                <input type="number" name="SMP_1" class="form-control" placeholder="Masukkan Tahun Masuk SMP"
                    value="<?= @$session_profile['SMP_T']; ?>" autocomplete="off" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Selesai SMP
                </label>
                <input type="number" name="SMP_2" class="form-control" placeholder="Masukkan Tahun Selesai SMP"
                    value="<?= @$session_profile['SMP_A']; ?>" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Tingkatan SMA
        </label>
        <input type="text" name="SMA" class="form-control" placeholder="Masukkan Nama SMA"
            value="<?= @$session_profile['SMA']; ?>" autocomplete="off" required>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Masuk SMA
                </label>
                <input type="number" name="SMA_1" class="form-control" placeholder="Masukkan Tahun Masuk SMA"
                    value="<?= @$session_profile['SMA_T']; ?>" autocomplete="off" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Selesai SMA
                </label>
                <input type="number" name="SMA_2" class="form-control" placeholder="Masukkan Tahun Selesai SMA"
                    value="<?= @$session_profile['SMA_A']; ?>" autocomplete="off" required>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Tingkatan S1
        </label>
        <input type="text" name="S1" class="form-control" placeholder="Masukkan Nama S1"
            value="<?= @$session_profile['S1']; ?>" autocomplete="off" required>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Masuk S1
                </label>
                <input type="number" name="S1_1" class="form-control" placeholder="Masukkan Tahun Masuk S1"
                    value="<?= @$session_profile['S1_T']; ?>" autocomplete="off" required>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <label class="mb-2">
                    Tahun Selesai S1
                </label>
                <input type="number" name="S1_2" class="form-control" placeholder="Masukkan Tahun Selesai S1"
                    value="<?= @$session_profile['S1_A']; ?>" autocomplete="off" required>
            </div>
        </div>
    </div>

    <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
    <div class="form-group mt-2">
        <button type="submit" name="BtnAkademik" class="btn btn-primary btn-block">
            <?php 
                if ( @$session_profile['SD'] == TRUE ) {
                    echo 'Ubah Data';
                } else {
                    echo 'Simpan Data';
                }
            ?>
        </button>
    </div>
    <?php } ?>

</form>