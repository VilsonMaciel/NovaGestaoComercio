<?php

namespace Controllers;

use Core\Controller;
use Models\ProdutoModel;
use PDOException;
use Utils\AvisoUtil;
use Utils\FormUtil;

class ProdutoController extends Controller
{
    public function listagem()
    {
        $this->view("produtos/listagem", [
            'avisos' => AvisoUtil::obterAviso(),
        ]);
    }

    public function cadastro()
    {
        $rascunho = FormUtil::consumirRascunho('produto_cadastro') ?? [];

        $this->view("produtos/cadastro", [
            'dados' => $rascunho['dados'] ?? [],
            'erros' => $rascunho['erros'] ?? [],
            'avisos' => AvisoUtil::obterAviso(),
        ]);
    }

    public function salvar()
    {
        $dados = $this->dadosDoFormulario($_POST);

        $erros = $this->validar($dados);
        if ($erros) {
            $this->voltarComErros($dados, $erros);
        }

        try {
            ProdutoModel::criar($dados);
        } catch (PDOException $e) {
            // Não exponha detalhes de banco de dados ao usuário.
            AvisoUtil::erro('Não foi possível salvar o produto. Tente novamente.');
            $this->voltarComErros($dados, []);
        }

        AvisoUtil::sucesso('Produto cadastrado com sucesso.');
        $this->redirect('/produtos/listagem');
    }

    private function dadosDoFormulario(array $entrada): array
    {
        return [
            'nome' => trim((string) ($entrada['nome'] ?? '')),
            'descricao' => trim((string) ($entrada['descricao'] ?? '')),
            'codigo_barras' => preg_replace('/\s+/', '', (string) ($entrada['codigo'] ?? '')),
            'preco_compra' => $this->normalizarDecimal($entrada['preco_compra'] ?? ''),
            'preco_venda' => $this->normalizarDecimal($entrada['preco_venda'] ?? ''),
            'quantidade' => trim((string) ($entrada['quantidade'] ?? '')),
            'unidade_medida' => (string) ($entrada['unidade_medida'] ?? ''),
        ];
    }

    private function validar(array $dados): array
    {
        $erros = [];

        if ($dados['nome'] === '') {
            $erros['nome'] = 'Informe o nome do produto.';
        } elseif (mb_strlen($dados['nome']) > 60) {
            $erros['nome'] = 'O nome deve ter no máximo 60 caracteres.';
        }

        if ($dados['codigo_barras'] !== '' && !preg_match('/^\d{1,14}$/', $dados['codigo_barras'])) {
            $erros['codigo'] = 'O código de barras deve conter somente números, com até 14 dígitos.';
        }

        foreach (['preco_compra' => 'preço de compra', 'preco_venda' => 'preço de venda'] as $campo => $rotulo) {
            if (!preg_match('/^\d{1,8}(?:\.\d{1,2})?$/', $dados[$campo])) {
                $erros[$campo] = "Informe um {$rotulo} válido.";
            }
        }

        if (filter_var($dados['quantidade'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]) === false) {
            $erros['quantidade'] = 'Informe uma quantidade inteira igual ou maior que zero.';
        }

        if (!in_array($dados['unidade_medida'], ['UN', 'KG', 'L', 'CX'], true)) {
            $erros['unidade_medida'] = 'Selecione uma unidade de medida válida.';
        }

        return $erros;
    }

    private function normalizarDecimal(mixed $valor): string
    {
        return str_replace(',', '.', trim((string) $valor));
    }

    private function voltarComErros(array $dados, array $erros): void
    {
        FormUtil::salvarRascunho('produto_cadastro', compact('dados', 'erros'));
        $this->redirect('/produtos/cadastro');
    }

}

