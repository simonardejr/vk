<form action="<?=(isset($edit_form) ? '/cartorio/editar' : '/cartorio/adicionar');?>" 
    method="POST" autocomplete="off">
    <div class="form-group">
        <label for="inputNome">Nome</label>
        <input type="text" class="form-control" name="nome" id="inputNome" 
            placeholder="Nome" autocomplete="off" required 
            value="<?=(!isset($dados->nome) ? '' : $dados->nome )?>">
    </div>
    <div class="form-group">
        <label for="inputRazao">Razão</label>
        <input type="text" class="form-control" name="razao" id="inputRazao" 
            placeholder="Razão" autocomplete="off" 
            value="<?=(!isset($dados->razao) ? '' : $dados->razao )?>">
    </div>
    <div class="form-group">
        <label for="inputTabeliao">Tabelião</label>
        <input type="text" class="form-control" name="tabeliao" 
            id="inputTabeliao" placeholder="Tabelião" autocomplete="off" 
            value="<?=(!isset($dados->tabeliao) ? '' : $dados->tabeliao )?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputDocumento">Documento</label>
            <input type="number" min="0" step="1" class="form-control" 
                name="documento" id="inputDocumento" placeholder="Documento" 
                autocomplete="off" required 
                value="<?=(!isset($dados->documento) ? '' : $dados->documento )?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" name="email" 
                id="inputEmail" placeholder="E-mail" autocomplete="off" 
                value="<?=(!isset($dados->email) ? '' : $dados->email )?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputTelefone">Telefone</label>
            <input type="text" class="form-control" name="telefone" 
                id="inputTelefone" placeholder="(61) 0000-0000" 
                autocomplete="off" 
                value="<?=(!isset($dados->telefone) ? '' : $dados->telefone )?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEndereco">Endereço</label>
        <input type="text" class="form-control" name="endereco" 
            id="inputEndereco" placeholder="Rua dos Cártorios, nº 0" 
            autocomplete="off" 
            value="<?=(!isset($dados->endereco) ? '' : $dados->endereco )?>">
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputBairro">Bairro</label>
            <input type="text" class="form-control" name="bairro" 
                id="inputBairro" placeholder="Bairro" autocomplete="off"
                value="<?=(!isset($dados->bairro) ? '' : $dados->bairro )?>">
        </div>
        <div class="form-group col-md-4">
            <label for="inputCidade">Cidade</label>
            <input type="text" class="form-control" name="cidade" 
                id="inputCidade" placeholder="Cidade" autocomplete="off"
                value="<?=(!isset($dados->cidade) ? '' : $dados->cidade )?>">
        </div>
        <div class="form-group col-md-2">
            <label for="inputEstado">UF</label>
            <select id="inputEstado" name="uf" class="form-control" 
                autocomplete="off">
                <option selected>Escolher...</option>
                <option value="AC" <?=((isset($dados->uf) && $dados->uf == "AC") ? 'selected' : '' )?>>Acre</option>
                <option value="AL" <?=((isset($dados->uf) && $dados->uf == "AL") ? 'selected' : '' )?>>Alagoas</option>
                <option value="AP" <?=((isset($dados->uf) && $dados->uf == "AP") ? 'selected' : '' )?>>Amapá</option>
                <option value="AM" <?=((isset($dados->uf) && $dados->uf == "AM") ? 'selected' : '' )?>>Amazonas</option>
                <option value="BA" <?=((isset($dados->uf) && $dados->uf == "BA") ? 'selected' : '' )?>>Bahia</option>
                <option value="CE" <?=((isset($dados->uf) && $dados->uf == "CE") ? 'selected' : '' )?>>Ceará</option>
                <option value="DF" <?=((isset($dados->uf) && $dados->uf == "DF") ? 'selected' : '' )?>>Distrito Federal</option>
                <option value="ES" <?=((isset($dados->uf) && $dados->uf == "ES") ? 'selected' : '' )?>>Espírito Santo</option>
                <option value="GO" <?=((isset($dados->uf) && $dados->uf == "GO") ? 'selected' : '' )?>>Goiás</option>
                <option value="MA" <?=((isset($dados->uf) && $dados->uf == "MA") ? 'selected' : '' )?>>Maranhão</option>
                <option value="MT" <?=((isset($dados->uf) && $dados->uf == "MT") ? 'selected' : '' )?>>Mato Grosso</option>
                <option value="MS" <?=((isset($dados->uf) && $dados->uf == "MS") ? 'selected' : '' )?>>Mato Grosso do Sul</option>
                <option value="MG" <?=((isset($dados->uf) && $dados->uf == "MG") ? 'selected' : '' )?>>Minas Gerais</option>
                <option value="PA" <?=((isset($dados->uf) && $dados->uf == "PA") ? 'selected' : '' )?>>Pará</option>
                <option value="PB" <?=((isset($dados->uf) && $dados->uf == "PB") ? 'selected' : '' )?>>Paraíba</option>
                <option value="PR" <?=((isset($dados->uf) && $dados->uf == "PR") ? 'selected' : '' )?>>Paraná</option>
                <option value="PE" <?=((isset($dados->uf) && $dados->uf == "PE") ? 'selected' : '' )?>>Pernambuco</option>
                <option value="PI" <?=((isset($dados->uf) && $dados->uf == "PI") ? 'selected' : '' )?>>Piauí</option>
                <option value="RJ" <?=((isset($dados->uf) && $dados->uf == "RJ") ? 'selected' : '' )?>>Rio de Janeiro</option>
                <option value="RN" <?=((isset($dados->uf) && $dados->uf == "RN") ? 'selected' : '' )?>>Rio Grande do Norte</option>
                <option value="RS" <?=((isset($dados->uf) && $dados->uf == "RS") ? 'selected' : '' )?>>Rio Grande do Sul</option>
                <option value="RO" <?=((isset($dados->uf) && $dados->uf == "RO") ? 'selected' : '' )?>>Rondônia</option>
                <option value="RR" <?=((isset($dados->uf) && $dados->uf == "RR") ? 'selected' : '' )?>>Roraima</option>
                <option value="SC" <?=((isset($dados->uf) && $dados->uf == "SC") ? 'selected' : '' )?>>Santa Catarina</option>
                <option value="SP" <?=((isset($dados->uf) && $dados->uf == "SP") ? 'selected' : '' )?>>São Paulo</option>
                <option value="SE" <?=((isset($dados->uf) && $dados->uf == "SE") ? 'selected' : '' )?>>Sergipe</option>
                <option value="TO" <?=((isset($dados->uf) && $dados->uf == "TO") ? 'selected' : '' )?>>Tocantins</option>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="inputCEP">CEP</label>
            <input type="text" class="form-control" name="cep" id="inputCEP" 
                placeholder="00000-000" autocomplete="off"
                value="<?=(!isset($dados->cep) ? '' : $dados->cep )?>">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputAtivo">Ativo</label>
            <select id="inputAtivo" name="ativo" class="form-control" 
                autocomplete="off">
                <option>Escolha...</option>
                <option value="1" <?=((isset($dados->ativo) && $dados->ativo == "1") ? 'selected' : '' )?>>Sim</option>
                <option value="0" <?=((isset($dados->ativo) && $dados->ativo == "0") ? 'selected' : '' )?>>Não</option>
            </select>
        </div>
    </div>

    <?php if ( isset($edit_form) )  { ?>
        <input type="hidden" name="cartorio_id" id="cartorio_id" 
            value="<?= $_REQUEST['id']; ?>">
    <?php } ?>

    <button type="submit" class="btn btn-primary">
        <?=(isset($edit_form) ? 'Atualizar' : 'Adicionar');?>
    </button>
</form>