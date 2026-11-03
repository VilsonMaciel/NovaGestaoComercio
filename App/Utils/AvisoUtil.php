<?php

namespace Utils;

class AvisoUtil
{
    public static function sucesso($mensagem)
    {
        if (!isset($_SESSION['flash']['aviso_sucesso'])) {
            $_SESSION['flash']['aviso_sucesso'] = [];
        }

        if (is_array($mensagem)) {
            $_SESSION['flash']['aviso_sucesso'] = array_merge($_SESSION['flash']['aviso_sucesso'], $mensagem);
        } else {
            $_SESSION['flash']['aviso_sucesso'][] = $mensagem;
        }
    }

    public static function erro($mensagem)
    {
        if (!isset($_SESSION['flash']['aviso_erro'])) {
            $_SESSION['flash']['aviso_erro'] = [];
        }

        if (is_array($mensagem)) {
            $_SESSION['flash']['aviso_erro'] = array_merge($_SESSION['flash']['aviso_erro'], $mensagem);
        } else {
            $_SESSION['flash']['aviso_erro'][] = $mensagem;
        }
    }

    public static function obterAviso()
    {
        if (isset($_SESSION['flash'])) {
            $avisos = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $avisos;
        }

        return [];
    }
}
