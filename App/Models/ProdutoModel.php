<?php

namespace Models;

use Core\Database;
use PDO;

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

    public static function listar(string $busca, int $limite, int $offset): array
    {
        $db = Database::getInstance();
        $sql = <<<SQL
            SELECT
                id,
                nome,
                codigo_barras,
                quantidade,
                unidade_medida,
                preco_compra,
                preco_venda
            FROM produto
        SQL;

        if ($busca !== '') {
            $sql .= ' WHERE nome LIKE :busca_nome OR codigo_barras LIKE :busca_codigo';
        }

        $sql .= ' ORDER BY nome ASC, id DESC LIMIT :limite OFFSET :offset';
        $stmt = $db->prepare($sql);

        if ($busca !== '') {
            $termoBusca = '%' . $busca . '%';
            $stmt->bindValue(':busca_nome', $termoBusca);
            $stmt->bindValue(':busca_codigo', $termoBusca);
        }

        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function contar(string $busca): int
    {
        $db = Database::getInstance();
        $sql = 'SELECT COUNT(*) FROM produto';

        if ($busca !== '') {
            $sql .= ' WHERE nome LIKE :busca_nome OR codigo_barras LIKE :busca_codigo';
        }

        $stmt = $db->prepare($sql);

        if ($busca !== '') {
            $termoBusca = '%' . $busca . '%';
            $stmt->bindValue(':busca_nome', $termoBusca);
            $stmt->bindValue(':busca_codigo', $termoBusca);
        }

        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
}
