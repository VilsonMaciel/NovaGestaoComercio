<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Estoque</title>

    <style>
        <?php include_once "./Public/CSS/global.css"; ?>
        <?php include_once "./Public/CSS/produtos-listagem.css"; ?>
    </style>
</head>

<body>
    <!-- NAVBAR -->
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

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="container">
        <h1 class="pagina__titulo">Estoque</h1>

        <!-- BARRA DE AÇÕES -->
        <section class="acoes">
            <div class="acoes__esquerda">
                <button class="botao botao--filtro" id="btnFiltro">
                    <span class="material-symbols-outlined">tune</span>
                    Filtro
                    <span class="material-symbols-outlined">arrow_drop_down</span>
                </button>

                <div class="acoes__busca">
                    <label for="campoBusca" class="busca__label">Busca:</label>
                    <input type="text" id="campoBusca" class="busca__input" placeholder="Pesquisar produto...">
                    <button class="busca__botao" aria-label="Buscar">
                        <span class="material-symbols-outlined">search</span>
                    </button>
                </div>
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

        <!-- TABELA DE PRODUTOS -->
        <section class="tabela-container">
            <table class="tabela">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Data Entrada</th>
                        <th>Qtd</th>
                        <th>Data Saída</th>
                        <th>Qtd</th>
                        <th>Preço(uni)</th>
                        <th>Total</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Linhas de exemplo para visualização -->
                    <tr>
                        <td>Teclado Mecânico</td>
                        <td>15/10/2026</td>
                        <td>50</td>
                        <td>20/10/2026</td>
                        <td>12</td>
                        <td>R$ 289,90</td>
                        <td>R$ 11.016,20</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Mouse Gamer</td>
                        <td>10/10/2026</td>
                        <td>80</td>
                        <td>18/10/2026</td>
                        <td>25</td>
                        <td>R$ 159,90</td>
                        <td>R$ 8.794,50</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Monitor 24"</td>
                        <td>05/10/2026</td>
                        <td>30</td>
                        <td>15/10/2026</td>
                        <td>8</td>
                        <td>R$ 899,90</td>
                        <td>R$ 19.797,80</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Headset Bluetooth</td>
                        <td>01/10/2026</td>
                        <td>100</td>
                        <td>22/10/2026</td>
                        <td>45</td>
                        <td>R$ 199,90</td>
                        <td>R$ 10.994,50</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Webcam HD</td>
                        <td>28/09/2026</td>
                        <td>60</td>
                        <td>19/10/2026</td>
                        <td>20</td>
                        <td>R$ 249,90</td>
                        <td>R$ 9.996,00</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Cadeira Ergonômica</td>
                        <td>25/09/2026</td>
                        <td>15</td>
                        <td>16/10/2026</td>
                        <td>5</td>
                        <td>R$ 1.299,90</td>
                        <td>R$ 12.999,00</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Hub USB-C</td>
                        <td>20/09/2026</td>
                        <td>200</td>
                        <td>24/10/2026</td>
                        <td>75</td>
                        <td>R$ 89,90</td>
                        <td>R$ 11.237,50</td>
                        <td class="tabela__acoes">
                            <button class="acao__botao acao__editar" title="Editar">
                                <span class="material-symbols-outlined">edit</span>
                            </button>
                            <button class="acao__botao acao__deletar" title="Excluir">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <script>
        // Toggle do menu do usuário
        const btnUsuario = document.getElementById('btnUsuario');
        const menuUsuario = document.getElementById('menuUsuario');

        btnUsuario.addEventListener('click', function (e) {
            e.stopPropagation();
            menuUsuario.classList.toggle('usuario__menu--ativo');
        });

        // Fechar menu ao clicar fora
        document.addEventListener('click', function (e) {
            if (!menuUsuario.contains(e.target) && !btnUsuario.contains(e.target)) {
                menuUsuario.classList.remove('usuario__menu--ativo');
            }
        });

        // Fechar menu com tecla Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                menuUsuario.classList.remove('usuario__menu--ativo');
            }
        });
    </script>
</body>

</html>
