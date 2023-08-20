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
                            <a href="?url=GameStop">
                                Stop
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="container">
            <h1>
                Stopwatch
            </h1>
            <p id="timer">00:00:00:00</p>
            <div class="controls">
                <button id="start" onclick="startTimer()">Start</button>
                <button id="stop" onclick="stopTimer()">Stop</button>
                <button id="reset" onclick="resetTimer()">Reset</button>
            </div>
        </div>
    </section>

</div>