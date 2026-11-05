<?php

namespace Controllers;

use Core\Controller;
use Models\UsuarioModel;
use PDOException;
use Utils\AvisoUtil;
use Utils\FormUtil;
use Utils\SessionUtil;

class LoginController extends Controller
{
    public function index()
    {
        if (SessionUtil::isUsuarioLogado()) {
            $this->redirect('/produtos/listagem');
        }

        $rascunho = FormUtil::consumirRascunho('login') ?? [];
        $this->view('login/login', [
            'dados' => $rascunho,
            'avisos' => AvisoUtil::obterAviso(),
        ]);
    }

    public function autenticar()
    {
        $email = mb_strtolower(trim((string) ($_POST['email'] ?? '')));
        $senha = (string) ($_POST['senha'] ?? '');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $senha === '') {
            FormUtil::salvarRascunho('login', ['email' => $email]);
            AvisoUtil::erro('Informe um e-mail e uma senha válidos.');
            $this->redirect('/login');
        }

        try {
            $usuario = UsuarioModel::buscarPorEmail($email);
        } catch (PDOException $e) {
            FormUtil::salvarRascunho('login', ['email' => $email]);
            AvisoUtil::erro('Não foi possível realizar o login. Tente novamente.');
            $this->redirect('/login');
        }

        if (!$usuario || !SessionUtil::validarSenha($senha, $usuario['senha'])) {
            FormUtil::salvarRascunho('login', ['email' => $email]);
            AvisoUtil::erro('E-mail ou senha inválidos.');
            $this->redirect('/login');
        }

        session_regenerate_id(true);
        SessionUtil::salvarUsuarioNaSession($usuario);

        $this->redirect('/produtos/listagem');
    }

    public function logout()
    {
        SessionUtil::limparSessao();
        AvisoUtil::sucesso('Sessão encerrada com sucesso.');
        $this->redirect('/login');
    }
}

