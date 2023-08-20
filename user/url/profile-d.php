<form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="mb-2">
            Nama
        </label>
        <input type="text" name="Nama" class="form-control" placeholder="Masukkan Nama"
            value="<?= @$session_profile['Nama']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            NIM
        </label>
        <input type="number" name="Nim" class="form-control" placeholder="Masukkan Nim"
            value="<?= @$session_profile['Nim']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Agama
        </label>
        <input type="text" name="Agama" class="form-control" placeholder="Masukkan Nim"
            value="<?= @$session_profile['Agama']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Tempat Lahir
        </label>
        <input type="text" name="TempatLahir" class="form-control" placeholder="Masukkan Tempat Lahir"
            value="<?= @$session_profile['Tempat']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Tanggal Lahir
        </label>
        <input type="date" name="TanggalLahir" class="form-control" placeholder="Masukkan Tanggal Lahir"
            value="<?= @$session_profile['Lahir']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Jenis Kelamin
        </label>
        <input type="text" name="Kelamin" class="form-control" placeholder="Masukkan Nim"
            value="<?= @$session_profile['Kelamin']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Cita - Cita
        </label>
        <input type="text" name="Cita" class="form-control" placeholder="Masukkan Cita-Cita"
            value="<?= @$session_profile['Cita']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Hobi
        </label>
        <input type="text" name="Hobi" class="form-control" placeholder="Masukkan Hobi"
            value="<?= @$session_profile['Hobi']; ?>" autocomplete="off" readonly required>
    </div>
    <div class="form-group">
        <label class="mb-2">
            Motto
        </label>
        <input type="text" name="Motto" class="form-control" placeholder="Masukkan Motto"
            value="<?= @$session_profile['Motto']; ?>" autocomplete="off" readonly required>
    </div>

    <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
    <div class="form-group mt-2">
        <button type="submit" name="BtnDataDiri" class="btn btn-primary btn-block">
            <?php 
                if ( @$session_profile['Nama'] == TRUE ) {
                    echo 'Ubah Data';
                } else {
                    echo 'Simpan Data';
                }
            ?>
        </button>
    </div>
    <?php } ?>

</form>