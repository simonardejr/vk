<?php include 'partials/header.php'; ?>
<div class="mt-3">

    <?php include 'partials/flash.php'; ?>

    <h2 class="border-bottom pb-2">Importar XML</h2>
    <div class="table-responsive">
        <form action="/importar/xml" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1">Selecione o arquivo XML que deseja importar</label>
                <input type="file" class="form-control-file" name="arquivo" id="exampleFormControlFile1"><br>
                <input type="submit" value="Importar" onclick="this.form.submit(); this.disabled=true; this.value='Importando... Aguarde!';" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<?php include 'partials/footer.php'; ?>