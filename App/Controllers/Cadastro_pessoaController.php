<?php

namespace Controllers;

use Core\Controller;

class Cadastro_pessoaController extends Controller
{
    public function index()
    {
        $this->view('cadastro_pessoa/cadastro');
    }
}
