<?php if ( ! empty($_SESSION['flash']) ) { ?>
    <div class="alert alert-<?= $_SESSION['flash']['type']; ?>" role="alert">
        <?= $_SESSION['flash']['message']; ?>
    </div>
<?php unset($_SESSION['flash']); } ?>