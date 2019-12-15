<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\App;
use DesafioVk\Vk\Support\XlsParser;
use DesafioVk\Vk\Support\XlsImporter;
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

            XlsImporter::import( 
                XlsParser::load($fileName)->convertToArray(),
                'cartorios' 
            );

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