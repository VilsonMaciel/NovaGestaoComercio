<?php

namespace Models;

use Core\Database;

class ProdutoModel
{
    /** Cria um produto e retorna seu identificador. */
    public static function criar(array $produto): int
    {
        $db = Database::getInstance();
        $sql = 'INSERT INTO produto (
                    nome, descricao, codigo_barras, preco_compra, preco_venda,
                    quantidade, unidade_medida
                ) VALUES (
                    :nome, :descricao, :codigo_barras, :preco_compra, :preco_venda,
                    :quantidade, :unidade_medida
                )';

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':nome' => $produto['nome'],
            ':descricao' => $produto['descricao'] !== '' ? $produto['descricao'] : null,
            ':codigo_barras' => $produto['codigo_barras'] !== '' ? $produto['codigo_barras'] : null,
            ':preco_compra' => $produto['preco_compra'],
            ':preco_venda' => $produto['preco_venda'],
            ':quantidade' => (int) $produto['quantidade'],
            ':unidade_medida' => $produto['unidade_medida'],
        ]);

        return (int) $db->lastInsertId();
    }
}
