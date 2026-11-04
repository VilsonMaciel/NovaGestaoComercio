<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Estoque</title>

    <style>
        <?php include_once './Public/CSS/global.css'; ?>
        <?php include_once './Public/CSS/produtos-listagem.css'; ?>
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="<?= BASE_URL ?>home" class="navbar__logo">
            <span class="logo__n">N</span>ovaGestao
        </a>

        <div class="navbar__usuario">
            <button class="usuario__botao" id="btnUsuario" aria-label="Menu do usuário">
                <span class="material-symbols-outlined usuario__icone">person</span>
            </button>
            <div class="usuario__menu" id="menuUsuario">
                <a href="<?= BASE_URL ?>produtos/cadastro" class="menu__item">
                    <span class="material-symbols-outlined">add_box</span>
                    Novo Produto
                </a>
                <a href="<?= BASE_URL ?>relatorio/index" class="menu__item">
                    <span class="material-symbols-outlined">description</span>
                    Gerar Relatório
                </a>
                <a href="#" class="menu__item">
                    <span class="material-symbols-outlined">person_add</span>
                    Cadastrar Usuário
                </a>
                <hr class="menu__divisor">
                <a href="<?= BASE_URL ?>login" class="menu__item menu__item--sair">
                    <span class="material-symbols-outlined">logout</span>
                    Sair
                </a>
            </div>
        </div>
    </nav>

    <main class="container">
        <h1 class="pagina__titulo">Estoque</h1>
        <?php foreach ($avisos['aviso_sucesso'] ?? [] as $aviso): ?>
            <p role="status"><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endforeach; ?>
        <?php foreach ($avisos['aviso_erro'] ?? [] as $aviso): ?>
            <p role="alert"><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></p>
        <?php endforeach; ?>

        <section class="acoes">
            <div class="acoes__esquerda">
                <button class="botao botao--filtro" id="btnFiltro">
                    <span class="material-symbols-outlined">tune</span>
                    Filtro
                    <span class="material-symbols-outlined">arrow_drop_down</span>
                </button>

                <form action="<?= BASE_URL ?>produtos/listagem" class="acoes__busca" method="GET">
                    <label for="campoBusca" class="busca__label">Busca:</label>
                    <input type="search" id="campoBusca" class="busca__input" name="busca" value="<?= htmlspecialchars($busca, ENT_QUOTES, 'UTF-8') ?>" placeholder="Nome ou código de barras">
                    <button class="busca__botao" type="submit" aria-label="Buscar">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </form>
            </div>

            <div class="acoes__direita">
                <a href="<?= BASE_URL ?>produtos/cadastro" class="botao botao--primario">
                    <span class="material-symbols-outlined">add</span>
                    Novo Produto
                </a>
                <a href="<?= BASE_URL ?>relatorio/index" class="botao botao--primario">
                    <span class="material-symbols-outlined">description</span>
                    Gerar Relatório
                </a>
            </div>
        </section>

        <section class="tabela-container">
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Código de barras</th>
                        <th>Quantidade</th>
                        <th>Unidade</th>
                        <th>Preço de compra</th>
                        <th>Preço de venda</th>
                        <th>Total em estoque</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($produtos)): ?>
                        <tr>
                            <td colspan="8">Nenhum produto cadastrado.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($produtos as $produto): ?>
                            <tr>
                                <td><?= htmlspecialchars($produto['nome'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($produto['codigo_barras'] ?: '-', ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= $produto['quantidade'] ?></td>
                                <td><?= htmlspecialchars($produto['unidade_medida'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($produto['preco_compra'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($produto['preco_venda'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($produto['total_estoque'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td class="tabela__acoes">
                                    <button class="acao__botao acao__editar" type="button" title="Editar" data-produto-id="<?= $produto['id'] ?>">
                                        <span class="material-symbols-outlined">edit</span>
                                    </button>
                                    <button class="acao__botao acao__deletar" type="button" title="Excluir" data-produto-id="<?= $produto['id'] ?>">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
        <?php if ($paginacao): ?>
            <nav class="paginacao" aria-label="Paginação de produtos">
                <?php if ($paginacao['anterior']): ?>
                    <a href="<?= htmlspecialchars($paginacao['anterior'], ENT_QUOTES, 'UTF-8') ?>">Anterior</a>
                <?php endif; ?>

                <?php foreach ($paginacao['paginas'] as $paginaItem): ?>
                    <a class="<?= $paginaItem['atual'] ? 'paginacao__pagina--ativa' : '' ?>" href="<?= htmlspecialchars($paginaItem['url'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= $paginaItem['numero'] ?>
                    </a>
                <?php endforeach; ?>

                <?php if ($paginacao['proxima']): ?>
                    <a href="<?= htmlspecialchars($paginacao['proxima'], ENT_QUOTES, 'UTF-8') ?>">Próxima</a>
                <?php endif; ?>
            </nav>
        <?php endif; ?>
    </main>

    <script>
        <?php include_once './Public/JS/produtos-listagem.js'; ?>
    </script>
</body>

</html>
