<div class="content-wrapper container">

    <?php 
    
        if ( @$_GET['url'] == 'Profile' ) {

            require_once __DIR__ . '/url/profile.php';

        } elseif ( @$_GET['url'] == 'Kompetensi' ) {

            require_once __DIR__ . '/url/kompetensi.php';

        } elseif ( @$_GET['url'] == 'KompetensiIsi' ) {

            require_once __DIR__ . '/url/kompetensiisi.php';

        } elseif ( @$_GET['url'] == 'Indikator' ) {

            require_once __DIR__ . '/url/indikator.php';

        } elseif ( @$_GET['url'] == 'IndikatorIsi' ) {

            require_once __DIR__ . '/url/indikatorisi.php';

        } elseif ( @$_GET['url'] == 'Tujuan' ) {

            require_once __DIR__ . '/url/tujuan.php';

        } elseif ( @$_GET['url'] == 'Materi' ) {

            require_once __DIR__ . '/url/materi.php';

        } elseif ( @$_GET['url'] == 'Game' ) {

            require_once __DIR__ . '/url/game.php';

        } elseif ( @$_GET['url'] == 'GameUlar' ) {

            require_once __DIR__ . '/url/gameular.php';

        } elseif ( @$_GET['url'] == 'GameKalkulator' ) {

            require_once __DIR__ . '/url/gamekalkulator.php';

        } elseif ( @$_GET['url'] == 'GameTik' ) {

            require_once __DIR__ . '/url/gametik.php';

        } elseif ( @$_GET['url'] == 'GameStop' ) {

            require_once __DIR__ . '/url/gamestop.php';

        } elseif ( @$_GET['url'] == 'Akun' ) {

            require_once __DIR__ . '/url/akun.php';

        } elseif ( @$_GET['url'] == 'IceBreaking' ) {

            require_once __DIR__ . '/url/icebreaking.php';

        } elseif ( @$_GET['url'] == 'Judul' ) {

            require_once __DIR__ . '/url/judul.php';

        } elseif ( @$_GET['url'] == 'Evaluasi' ) {

            require_once __DIR__ . '/url/evaluasi.php';
        
        } elseif ( @$_GET['url'] == 'User' ) {

            require_once __DIR__ . '/url/user.php';

        } else { 
    
    ?>

    <div class="page-heading">
        <h3>
            Selamat Datang !
        </h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="card shadow">
                    <div class="card-body py-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <?php if ( @$session_profile['Photo'] == TRUE ) { ?>
                                <img src="<?= base_url(); ?>media/photo/<?= @$session_profile['Photo']; ?>"
                                    alt="Avatar">
                                <?php } else { ?>
                                <img src="<?= base_url(); ?>assets/images/faces/5.jpg" alt="Avatar">
                                <?php } ?>
                            </div>
                            <div class="ms-3 name">
                                <h6 class="text-muted mb-0">
                                    Judul Aplikasi !
                                </h6>
                                <h5 class="font-bold">
                                    <?php 
                                        if ( @$session_judul_apps['Judul'] == TRUE ) {
                                            echo @$session_judul_apps['Judul'];
                                        } else {
                                            echo 'Belum Setting Judul Aplikasi !';
                                        }
                                    ?>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Judul">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Judul
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Lengkapi !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Profile">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldShow"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Profile
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Lengkapi !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Kompetensi">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Kompetensi
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Lengkapi !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Materi">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Materi
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Lengkapi !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Game">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Game
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Yuk Lihat !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Akun">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Akun
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Yuk Buat !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=IceBreaking">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Ice Breaking
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Yuk Cek !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <a href="?url=Evaluasi">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon red mb-2">
                                                <i class="iconly-boldBookmark"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">
                                                Evaluasi
                                            </h6>
                                            <h6 class="font-extrabold mb-0">
                                                Yuk Cek !
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php } ?>

</div>