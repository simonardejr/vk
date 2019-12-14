<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\Support\XmlParser;
use DesafioVk\Vk\Support\XmlImporter;

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

            XmlImporter::import( 
                XmlParser::load($fileName)->convertToArray()['cartorio'],
                'cartorios' 
            );

            return $this->redirect('');
        }

        return $this->redirect('importar/xml');
    }
}