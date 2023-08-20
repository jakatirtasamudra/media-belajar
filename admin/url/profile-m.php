<form class="user" name="frmInput" action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label class="mb-2">
            Motivasi
        </label>
        <input type="text" name="Motivasi" class="form-control" placeholder="Masukkan Motivasi"
            value="<?= @$session_profile['Motivasi']; ?>" autocomplete="off" required>
    </div>

    <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
    <div class="form-group mt-2">
        <button type="submit" name="BtnMotivasi" class="btn btn-primary btn-block">
            <?php 
                if ( @$session_profile['Motivasi'] == TRUE ) {
                    echo 'Ubah Data';
                } else {
                    echo 'Simpan Data';
                }
            ?>
        </button>
    </div>
    <?php } ?>

</form>