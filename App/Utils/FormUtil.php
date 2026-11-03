<?php

namespace Utils;

class FormUtil
{
    private const CHAVE_SESSAO = 'form';
    private const TEMPO_EXPIRACAO = 1800;

    public static function salvarRascunho(string $formulario, array $dados): void
    {
        $_SESSION[self::CHAVE_SESSAO]['rascunhos'][$formulario] = [
            'dados' => $dados,
            'criado_em' => time(),
        ];
    }

    public static function consumirRascunho(string $formulario): ?array
    {
        $rascunho = $_SESSION[self::CHAVE_SESSAO]['rascunhos'][$formulario] ?? null;
        self::limparRascunho($formulario);

        if (!is_array($rascunho) || self::expirou($rascunho)) {
            return null;
        }

        return is_array($rascunho['dados'] ?? null) ? $rascunho['dados'] : null;
    }

    public static function limparRascunho(string $formulario): void
    {
        unset($_SESSION[self::CHAVE_SESSAO]['rascunhos'][$formulario]);

        if (empty($_SESSION[self::CHAVE_SESSAO]['rascunhos'])) {
            unset($_SESSION[self::CHAVE_SESSAO]['rascunhos']);
        }

        if (empty($_SESSION[self::CHAVE_SESSAO])) {
            unset($_SESSION[self::CHAVE_SESSAO]);
        }
    }

    private static function expirou(array $rascunho): bool
    {
        $criadoEm = filter_var($rascunho['criado_em'] ?? null, FILTER_VALIDATE_INT);

        return $criadoEm === false
            || $criadoEm === null
            || time() - $criadoEm > self::TEMPO_EXPIRACAO;
    }
}
