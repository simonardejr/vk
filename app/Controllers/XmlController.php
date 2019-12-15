<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
// use DesafioVk\Vk\Support\XmlParser;
// use DesafioVk\Vk\Support\XmlImporter;
use DesafioVk\Vk\Support\FileHandler;
use DesafioVk\Vk\Support\ImportHandler;

class XmlController extends BaseController
{
    public function index()
    {
        return $this->view('xml_index');
    }

    public function import()
    {
        if ( isset($_FILES['arquivo']) ) {

            $fileName = $_FILES['arquivo']['tmp_name'];

            if (strpos($_FILES['arquivo']['type'], '/xml') === false) {
                $this->flash('O arquivo escolhido não pode ser importado, tente novamente.', 'danger');
                $this->redirect('importar/xml');
                return false;
            }

            $parser = FileHandler::getHandler($_FILES['arquivo']['type']);
            $importer = ImportHandler::getHandler($_FILES['arquivo']['type']);

            $importer->import(
                $parser->load($fileName)->convertToArray(),
                'cartorios'
            );

            // XmlImporter::import( 
            //     XmlParser::load($fileName)->convertToArray()['cartorio'],
            //     'cartorios' 
            // );

            $this->flash('Arquivo importado com sucesso!');

            return $this->redirect('');
        }

        return $this->redirect('importar/xml');
    }
}