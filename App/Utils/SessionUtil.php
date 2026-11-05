<?php

namespace Utils;

use Models\UsuarioModel;

class SessionUtil
{
    private const CARGOS_VALIDOS = ['ADM', 'FUNCIONÁRIO'];

    public static function atualizarUsuarioAutenticado(): void
    {
        if (!self::isUsuarioLogado()) {
            return;
        }

        $usuarioId = filter_var($_SESSION['usuario_logado']['usuario_id'] ?? null, FILTER_VALIDATE_INT, [
            'options' => ['min_range' => 1],
        ]);
        $usuario = $usuarioId ? UsuarioModel::buscarPorUsuarioId($usuarioId) : null;

        if (!$usuario || !in_array($usuario['usuario_cargo'], self::CARGOS_VALIDOS, true)) {
            self::limparSessao();
            return;
        }

        self::salvarUsuarioNaSession($usuario);
    }

    public static function criptografarSenha(string $senhaPura): string
    {
        return password_hash($senhaPura, PASSWORD_DEFAULT);
    }

    public static function validarSenha(string $senhaLogin, string $senhaBanco): bool
    {
        return password_verify($senhaLogin, $senhaBanco);
    }

    public static function validarUsuarioLogado(): void
    {
        if (self::isUsuarioLogado()) {
            return;
        }

        self::limparSessao();
        AvisoUtil::erro('Faça login para acessar esta página.');
        self::redirecionar('/login');
    }

    public static function validarCargo(array $cargosPermitidos): void
    {
        self::validarUsuarioLogado();

        if (in_array($_SESSION['usuario_logado']['cargo'], $cargosPermitidos, true)) {
            return;
        }

        AvisoUtil::erro('Você não possui permissão para acessar esta página.');
        self::redirecionar('/produtos/listagem');
    }

    public static function salvarUsuarioNaSession(array $usuario): void
    {
        $_SESSION['usuario_logado'] = [
            'usuario_id' => (int) $usuario['usuario_id'],
            'pessoa_id' => (int) $usuario['pessoa_id'],
            'cargo' => $usuario['usuario_cargo'],
            'nome' => $usuario['pessoa_nome'],
            'email' => $usuario['usuario_email'],
        ];
    }

    public static function limparSessao(): void
    {
        $_SESSION = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            session_regenerate_id(true);
        }
    }

    public static function isUsuarioLogado(): bool
    {
        $usuario = $_SESSION['usuario_logado'] ?? null;
        if (!is_array($usuario)) {
            return false;
        }

        foreach (['usuario_id', 'pessoa_id', 'cargo', 'nome', 'email'] as $campo) {
            if (empty($usuario[$campo])) {
                return false;
            }
        }

        return in_array($usuario['cargo'], self::CARGOS_VALIDOS, true);
    }

    private static function redirecionar(string $rota): void
    {
        header('Location: ' . BASE_URL . ltrim($rota, '/'));
        exit;
    }
}
