<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\App;
use DesafioVk\Vk\Support\FileHandler;
use DesafioVk\Vk\Support\ImportHandler;
// use DesafioVk\Vk\Support\XlsParser;
// use DesafioVk\Vk\Support\XlsImporter;
use DesafioVk\Vk\Support\XlsExporter;

class XlsController extends BaseController
{
    public function index()
    {
        return $this->view('xls_index');
    }

    public function import()
    {
        if ( isset($_FILES['arquivo']) ) {

            $fileName = $_FILES['arquivo']['tmp_name'];

            if (strpos($_FILES['arquivo']['type'], 'spreadsheet') === false) {
                $this->flash('O arquivo escolhido não pode ser importado, tente novamente.', 'danger');
                $this->redirect('importar/xls');
                return false;
            }

            $parser = FileHandler::getHandler($_FILES['arquivo']['type']);
            $importer = ImportHandler::getHandler($_FILES['arquivo']['type']);

            $importer->import(
                $parser->load($fileName)->convertToArray(),
                'cartorios'
            );

            // XlsImporter::import( 
            //     XlsParser::load($fileName)->convertToArray(),
            //     'cartorios' 
            // );

            $this->flash('Arquivo importado com sucesso!');

            return $this->redirect('');
        }

        return $this->redirect('importar/xls');
    }

    public function export()
    {
        $dados = App::get('database')->selectAll('cartorios');

        if( XlsExporter::config($dados)->export($dados) ) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="Lista_Cartórios.xlsx"'); 
            header('Content-Transfer-Encoding: binary');
            header('Connection: Keep-Alive');
            header('Expires: 0');
            header('Cache-Control: max-age=0');
            header('Pragma: public');

            readfile(__DIR__ . '/../../public/downloads/Lista_Cartórios.xlsx');
        }

        return false;
    }
}