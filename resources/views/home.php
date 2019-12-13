<?php include 'partials/header.php'; ?>
<div class="mt-3">
    <h2 class="border-bottom pb-2">Lista de Cartórios</h2>
    <?php if( !empty($cartorios) ) { ?>
    <div class="table-responsive">
        <table class="table table-striped table-sm table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Razão</th>
                    <th>Documento</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($cartorios as $cartorio) { ?>
                <tr>
                    <td><?= $cartorio->id; ?></td>
                    <td><?= $cartorio->nome; ?></td>
                    <td><?= $cartorio->razao; ?></td>
                    <td><?= $cartorio->documento; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } else { ?>
    <h5>Nenhum cartório cadastrado.</h5>
    <?php } ?>
</div>
<?php include 'partials/footer.php'; ?>