<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url(); ?>admin/">
                    <img src="<?= base_url(); ?>media/logo1.png" alt="Logo">
                </a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <?php if ( @$session_profile['Photo'] == TRUE ) { ?>
                            <img src="<?= base_url(); ?>media/photo/<?= @$session_profile['Photo']; ?>" alt="Avatar">
                            <?php } else { ?>
                            <img src="<?= base_url(); ?>assets/images/faces/5.jpg" alt="Avatar">
                            <?php } ?>
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">
                                <?= @$session_user['Nama']; ?>
                            </h6>
                            <p class="user-dropdown-status text-sm text-muted">
                                <?= @$session_user['Level']; ?>
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                Hallo !
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url(); ?>logout.php">
                                Keluar
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>
                            Kompetensi
                        </span>
                    </a>
                    <div class="submenu ">
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item  ">
                                    <a href="?url=Kompetensi" class="submenu-link">
                                        Kompetensi
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="?url=Indikator" class="submenu-link">
                                        Indikator
                                    </a>
                                </li>
                                <li class="submenu-item  ">
                                    <a href="?url=Tujuan" class="submenu-link">
                                        Tujuan Pembelajaran
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="menu-item">
                    <a href="?url=IceBreaking" class="menu-link">
                        <i class="bi bi-stack"></i>
                        <span>
                            Ice Breaking
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?url=Materi" class="menu-link">
                        <i class="bi bi-plus-square-fill"></i>
                        <span>
                            Materi Ajar
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?url=Evaluasi" class="menu-link">
                        <i class="bi bi-table"></i>
                        <span>
                            Evaluasi
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?url=Game" class="menu-link">
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>
                            Game Edukasi
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?url=Profile" class="menu-link">
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>
                            Profile
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?url=Judul" class="menu-link">
                        <i class="bi bi-chat-dots-fill"></i>
                        <span>
                            Judul Apps
                        </span>
                    </a>
                </li>

                <?php if ( @$session_user['Level'] == 'Admin' ) { ?>
                <li class="menu-item">
                    <a href="?url=Akun" class="menu-link">
                        <i class="bi bi-egg-fill"></i>
                        <span>
                            Akun
                        </span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="?url=User" class="menu-link">
                        <i class="bi bi-egg-fill"></i>
                        <span>
                            User
                        </span>
                    </a>
                </li>
                <?php } ?>

            </ul>
        </div>
    </nav>

</header>