<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Estoque</title>

    <style>
        <?php
        include_once './public/css/global.css';
        include_once './public/css/botao.css';
        include_once './public/css/formulario.css';
        ?>
    </style>
</head>

<body>
    <div id="content" class="container">
        <main class="cadastro">
            <header class="cadastro__cabecalho">
                <h1 class="cadastro__produto">Produto</h1>
            </header>
            <form action="<?= BASE_URL ?>produto/cadastro/salvar" class="cadastro__formulario" method="POST">
                <div class="campo">
                    <label class="campo__etiqueta" for="nome">Nome</label>
                    <input class="campo__input" inputmode="text" type="text" name="nome" required id="nome"
                        placeholder="Insira um nome" value="" maxlength="60">
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="descricao">Descrição</label>
                    <textarea class="campo__input campo--textarea" name="descricao" id="descricao" placeholder="Insira uma descricao"></textarea>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="codigo">Código de Barras</label>
                    <input class="campo__input" inputmode="text" type="text" name="codigo" id="codigo"
                        placeholder="Insira código de barras" value="" maxlength="14">
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="preco_compra">Preço de Compra</label>
                    <input class="campo__input" inputmode="number" type="number" name="preco_compra" required
                        id="preco_compra" placeholder="Insira o preco de compra" value="">
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="preco_venda">Preço de Venda</label>
                    <input class="campo__input" inputmode="number" type="number" name="preco_venda" required
                        id="preco_venda" placeholder="Insira o preco de venda" value="">
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="quantidade">Quantidade</label>
                    <input class="campo__input" inputmode="number" type="number" name="quantidade" required
                        id="quantidade" placeholder="Insira a quantidade" value="">
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="unidade_medida">Unidade de Medida</label>
                    <select class="campo__input" name="unidade_medida" id="unidade_medida"
                        required>
                        <option invalid class="options-list" value="">Insira a unidade de medida</option>
                        <option class="options-list" value="UN">Unidade</option>
                        <option class="options-list" value="KG">Quilograma</option>
                        <option class="options-list" value="L">Litro</option>
                        <option class="options-list" value="CX">Caixa</option>
                    </select>
                </div>

                <footer class="formulario__rodape">
                    <a href="" class="botao botao--cancelar">
                        Cancelar
                    </a>
                    <button class="botao botao--salvar" type="submit">Salvar</button>
                </footer>
            </form>
        </main>
    </div>
    <script>
        <?php

        ?>
    </script>
</body>