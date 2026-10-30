<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Estoque</title>

    <style>
        <?php
        $cssGlobal = __DIR__ . '/../../../../Public/CSS/global.css';
        $cssListagem = __DIR__ . '/../../../../Public/CSS/produtos-listagem.css';

        if (file_exists($cssGlobal)) {
            include_once $cssGlobal;
        }
        if (file_exists($cssListagem)) {
            include_once $cssListagem;
        }
        ?>
    </style>
</head>

<body>
    <nav class="navbar">
        <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>home" class="navbar__logo">
            <span class="logo__n">N</span>ovaGestão
        </a>

        <div class="navbar__usuario">
            <button class="usuario__botao" id="btnUsuario" aria-label="Menu do usuário">
                <span class="material-symbols-outlined usuario__icone">person</span>
            </button>
            <div class="usuario__menu" id="menuUsuario">
                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro" class="menu__item">
                    <span class="material-symbols-outlined">add_box</span>
                    Novo Produto
                </a>
                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>relatorio/index" class="menu__item">
                    <span class="material-symbols-outlined">description</span>
                    Gerar Relatório
                </a>
                <a href="#" class="menu__item">
                    <span class="material-symbols-outlined">person_add</span>
                    Cadastrar Usuário
                </a>
                <hr class="menu__divisor">
                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>login" class="menu__item">
                    <span class="material-symbols-outlined">logout</span>
                    Sair
                </a>
            </div>
        </div>
    </nav>
    <main class="container pagina-listagem">
        <header class="pagina-listagem__cabecalho">
            <h1 class="pagina-listagem__titulo">Estoque</h1>

            <div class="busca">
                <div class="busca__filtro-container">
                    <button type="button" class="botao botao--filtro" id="btnFiltro">
                        <span class="material-symbols-outlined filtro__icone">tune</span>
                        Filtro
                        <span class="material-symbols-outlined filtro__icone">arrow_drop_down</span>
                    </button>

                    <div id="cardFiltro" class="form__filtro">
                        <header class="filtro__header">
                            <div class="filtro__titulo-container">
                                <span class="material-symbols-outlined">tune</span>
                                <h3>Filtros</h3>
                            </div>
                            <span class="material-symbols-outlined filtro__resetar" id="btnLimparFiltros" title="Limpar filtros">restart_alt</span>
                        </header>
                        <div class="filtro__conteudo">
                            <div class="filtro__secao">
                                <label class="filtro__label" for="filtroUnidade">Unidade de Medida</label>
                                <select id="filtroUnidade" class="filtro__select">
                                    <option value="">Todas as unidades</option>
                                    <option value="UN">UN - Unidade</option>
                                    <option value="KG">KG - Quilograma</option>
                                    <option value="L">L - Litro</option>
                                    <option value="CX">CX - Caixa</option>
                                </select>
                            </div>
                            <div class="filtro__secao">
                                <label class="filtro__label" for="filtroOrdenacao">Ordenar por</label>
                                <select id="filtroOrdenacao" class="filtro__select">
                                    <option value="padrao">Padrão</option>
                                    <option value="nome-asc">Nome (A - Z)</option>
                                    <option value="nome-desc">Nome (Z - A)</option>
                                    <option value="preco-asc">Menor Preço Venda</option>
                                    <option value="preco-desc">Maior Preço Venda</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="busca__formulario">
                    <label for="campoBusca" class="busca__label">Busca:</label>
                    <div class="busca__campo">
                        <input type="text" id="campoBusca" placeholder="Pesquisar produto..." class="busca__input">
                        <span class="material-symbols-outlined busca__icone">search</span>
                    </div>
                </div>

                <div class="busca__acoes">
                    <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro" class="botao botao--icone">
                        Novo Produto
                    </a>
                    <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>relatorio/index" class="botao botao--icone">
                        Gerar Relatório
                    </a>
                </div>
            </div>
        </header>

        <!-- TABELA DE PRODUTOS -->
        <section class="tabela__container pagina-listagem__conteudo">
            <table class="tabela" id="tabelaEstoque">
                <thead class="tabela__cabecalho">
                    <tr class="tabela__linha">
                        <th class="tabela__titulo">Nome</th>
                        <th class="tabela__titulo">Descrição</th>
                        <th class="tabela__titulo tabela__titulo--centro">Código de barras</th>
                        <th class="tabela__titulo tabela__titulo--direita">Preço de compra</th>
                        <th class="tabela__titulo tabela__titulo--direita">Preço venda</th>
                        <th class="tabela__titulo tabela__titulo--centro">Unidade</th>
                        <th class="tabela__titulo tabela__titulo--direita">Total</th>
                        <th class="tabela__titulo tabela__titulo--acoes">Ações</th>
                    </tr>
                </thead>
                <tbody class="tabela__corpo" id="tabelaCorpo">
                    <tr class="tabela__linha" data-nome="teclado mecânico" data-descricao="switch blue abnt2 rgb" data-codigo="7891234567890" data-unidade="UN" data-preco="289.90">
                        <td class="tabela__celula tabela__celula--nome">Teclado Mecânico</td>
                        <td class="tabela__celula tabela__celula--descricao">Switch Blue ABNT2 com iluminação RGB</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7891234567890</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 145,00</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 289,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">UN</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 11.016,20</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=1" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="tabela__linha" data-nome="mouse gamer" data-descricao="sensor óptico 16000 dpi 6 botões" data-codigo="7899876543210" data-unidade="UN" data-preco="159.90">
                        <td class="tabela__celula tabela__celula--nome">Mouse Gamer</td>
                        <td class="tabela__celula tabela__celula--descricao">Sensor óptico 16000 DPI, 6 botões programáveis</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7899876543210</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 79,90</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 159,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">UN</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 8.794,50</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=2" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="tabela__linha" data-nome="monitor 24" data-descricao="ips 75hz hdmi full hd" data-codigo="7894561230123" data-unidade="UN" data-preco="899.90">
                        <td class="tabela__celula tabela__celula--nome">Monitor 24"</td>
                        <td class="tabela__celula tabela__celula--descricao">Painel IPS 75Hz Full HD 1080p ultrafino</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7894561230123</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 490,00</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 899,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">UN</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 19.797,80</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=3" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="tabela__linha" data-nome="headset bluetooth" data-descricao="som surround microfone cancelamento ruído" data-codigo="7896541239874" data-unidade="UN" data-preco="199.90">
                        <td class="tabela__celula tabela__celula--nome">Headset Bluetooth</td>
                        <td class="tabela__celula tabela__celula--descricao">Drivers 50mm estéreo com microfone retrátil</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7896541239874</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 95,00</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 199,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">UN</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 10.994,50</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=4" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Linha 5 (Azul Pastel) -->
                    <tr class="tabela__linha" data-nome="cabo de rede cat6" data-descricao="bobina 305m 100% cobre homologado" data-codigo="7893216549871" data-unidade="CX" data-preco="429.90">
                        <td class="tabela__celula tabela__celula--nome">Cabo de Rede CAT6</td>
                        <td class="tabela__celula tabela__celula--descricao">Bobina 305m 100% cobre para redes gigabit</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7893216549871</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 210,00</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 429,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">CX</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 8.598,00</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=5" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="tabela__linha" data-nome="álcool isopropílico" data-descricao="solvente limpeza eletrônicos 99.8%" data-codigo="7898521479632" data-unidade="L" data-preco="54.90">
                        <td class="tabela__celula tabela__celula--nome">Álcool Isopropílico</td>
                        <td class="tabela__celula tabela__celula--descricao">Solvente puro para limpeza técnica de placas e componentes</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7898521479632</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 24,50</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 54,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">L</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 2.745,00</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=6" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr class="tabela__linha" data-nome="pasta térmica prata" data-descricao="alta condutividade cpu gpu 10g" data-codigo="7891593574862" data-unidade="UN" data-preco="39.90">
                        <td class="tabela__celula tabela__celula--nome">Pasta Térmica Prata</td>
                        <td class="tabela__celula tabela__celula--descricao">Alta condutividade térmica 4.5 W/m-k para CPUs</td>
                        <td class="tabela__celula tabela__celula--centro tabela__celula--codigo">7891593574862</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 18,00</td>
                        <td class="tabela__celula tabela__celula--direita">R$ 39,90</td>
                        <td class="tabela__celula tabela__celula--centro">
                            <span class="unidade-badge">UN</span>
                        </td>
                        <td class="tabela__celula tabela__celula--direita tabela__celula--total">R$ 1.995,00</td>
                        <td class="tabela__celula tabela__celula--acoes">
                            <div class="tabela__acoes-wrapper">
                                <a href="<?= defined('BASE_URL') ? BASE_URL : '/' ?>produtos/cadastro?id=7" class="botao botao--acao-tabela editar" title="Editar">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                                <button type="button" class="botao botao--acao-tabela remover acao__deletar" title="Excluir">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
