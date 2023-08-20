<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url(); ?>user/">
                    <img src="<?= base_url(); ?>media/logo1.png" alt="Logo">
                </a>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <img src="<?= base_url(); ?>assets/images/faces/5.jpg" alt="Avatar">
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
                <li class="menu-item">
                    <a href="<?= base_url(); ?>user/" class="menu-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>
                            Ayok Selesaikan Belajar Kamu Ya !
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</header>