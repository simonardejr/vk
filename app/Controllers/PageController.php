<?php

namespace DesafioVk\App\Controllers;

use DesafioVk\App\Controllers\BaseController;
use DesafioVk\Vk\App;

class PageController extends BaseController
{
    public function home()
    {
        // echo 'Hello World!';

        $db = App::get('database');

        $titulo = 'Lista de Cartórios';

        $cartorios = $db->paginate('cartorios', ($_REQUEST['page'] ?? 1));

        $total = $db->getTotalRecords('cartorios')->total;

        $pagination = [
            'total' => $total,
            'maxNumberOfPages' => ceil($total / 25),
        ];

        return $this->view('home', compact('cartorios', 'pagination', 'titulo'));
    }

    public function comunicado()
    {
        return $this->view('comunicado');
    }

    public function send()
    {
        $from = "desafiovk@sistema.com";

        $to = array_filter(array_map(function($i) {
            return $i->email;
        }, App::get('database')->find(['ativo'=>1], 'cartorios')));

        $headers = "De:". $from;

        if ( ! mail(implode(', ', $to), $this->request->assunto, $this->request->comunicado, $headers) ) {
            $this->flash('Aconteceu um erro e o comunicado não foi enviado', 'danger');
            $this->redirect('comunicado');
        }

        $this->flash('Comunicado enviado com sucesso para '.count($to).' destinatários!');

        $this->redirect('comunicado');
    }

    public function about()
    {
        $content = 'Sobre';

        return $this->view('about', compact('content'));
    }
}