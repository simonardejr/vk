<?php

namespace DesafioVk\Vk\Support;

class Importer
{
    public function fields()
    {
        return [
            'nome',
            'razao',
            'tipo_documento',
            'documento',
            'cep',
            'endereco',
            'bairro',
            'cidade',
            'uf',
            'telefone',
            'email',
            'tabeliao',
            'ativo'
        ];
    }

    public function xlsFields()
    {
        return [
            'NOME' => 'nome',
            'RAZÃO' => 'razao',
            'TIPO_DOCUMENTO' => 'tipo_documento',
            'DOCUMENTO' => 'documento',
            'CEP' => 'cep',
            'ENDEREÇO' => 'endereco',
            'BAIRRO' => 'bairro',
            'CIDADE' => 'cidade',
            'UF' => 'uf',
            'TELEFONE' => 'telefone',
            'E-MAIL' => 'email',
            'TABELIÃO' => 'tabeliao',
            'ATIVO' => 'ativo'
        ];
    }

    public function xlmFields()
    {
        return [
            'nome' => 'nome',
            'razao' => 'razao',
            'tipo_documento' => 'tipo_documento',
            'documento' => 'documento',
            'cep' => 'cep',
            'endereco' => 'endereco',
            'bairro' => 'bairro',
            'cidade' => 'cidade',
            'uf' => 'uf',
            'tabeliao' => 'tabeliao',
            'ativo' => 'ativo',
        ];
    }
}