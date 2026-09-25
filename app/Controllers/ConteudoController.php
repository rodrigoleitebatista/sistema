<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\ConteudoModel;

class ConteudoController extends BaseController
{
 
    public function index()
    {
        //
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(1);

        return view('home', $dados);
    }

    protected $helpers = ['contato'];

    public function contato()
    {
        //
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(2);

        return view('contato', $dados);
    }

    public function quem_sou()
    {
        //
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(3);

        return view('quem_sou', $dados);
    }

    public function produtos()
    {
        //
        $conteudoModel = new ConteudoModel();

        $dados['conteudo'] = $conteudoModel->find(4);

        return view('produtos', $dados);
    }
}

