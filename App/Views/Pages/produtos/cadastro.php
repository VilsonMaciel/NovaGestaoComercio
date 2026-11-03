<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Estoque</title>

    <style>
        <?php
        include_once './Public/CSS/global.css';
        include_once './Public/CSS/botao.css';
        include_once './Public/CSS/formulario.css';
        ?>
    </style>
</head>

<body>
    <div id="content" class="container">
        <main class="cadastro">
            <header class="cadastro__cabecalho">
                <h1 class="cadastro__produto">Produto</h1>
            </header>
            <?php foreach ($avisos['aviso_sucesso'] ?? [] as $aviso): ?>
                <p role="status"><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
            <?php foreach ($avisos['aviso_erro'] ?? [] as $aviso): ?>
                <p role="alert"><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endforeach; ?>
            <?php if (!empty($erros['geral'])): ?>
                <p role="alert"><?= htmlspecialchars($erros['geral'], ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
            <form action="<?= BASE_URL ?>produtos/cadastro/salvar" class="cadastro__formulario" method="POST">
                <div class="campo">
                    <label class="campo__etiqueta" for="nome">Nome</label>
                    <input class="campo__input" inputmode="text" type="text" name="nome" required id="nome"
                        placeholder="Insira um nome" value="<?= htmlspecialchars($dados['nome'] ?? '', ENT_QUOTES, 'UTF-8') ?>" maxlength="60">
                    <?php if (!empty($erros['nome'])): ?><small role="alert"><?= htmlspecialchars($erros['nome'], ENT_QUOTES, 'UTF-8') ?></small><?php endif; ?>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="descricao">Descrição</label>
                    <textarea class="campo__input campo--textarea" name="descricao" id="descricao" placeholder="Insira uma descricao"><?= htmlspecialchars($dados['descricao'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="codigo">Código de Barras</label>
                    <input class="campo__input" inputmode="text" type="text" name="codigo" id="codigo"
                        placeholder="Insira código de barras" value="<?= htmlspecialchars($dados['codigo_barras'] ?? '', ENT_QUOTES, 'UTF-8') ?>" maxlength="14">
                    <?php if (!empty($erros['codigo'])): ?><small role="alert"><?= htmlspecialchars($erros['codigo'], ENT_QUOTES, 'UTF-8') ?></small><?php endif; ?>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="preco_compra">Preço de Compra</label>
                    <input class="campo__input" inputmode="number" type="number" name="preco_compra" required
                        id="preco_compra" placeholder="Insira o preco de compra" value="<?= htmlspecialchars($dados['preco_compra'] ?? '', ENT_QUOTES, 'UTF-8') ?>" min="0" step="0.01">
                    <?php if (!empty($erros['preco_compra'])): ?><small role="alert"><?= htmlspecialchars($erros['preco_compra'], ENT_QUOTES, 'UTF-8') ?></small><?php endif; ?>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="preco_venda">Preço de Venda</label>
                    <input class="campo__input" inputmode="number" type="number" name="preco_venda" required
                        id="preco_venda" placeholder="Insira o preco de venda" value="<?= htmlspecialchars($dados['preco_venda'] ?? '', ENT_QUOTES, 'UTF-8') ?>" min="0" step="0.01">
                    <?php if (!empty($erros['preco_venda'])): ?><small role="alert"><?= htmlspecialchars($erros['preco_venda'], ENT_QUOTES, 'UTF-8') ?></small><?php endif; ?>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="quantidade">Quantidade</label>
                    <input class="campo__input" inputmode="number" type="number" name="quantidade" required
                        id="quantidade" placeholder="Insira a quantidade" value="<?= htmlspecialchars($dados['quantidade'] ?? '', ENT_QUOTES, 'UTF-8') ?>" min="0" step="1">
                    <?php if (!empty($erros['quantidade'])): ?><small role="alert"><?= htmlspecialchars($erros['quantidade'], ENT_QUOTES, 'UTF-8') ?></small><?php endif; ?>
                </div>
                <div class="campo">
                    <label class="campo__etiqueta" for="unidade_medida">Unidade de Medida</label>
                    <select class="campo__input" name="unidade_medida" id="unidade_medida"
                        required>
                        <option class="options-list" value="">Insira a unidade de medida</option>
                        <option class="options-list" value="UN" <?= ($dados['unidade_medida'] ?? '') === 'UN' ? 'selected' : '' ?>>Unidade</option>
                        <option class="options-list" value="KG" <?= ($dados['unidade_medida'] ?? '') === 'KG' ? 'selected' : '' ?>>Quilograma</option>
                        <option class="options-list" value="L" <?= ($dados['unidade_medida'] ?? '') === 'L' ? 'selected' : '' ?>>Litro</option>
                        <option class="options-list" value="CX" <?= ($dados['unidade_medida'] ?? '') === 'CX' ? 'selected' : '' ?>>Caixa</option>
                    </select>
                    <?php if (!empty($erros['unidade_medida'])): ?><small role="alert"><?= htmlspecialchars($erros['unidade_medida'], ENT_QUOTES, 'UTF-8') ?></small><?php endif; ?>
                </div>

                <footer class="formulario__rodape">
                    <a href="<?= BASE_URL ?>produtos/listagem" class="botao botao--cancelar">
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
