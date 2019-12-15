<?php include 'partials/header.php'; ?>
<div class="mt-3">
    <h2 class="border-bottom pb-2">Importar XLS</h2>
    <div class="table-responsive">
        <form action="/importar/xls" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleFormControlFile1">Selecione o arquivo XLS que deseja importar</label>
                <input type="file" class="form-control-file" name="arquivo" id="exampleFormControlFile1"><br>
                <input type="submit" value="Importar" onclick="this.form.submit(); this.disabled=true; this.value='Importando... Aguarde!';" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
<?php include 'partials/footer.php'; ?>