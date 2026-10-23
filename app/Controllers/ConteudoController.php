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

    public function listar(): string
    {
    $model = new ConteudoModel();
    return view('conteudo/listar', [
    'conteudos' => $model->findAll(),
    ]);
    }

    public function editar($id): string
    {
    $model = new ConteudoModel();
    $conteudo = $model->find($id);
    if ($conteudo === null) {
    throw PageNotFoundException::forPageNotFound(
    'O conteúdo solicitado não foi encontrado.'
    );
    }
    return view('conteudo/editar', [
    'conteudo' => $conteudo,
    'erros' => [],
    ]);
    }

    public function atualizar($id)
    {
    $model = new ConteudoModel();
    $conteudo = $model->find($id);
    if ($conteudo === null) {
    throw PageNotFoundException::forPageNotFound(
    'O conteúdo solicitado não foi encontrado.'
    );
    }

    $dadosPost = [
    'Titulo' => $this->request->getPost('Titulo'),
    'Texto' => $this->request->getPost('Texto'),
    ];
    $regras = [
    'Titulo' => 'required|max_length[255]',
    'Texto' => 'required',
    ];
    if (!$this->validate($regras)) {
    $conteudo['Titulo'] = $dadosPost['Titulo'] ?? '';
    $conteudo['Texto'] = $dadosPost['Texto'] ?? '';
    return view('conteudo/editar', [
    'conteudo' => $conteudo,
    'erros' => $this->validator->getErrors(),
    ]);
    }
    
    $model->update($id, $dadosPost);

    return redirect()
    ->to(site_url('conteudos'))
    ->with('mensagem', 'Conteúdo atualizado com sucesso.');
    }
}

