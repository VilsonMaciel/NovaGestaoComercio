<?php

namespace Models;

use Core\Database;

class UsuarioModel
{
    public static function buscarPorEmail(string $email): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare(<<<SQL
            SELECT
                usuario.id AS usuario_id,
                usuario.senha,
                usuario.cargo AS usuario_cargo,
                usuario.email AS usuario_email,
                pessoa.id AS pessoa_id,
                pessoa.nome AS pessoa_nome
            FROM usuario
            INNER JOIN pessoa ON pessoa.usuario_id = usuario.id
            WHERE usuario.email = :email
            LIMIT 1
        SQL);
        $stmt->execute([':email' => $email]);

        $usuario = $stmt->fetch();
        return $usuario ?: null;
    }

    public static function buscarPorUsuarioId(int $usuarioId): ?array
    {
        $db = Database::getInstance();
        $stmt = $db->prepare(<<<SQL
            SELECT
                usuario.id AS usuario_id,
                usuario.cargo AS usuario_cargo,
                usuario.email AS usuario_email,
                pessoa.id AS pessoa_id,
                pessoa.nome AS pessoa_nome
            FROM usuario
            INNER JOIN pessoa ON pessoa.usuario_id = usuario.id
            WHERE usuario.id = :usuario_id
            LIMIT 1
        SQL);
        $stmt->execute([':usuario_id' => $usuarioId]);

        $usuario = $stmt->fetch();
        return $usuario ?: null;
    }
}
