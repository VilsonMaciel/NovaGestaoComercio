<?php

namespace Controllers;

use Core\Controller;

class ProdutoController extends Controller
{
    public function listagem()
    {
        $this->view("produtos/listagem");
    }

    public function cadastro()
    {
        $this->view("produtos/cadastro");
    }
}

