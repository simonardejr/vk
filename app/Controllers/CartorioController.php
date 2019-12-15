<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\App;

class CartorioController extends BaseController
{
    public function create()
    {
        return $this->view('cartorio_add');
    }

    public function store()
    {
        $db = App::get('database');

        if ( ! $db->insert('cartorios', (array)$this->request) ) {
            $this->flash('Aconteceu um erro inesperado...', 'danger');
            $this->redirect('');
        }

        $this->flash('Cartório adicionado com sucesso!');

        $this->redirect('');

    }

    public function edit()
    {
        $edit_form = true;

        $db = App::get('database');

        $id = intval($_GET['id']);

        $dados = $db->find(['id'=>$id], 'cartorios')[0] ?? [];

        return $this->view('cartorio_edit', compact('edit_form', 'dados'));
    }

    public function update()
    {
        $id = intval($this->request->cartorio_id);

        $db = App::get('database');

        $dados = $db->find(['id'=>$id], 'cartorios')[0] ?? [];

        foreach($this->request as $field=>$value) {
            if ( array_key_exists($field, $dados) ) {
                $dados->$field = $value;
            }
        }

        if( ! $db->update('cartorios', $dados, ['id'=>$id]) ) {
            $this->flash('Aconteceu um erro inesperado...', 'danger');
            $this->redirect('');
        }

        $this->flash('Cartório editado com sucesso!');

        $this->redirect('');
    }

    public function destroy()
    {
        $id = intval($this->request->id);

        if ( ! App::get('database')->delete('cartorios', ['id'=>$id]) ) {
            $this->flash('Aconteceu um erro inesperado...', 'danger');
            $this->redirect('');
        }

        $this->flash('Cartório removido com sucesso!');

        $this->redirect('');
    }

    public function getFields()
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
}