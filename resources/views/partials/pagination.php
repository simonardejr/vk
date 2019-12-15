<nav aria-label="Navigation">
    <ul class="pagination justify-content-center">
        <li class="page-item <?= (($_GET['page'] - 1) < 1 ? 'disabled' : ''); ?>">
            <a class="page-link" href="?page=<?= (($_GET['page'] - 1) > 1 ? ($_GET['page'] - 1) : 1); ?>">
                Anterior
            </a>
        </li>
        <?php if($pagination['maxNumberOfPages'] >= 1 && $_GET['page'] <= $pagination['maxNumberOfPages']) { ?>
            <li class="page-item <?= ($_GET['page'] == 1 ? 'active' : ''); ?>">
                <a class="page-link" href="?page=1">
                    1
                </a>
            </li>
        <?php 
            $i = max(2, $_GET['page'] - 5);
            if ($i > 2) { 
        ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">
                    ...
                </a>
            </li>
        <?php } ?>
        <?php for (; $i < min($_GET['page'] + 6, $pagination['maxNumberOfPages']); $i++) { ?>
            <li class="page-item <?= ($_GET['page'] == $i ? 'active' : ''); ?>">
                <a class="page-link" href="?page=<?= $i; ?>">
                    <?= $i; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ($i != $pagination['maxNumberOfPages']) { ?>
            <li class="page-item disabled">
                <a class="page-link" href="#">
                    ...
                </a>
            </li>
        <?php } ?>
            <li class="page-item <?= ($_GET['page'] == $pagination['maxNumberOfPages'] ? 'active' : ''); ?>">
                <a class="page-link" href="?page=<?= $pagination['maxNumberOfPages']; ?>">
                    <?= $pagination['maxNumberOfPages']; ?>
                </a>
            </li>
        <?php } ?>
        <li class="page-item <?= (($_GET['page'] + 1) > $pagination['maxNumberOfPages'] ? 'disabled' : ''); ?>">
            <a class="page-link" href="?page=<?= (($_GET['page'] + 1) < $pagination['maxNumberOfPages'] ? ($_GET['page'] + 1) : $pagination['maxNumberOfPages']); ?>">
                Próxima
            </a>
        </li>
    </ul>
</nav>