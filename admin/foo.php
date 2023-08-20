<footer>
    <div class="container">
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>
                    <?= date('Y') ?> &copy; Pembelajaran
                </p>
            </div>
            <div class="float-end">
                <p>
                    Dibuat Dengan
                    <span class="text-danger">
                        <i class="bi bi-heart"></i>
                    </span>
                    Oleh <?= @$_SESSION['Nama']; ?>
                </p>
            </div>
        </div>
    </div>
</footer>