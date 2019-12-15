<?php include 'partials/header.php'; ?>
<div class="mt-3">

    <?php include 'partials/flash.php'; ?>

    <h2 class="border-bottom pb-2">Enviar comunicado</h2>
    <form action="/comunicado/enviar" method="POST">
        <div class="form-group">
            <label for="inputAssunto">Assunto</label>
            <input type="text" class="form-control" name="assunto" 
                id="inputAssunto" placeholder="Assunto" autocomplete="off" required>
        </div>
        <div class="form-group">
        <label for="inputComunicado">Comunicado</label>
            <textarea name="comunicado" class="form-control" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">
            Enviar
        </button>
    </form>


</div>
<?php include 'partials/footer.php'; ?>