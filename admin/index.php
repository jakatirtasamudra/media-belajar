<?php


    ob_start();
    session_start();
    

    require_once dirname(__DIR__) . '/base_url.php';

    
    if ( @$_SESSION['Id'] == FALSE OR @$_SESSION['Nama'] == FALSE OR @$_SESSION['Status'] == FALSE ) {

        @$_SESSION = array();

        session_unset();
        session_destroy();

        echo "<script> 
                location.href='". base_url() ."';
            </script>";

    }


    @$session_user = queryid (" SELECT Id, Nama, Level FROM Tbl_Akun WHERE Id = '". @$_SESSION['Id'] ."' AND Nama = '". @$_SESSION['Nama'] ."' AND Level = '". @$_SESSION['Status'] ."' ORDER BY Id DESC ");


    @$session_profile = queryid (" SELECT * FROM Tbl_Profile ORDER BY Id DESC ");


    @$session_judul_apps = queryid (" SELECT Id, Judul FROM Tbl_Judul ORDER BY Id DESC ");

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport">
    <meta name="<?= nama_url(); ?>" content="Aplikasi">
    <meta name="<?= nama_url(); ?>" content="Aplikasi">

    <title>
        Apps | <?= nama_url(); ?>
    </title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main/app.css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/shared/iconly.css">


    <!-- Base Sweetalert -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/extensions/sweetalert2/sweetalert2.min.css">


    <!-- Base Datatables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pages/fontawesome.css">
    <link rel="stylesheet"
        href="<?= base_url(); ?>assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/pages/datatables.css">


    <?php if ( @$_GET['url'] == 'GameKalkulator' ) { ?>

    <style>
    /* body {
        font-family: 'Open Sans', sans-serif;
        background-color: #eeeeee;
    }

    #container {
        width: 1000px;
        height: 550px;
        margin: 20px auto;
    } */

    #calculator {
        width: 320px;
        height: 520px;
        background-color: #eaedef;
        margin: 0 auto;
        top: 20px;
        position: relative;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    #result {
        height: 120px;
    }

    #history {
        text-align: right;
        height: 20px;
        margin: 0 20px;
        padding-top: 20px;
        font-size: 15px;
        color: #919191;
    }

    #output {
        text-align: right;
        height: 60px;
        margin: 10px 20px;
        font-size: 30px;

    }

    #keyboard {
        height: 400px;
    }

    .operator,
    .number,
    .empty {
        width: 50px;
        height: 50px;
        margin: 15px;
        float: left;
        border-radius: 50%;
        border-width: 0;
        font-size: 15px;
        font-weight: bold;

    }

    .number,
    .empty {
        background-color: #eaedef;
    }

    .operator {
        background-color: lightgrey;
    }

    .number,
    .operator {
        cursor: pointer;
    }

    .number:active,
    .operator:active {
        font-size: 13px;
    }

    .number:focus,
    .operator:focus,
    .empty:focus {
        outline: 0;
    }

    button:nth-child(4) {
        font-size: 20px;
        background-color: #20b2aa;
    }

    button:nth-child(8) {
        font-size: 20px;
        background-color: #ffa500;
    }

    button:nth-child(12) {
        font-size: 20px;
        background-color: #f08080;
    }

    button:nth-child(16) {
        font-size: 20px;
        background-color: #7d93e0;
    }

    button:nth-child(20) {
        font-size: 20px;
        background-color: #9477af;
    }
    </style>

    <?php } ?>



    <?php if ( @$_GET['url'] == 'GameTik' ) { ?>

    <style>
    #board {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-template-rows: repeat(3, 1fr);
        grid-gap: 10px;
        width: 300px;
        height: 300px;
        margin: 20px auto;
    }

    .square {
        background-color: #8f0404;
        border: 2px solid #000;
        font-size: 80px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .square:hover {
        background-color: #f5f5f5;
    }

    #message {
        margin: 20px 0;
        font-size: 24px;
        font-weight: bold;
    }

    #reset {
        background-color: #790404;
        border: 2px solid #000;
        font-size: 18px;
        padding: 10px 20px;
        cursor: pointer;
    }

    #reset:hover {
        background-color: #f5f5f5;
    }


    .square.x::before {
        content: 'X';
    }

    .square.o::before {
        content: 'O';
    }
    </style>

    <?php } ?>



    <?php if ( @$_GET['url'] == 'GameStop' ) { ?>

    <style>
    .container {
        text-align: center;
        margin-top: 50px;
    }

    h1 {
        font-size: 40px;
        margin-bottom: 20px;
    }

    #timer {
        font-size: 60px;
        font-weight: bold;
        margin-bottom: 30px;
    }

    .controls {
        display: flex;
        justify-content: center;
    }

    button {
        font-size: 20px;
        margin: 0 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    button:hover {
        background-color: #3e8e41;
    }
    </style>

    <?php } ?>





    <?php if ( @$_GET['url'] == 'IceBreaking' ) { ?>

    <style>
    /* html,
    body {
        height: 100%;
        margin: 0;
    } */

    /* body {
        background: black;
        display: flex;
        align-items: center;
        justify-content: center;
    } */

    canvas {
        border: 1px solid white;
    }
    </style>

    <?php } ?>




</head>

<body>

    <div id="app">
        <div id="main" class="layout-horizontal">

            <?php 
            
                require_once __DIR__ . '/nav.php'; 

                require_once __DIR__ . '/cont.php'; 

                require_once __DIR__ . '/foo.php'; 
                
            ?>




        </div>
    </div>


    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>assets/js/app.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/horizontal-layout.js"></script>

    <script src="<?= base_url(); ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/dashboard.js"></script>


    <!-- Base Sweetalert -->
    <script src="<?= base_url(); ?>assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/sweetalert2.js"></script>


    <!-- Base Datatables -->
    <script src="<?= base_url(); ?>assets/extensions/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pages/datatables.js"></script>



    <?php if ( @$_GET['url'] == 'GameUlar' ) { ?>

    <script type="text/javascript">
    $(document).ready(function() {

        // deklarasi
        var ruang = $("#ruang")[0];
        var ctx = ruang.getContext("2d");
        var lebar = $("#ruang").width();
        var tinggi = $("#ruang").height();

        var cw = 10;
        var tekan;
        var makanan;
        var nilai;

        //membuat cell aray untuk membuat ular
        var array_ular;

        function init() {
            tekan = "right"; //default direction
            create_snake();
            create_makanan(); //membuat makanan untuk ular
            //nilai game
            nilai = 0;

            if (typeof game_loop != "undefined") clearInterval(game_loop);
            game_loop = setInterval(paint, 60);
        }

        init();

        // membuat ular
        function create_snake() {
            // menetapkan jumlah panjang awal ular
            var length = 5; //panjang ular default
            array_ular = [];
            for (var i = length - 1; i >= 0; i--) {
                //membuat ular horizontal mulai dari arah kiri
                array_ular.push({
                    x: i,
                    y: 0
                });
            }
        }

        //membuat makanan untuk ular
        function create_makanan() {
            makanan = {
                x: Math.round(Math.random() * (lebar - cw) / cw),
                y: Math.round(Math.random() * (tinggi - cw) / cw)
            };
        }

        //pengaturan
        function paint() {
            // warna background
            ctx.fillStyle = "#ecf0f1";
            ctx.fillRect(0, 0, lebar, tinggi);
            ctx.strokeStyle = "#2c3e50";
            ctx.strokeRect(0, 0, lebar, tinggi);

            //membuat pergerakan untuk ular
            var nx = array_ular[0].x;
            var ny = array_ular[0].y;
            if (tekan == "right") nx++;
            else if (tekan == "left") nx--;
            else if (tekan == "up") ny--;
            else if (tekan == "down") ny++;

            //memeriksa tabrakan
            if (
                nx == -1 ||
                nx == lebar / cw ||
                ny == -1 ||
                ny == tinggi / cw ||
                cek_tabrakan(nx, ny, array_ular)
            ) {

                //restart game
                init();
                return;
            }

            //cek jika ular kena makanan/memakan makanan
            if (nx == makanan.x && ny == makanan.y) {

                var ekor = {
                    x: nx,
                    y: ny
                };
                nilai++;

                //membuat makanan yang baru
                create_makanan();

            } else {
                var ekor = array_ular.pop();
                ekor.x = nx;
                ekor.y = ny;
            }

            array_ular.unshift(ekor);

            for (var i = 0; i < array_ular.length; i++) {
                var c = array_ular[i];
                paint_cell(c.x, c.y);
            }

            paint_cell(makanan.x, makanan.y);

            //membuat penilaian skor
            var nilai_text = "nilai: " + nilai;
            ctx.fillText(nilai_text, 5, tinggi - 5);
        }

        function paint_cell(x, y) {
            ctx.fillStyle = "#1abc9c";
            ctx.fillRect(x * cw, y * cw, cw, cw);
            ctx.strokeStyle = "#ecf0f1";
            ctx.strokeRect(x * cw, y * cw, cw, cw);
        }

        function cek_tabrakan(x, y, array) {
            for (var i = 0; i < array.length; i++) {
                if (array[i].x == x && array[i].y == y) return true;
            }
            return false;
        }

        //kontrol ular dengan keyboard
        $(document).keydown(function(e) {
            var key = e.which;
            if (key == "37" && tekan != "right") tekan = "left";
            else if (key == "38" && tekan != "down") tekan = "up";
            else if (key == "39" && tekan != "left") tekan = "right";
            else if (key == "40" && tekan != "up") tekan = "down";
        });
    });
    </script>

    <?php } ?>


    <?php if ( @$_GET['url'] == 'GameKalkulator' ) { ?>

    <script>
    function getHistory() {
        return document.getElementById("history-value").innerText;
    }

    function printHistory(num) {
        document.getElementById("history-value").innerText = num;
    }

    function getOutput() {
        return document.getElementById("output-values").innerText;
    }

    function printOutput(num) {
        if (num == "") {
            document.getElementById("output-values").innerText = num;
        } else {
            document.getElementById("output-values").innerText = getFormattedNumber(num);
        }
    }

    function getFormattedNumber(num) {
        if (num == "-") {
            return "";
        }
        var n = Number(num);
        var value = n.toLocaleString("en");
        return value;
    }

    function reverseNumberFormat(num) {
        return Number(num.replace(/,/g, ''));
    }
    var operator = document.getElementsByClassName("operator");
    for (var i = 0; i < operator.length; i++) {
        operator[i].addEventListener('click', function() {
            if (this.id == "clear") {
                printHistory("");
                printOutput("");
            } else if (this.id == "backspace") {
                var
                    output = reverseNumberFormat(getOutput()).toString();
                if (output) { //if output has a value
                    output = output.substr(0, output.length - 1);
                    printOutput(output);
                }
            } else {
                var output = getOutput();
                var history = getHistory();
                if (output == "" && history != "") {
                    if (isNaN(history[history.length - 1])) {
                        history = history.substr(0, history.length - 1);
                    }
                }
                if (output != "" || history != "") {
                    output = output == "" ?
                        output : reverseNumberFormat(output);
                    history = history + output;
                    if (this.id == "=") {
                        var result = eval(history);
                        printOutput(result);
                        printHistory("");
                    } else {
                        history = history + this.id;
                        printHistory(history);
                        printOutput("");
                    }
                }
            }
        });
    }
    var number = document.getElementsByClassName("number");
    for (var i = 0; i < number.length; i++) {
        number[i].addEventListener('click', function() {
            var output = reverseNumberFormat(getOutput());
            if (output != NaN) {
                output = output + this.id;
                printOutput(output);
            }
        });
    }
    </script>

    <?php } ?>



    <?php if ( @$_GET['url'] == 'GameTik' ) { ?>

    <script>
    const squares = document.querySelectorAll('.square');
    const message = document.getElementById('message');
    const resetButton = document.getElementById('reset');
    let playerTurn = true;
    let gameOver = false;
    let board = ['', '', '', '', '', '', '', '', ''];

    // Function to check if the game is over
    function checkGameOver() {
        // Check rows
        for (let i = 0; i < 9; i += 3) {
            if (board[i] !== '' && board[i] === board[i + 1] && board[i] === board[i + 2]) {
                gameOver = true;
                return board[i];
            }
        }
        // Check columns
        for (let i = 0; i < 3; i++) {
            if (board[i] !== '' && board[i] === board[i + 3] && board[i] === board[i + 6]) {
                gameOver = true;
                return board[i];
            }
        }
        // Check diagonals
        if (board[0] !== '' && board[0] === board[4] && board[0] === board[8]) {
            gameOver = true;
            return board[0];
        }
        if (board[2] !== '' && board[2] === board[4] && board[2] === board[6]) {
            gameOver = true;
            return board[2];
        }
        // Check for tie
        if (!board.includes('')) {
            gameOver = true;
            return 'tie';
        }
        return '';
    }

    // Function to reset the game
    function reset() {
        playerTurn = true;
        gameOver = false;
        board = ['', '', '', '', '', '', '', '', ''];
        message.textContent = '';
        squares.forEach(square => {
            square.classList.remove('x');
            square.classList.remove('o');
            square.removeEventListener('click', makeMove);
            square.addEventListener('click', makeMove);
        });
    }

    // Function to make a move
    function makeMove(event) {
        if (gameOver) return;
        const square = event.target;
        const index = Array.from(squares).indexOf(square);
        if (board[index] !== '') return;
        board[index] = playerTurn ? 'x' : 'o';
        square.classList.add(playerTurn ? 'x' : 'o');
        square.removeEventListener('click', makeMove);
        const winner = checkGameOver();
        if (winner !== '') {
            if (winner === 'tie') {
                message.textContent = "It's a tie!";
            } else {
                message.textContent = `${winner.toUpperCase()} wins!`;
            }
            gameOver = true;
            return;
        }
        playerTurn = !playerTurn;
        if (!playerTurn) {
            // Make computer move
            const availableSquares = Array.from(squares).filter(square => !square.classList.contains('x') && !square
                .classList.contains('o'));
            const randomIndex = Math.floor(Math.random() * availableSquares.length);
            availableSquares[randomIndex].dispatchEvent(new Event('click'));
        }
    }

    // Initialize the game
    resetButton.addEventListener('click', reset);
    squares.forEach(square => {
        square.addEventListener('click', makeMove);
    });
    </script>

    <?php } ?>




    <?php if ( @$_GET['url'] == 'GameStop' ) { ?>

    <script>
    let milliseconds = 0;
    let seconds = 0;
    let minutes = 0;
    let hours = 0;
    let timer;

    function startTimer() {
        timer = setInterval(runTimer, 10);
    }

    function runTimer() {
        milliseconds++;
        if (milliseconds == 100) {
            milliseconds = 0;
            seconds++;
            if (seconds == 60) {
                seconds = 0;
                minutes++;
                if (minutes == 60) {
                    minutes = 0;
                    hours++;
                }
            }
        }
        document.getElementById("timer").innerHTML = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (
            minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" +
            seconds) + ":" + (milliseconds > 9 ? milliseconds : "0" + milliseconds);
    }

    function stopTimer() {
        clearInterval(timer);
    }

    function resetTimer() {
        clearInterval(timer);
        milliseconds = 0;
        seconds = 0;
        minutes = 0;
        hours = 0;
        document.getElementById("timer").innerHTML = "00:00:00:00";
    }
    </script>

    <?php } ?>



    <?php if ( @$_GET['url'] == 'GameStop' ) { ?>

    <style>

    </style>

    <?php } ?>





    <?php if ( @$_GET['url'] == 'IceBreaking' ) { ?>

    <script>
    // https://tetris.fandom.com/wiki/Tetris_Guideline

    // get a random integer between the range of [min,max]
    // @see https://stackoverflow.com/a/1527820/2124254
    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);

        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    // generate a new tetromino sequence
    // @see https://tetris.fandom.com/wiki/Random_Generator
    function generateSequence() {
        const sequence = ['I', 'J', 'L', 'O', 'S', 'T', 'Z'];

        while (sequence.length) {
            const rand = getRandomInt(0, sequence.length - 1);
            const name = sequence.splice(rand, 1)[0];
            tetrominoSequence.push(name);
        }
    }

    // get the next tetromino in the sequence
    function getNextTetromino() {
        if (tetrominoSequence.length === 0) {
            generateSequence();
        }

        const name = tetrominoSequence.pop();
        const matrix = tetrominos[name];

        // I and O start centered, all others start in left-middle
        const col = playfield[0].length / 2 - Math.ceil(matrix[0].length / 2);

        // I starts on row 21 (-1), all others start on row 22 (-2)
        const row = name === 'I' ? -1 : -2;

        return {
            name: name, // name of the piece (L, O, etc.)
            matrix: matrix, // the current rotation matrix
            row: row, // current row (starts offscreen)
            col: col // current col
        };
    }

    // rotate an NxN matrix 90deg
    // @see https://codereview.stackexchange.com/a/186834
    function rotate(matrix) {
        const N = matrix.length - 1;
        const result = matrix.map((row, i) =>
            row.map((val, j) => matrix[N - j][i])
        );

        return result;
    }

    // check to see if the new matrix/row/col is valid
    function isValidMove(matrix, cellRow, cellCol) {
        for (let row = 0; row < matrix.length; row++) {
            for (let col = 0; col < matrix[row].length; col++) {
                if (matrix[row][col] && (
                        // outside the game bounds
                        cellCol + col < 0 ||
                        cellCol + col >= playfield[0].length ||
                        cellRow + row >= playfield.length ||
                        // collides with another piece
                        playfield[cellRow + row][cellCol + col])) {
                    return false;
                }
            }
        }

        return true;
    }

    // place the tetromino on the playfield
    function placeTetromino() {
        for (let row = 0; row < tetromino.matrix.length; row++) {
            for (let col = 0; col < tetromino.matrix[row].length; col++) {
                if (tetromino.matrix[row][col]) {

                    // game over if piece has any part offscreen
                    if (tetromino.row + row < 0) {
                        return showGameOver();
                    }

                    playfield[tetromino.row + row][tetromino.col + col] = tetromino.name;
                }
            }
        }

        // check for line clears starting from the bottom and working our way up
        for (let row = playfield.length - 1; row >= 0;) {
            if (playfield[row].every(cell => !!cell)) {

                // drop every row above this one
                for (let r = row; r >= 0; r--) {
                    for (let c = 0; c < playfield[r].length; c++) {
                        playfield[r][c] = playfield[r - 1][c];
                    }
                }
            } else {
                row--;
            }
        }

        tetromino = getNextTetromino();
    }

    // show the game over screen
    function showGameOver() {
        cancelAnimationFrame(rAF);
        gameOver = true;

        context.fillStyle = 'black';
        context.globalAlpha = 0.75;
        context.fillRect(0, canvas.height / 2 - 30, canvas.width, 60);

        context.globalAlpha = 1;
        context.fillStyle = 'white';
        context.font = '36px monospace';
        context.textAlign = 'center';
        context.textBaseline = 'middle';
        context.fillText('GAME OVER!', canvas.width / 2, canvas.height / 2);
    }

    const canvas = document.getElementById('game');
    const context = canvas.getContext('2d');
    const grid = 32;
    const tetrominoSequence = [];

    // keep track of what is in every cell of the game using a 2d array
    // tetris playfield is 10x20, with a few rows offscreen
    const playfield = [];

    // populate the empty state
    for (let row = -2; row < 20; row++) {
        playfield[row] = [];

        for (let col = 0; col < 10; col++) {
            playfield[row][col] = 0;
        }
    }

    // how to draw each tetromino
    // @see https://tetris.fandom.com/wiki/SRS
    const tetrominos = {
        'I': [
            [0, 0, 0, 0],
            [1, 1, 1, 1],
            [0, 0, 0, 0],
            [0, 0, 0, 0]
        ],
        'J': [
            [1, 0, 0],
            [1, 1, 1],
            [0, 0, 0],
        ],
        'L': [
            [0, 0, 1],
            [1, 1, 1],
            [0, 0, 0],
        ],
        'O': [
            [1, 1],
            [1, 1],
        ],
        'S': [
            [0, 1, 1],
            [1, 1, 0],
            [0, 0, 0],
        ],
        'Z': [
            [1, 1, 0],
            [0, 1, 1],
            [0, 0, 0],
        ],
        'T': [
            [0, 1, 0],
            [1, 1, 1],
            [0, 0, 0],
        ]
    };

    // color of each tetromino
    const colors = {
        'I': 'cyan',
        'O': 'yellow',
        'T': 'purple',
        'S': 'green',
        'Z': 'red',
        'J': 'blue',
        'L': 'orange'
    };

    let count = 0;
    let tetromino = getNextTetromino();
    let rAF = null; // keep track of the animation frame so we can cancel it
    let gameOver = false;

    // game loop
    function loop() {
        rAF = requestAnimationFrame(loop);
        context.clearRect(0, 0, canvas.width, canvas.height);

        // draw the playfield
        for (let row = 0; row < 20; row++) {
            for (let col = 0; col < 10; col++) {
                if (playfield[row][col]) {
                    const name = playfield[row][col];
                    context.fillStyle = colors[name];

                    // drawing 1 px smaller than the grid creates a grid effect
                    context.fillRect(col * grid, row * grid, grid - 1, grid - 1);
                }
            }
        }

        // draw the active tetromino
        if (tetromino) {

            // tetromino falls every 35 frames
            if (++count > 35) {
                tetromino.row++;
                count = 0;

                // place piece if it runs into anything
                if (!isValidMove(tetromino.matrix, tetromino.row, tetromino.col)) {
                    tetromino.row--;
                    placeTetromino();
                }
            }

            context.fillStyle = colors[tetromino.name];

            for (let row = 0; row < tetromino.matrix.length; row++) {
                for (let col = 0; col < tetromino.matrix[row].length; col++) {
                    if (tetromino.matrix[row][col]) {

                        // drawing 1 px smaller than the grid creates a grid effect
                        context.fillRect((tetromino.col + col) * grid, (tetromino.row + row) * grid, grid - 1, grid -
                            1);
                    }
                }
            }
        }
    }

    // listen to keyboard events to move the active tetromino
    document.addEventListener('keydown', function(e) {
        if (gameOver) return;

        // left and right arrow keys (move)
        if (e.which === 37 || e.which === 39) {
            const col = e.which === 37 ?
                tetromino.col - 1 :
                tetromino.col + 1;

            if (isValidMove(tetromino.matrix, tetromino.row, col)) {
                tetromino.col = col;
            }
        }

        // up arrow key (rotate)
        if (e.which === 38) {
            const matrix = rotate(tetromino.matrix);
            if (isValidMove(matrix, tetromino.row, tetromino.col)) {
                tetromino.matrix = matrix;
            }
        }

        // down arrow key (drop)
        if (e.which === 40) {
            const row = tetromino.row + 1;

            if (!isValidMove(tetromino.matrix, row, tetromino.col)) {
                tetromino.row = row - 1;

                placeTetromino();
                return;
            }

            tetromino.row = row;
        }
    });

    // start the game
    rAF = requestAnimationFrame(loop);
    </script>

    <?php } ?>







    <?php if ( @$_GET['url'] == 'Evaluasi' ) { ?>
    <script type="text/javascript">
    function showDiv(select) {
        if (select.value == "Y") {
            document.getElementById('hidden_div').style.display = "block";
        } else {
            document.getElementById('hidden_div').style.display = "none";
        }
    }
    </script>
    <?php } ?>




</body>

</html>