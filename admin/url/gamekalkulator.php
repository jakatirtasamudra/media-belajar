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
                            <a href="?url=GameKalkulator">
                                Kalkulator
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div id="container">
            <div id="calculator">
                <div id="result">
                    <div id="history">
                        <p id="history-value"></p>
                    </div>
                    <div id="output">
                        <p id="output-values"></p>
                    </div>
                </div>
                <div id="keyboard">
                    <button class="operator" id="clear">C</button>
                    <button class="operator" id="backspace">CE</button>
                    <button class="operator" id="%">%</button>
                    <button class="operator" id="/">&#247;</button>
                    <button class="number" id="7">7</button>
                    <button class="number" id="8">8</button>
                    <button class="number" id="9">9</button>
                    <button class="operator" id="*">&times;</button>
                    <button class="number" id="4">4</button>
                    <button class="number" id="5">5</button>
                    <button class="number" id="6">6</button>
                    <button class="operator" id="-">-</button>
                    <button class="number" id="1">1</button>
                    <button class="number" id="2">2</button>
                    <button class="number" id="3">3</button>
                    <button class="operator" id="+">+</button>
                    <button class="empty" id="empty"></button>
                    <button class="number" id="0">0</button>
                    <button class="empty" id="empty"></button>
                    <button class="operator" id="=">=</button>
                </div>
            </div>
        </div>
    </section>

</div>