<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\Support\XlsParser;
use DesafioVk\Vk\Support\XlsImporter;

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
}