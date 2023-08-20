<div class="page-heading">

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>
                    Game Edukasi
                </h3>
                <p class="text-subtitle text-muted">
                    Module Data Game Edukasi.
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url(); ?>admin/">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?url=Game">
                                Game Edukasi
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="?url=GameTik">
                                Tic Tac Toe
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="container">
            <h1>Tic Tac Toe</h1>
            <div id="board">
                <div class="square" id="s1"></div>
                <div class="square" id="s2"></div>
                <div class="square" id="s3"></div>
                <div class="square" id="s4"></div>
                <div class="square" id="s5"></div>
                <div class="square" id="s6"></div>
                <div class="square" id="s7"></div>
                <div class="square" id="s8"></div>
                <div class="square" id="s9"></div>
            </div>
            <div id="message"></div>
            <button id="reset" onclick="reset()">Reset</button>
        </div>
    </section>

</div>