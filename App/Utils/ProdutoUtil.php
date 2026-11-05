<?php

namespace Utils;

class ProdutoUtil
{
    public static function prepararParaListagem(array $produto): array
    {
        $quantidade = (int) $produto['quantidade'];
        $precoVenda = (float) $produto['preco_venda'];

        return [
            'id' => (int) $produto['id'],
            'nome' => (string) $produto['nome'],
            'codigo_barras' => $produto['codigo_barras'] ?: '-',
            'quantidade' => $quantidade,
            'unidade_medida' => (string) $produto['unidade_medida'],
            'preco_compra' => self::formatarMoeda((float) $produto['preco_compra']),
            'preco_venda' => self::formatarMoeda($precoVenda),
            'total_estoque' => self::formatarMoeda($quantidade * $precoVenda),
        ];
    }

    private static function formatarMoeda(float $valor): string
    {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}
