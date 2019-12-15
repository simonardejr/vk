<?php include 'partials/header.php'; ?>
<div class="mt-3">

    <?php include 'partials/flash.php'; ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap 
        align-items-center pt-0 pb-2 mb-3 border-bottom">
        <h2 class="">Lista de Cartórios 
            <small class="small-info"><?= ( ! empty($cartorios) ? number_format($pagination['total'], 0, ',', '.') . ' cartórios registrados' : ''); ?></small>
        </h2>
        <?php if ( ! empty($cartorios) ) { ?>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="/cartorio/exportar" class="btn btn-sm btn-outline-secondary">
                    Exportar
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php if ( ! empty($cartorios) ) { ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Razão</th>
                    <th>Documento</th>
                    <th>Cidade / UF</th>
                    <th>Tabelião</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($cartorios as $cartorio) { ?>
                <tr>
                    <td><?= $cartorio->id; ?></td>
                    <td><?= $cartorio->nome; ?></td>
                    <td><?= $cartorio->razao; ?></td>
                    <td><?= $cartorio->documento; ?></td>
                    <td><?= $cartorio->cidade; ?> / <?= $cartorio->uf; ?></td>
                    <td><?= $cartorio->tabeliao ?></td>
                    <td align="center">
                        <a href="/cartorio/editar/?id=<?= $cartorio->id; ?>">
                            <span data-feather="edit-3"></span>
                        </a>&nbsp;
                        <a style="color: red" href="#" onclick="if(confirm('Deseja realmente apagar?')) { window.location='/cartorio/remover/?id=<?= $cartorio->id; ?>' }">
                            <span data-feather="trash-2"></span>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <?php if ( isset($pagination) ) { ?>
        <?php include 'partials/pagination.php'; ?>
    <?php } ?>

    <?php } else { ?>
    <h5>Nenhum cartório cadastrado.</h5>
    <?php } ?>
</div>
<?php include 'partials/footer.php'; ?>