<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Cadastrar Usuário</title>

    <style>
        <?php include_once "./Public/CSS/global.css"; ?>
        <?php include_once "./Public/CSS/produtos-listagem.css"; ?>
        <?php include_once "./Public/CSS/cadastro_pessoa.css"; ?>
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
                <a href="<?= BASE_URL ?>login" class="menu__item menu__item--sair">
                    <span class="material-symbols-outlined">logout</span>
                    Sair
                </a>
            </div>
        </div>
    </nav>

    <!-- CONTEÚDO PRINCIPAL -->
    <main class="cadastro-pessoa">
        <section class="cadastro-pessoa__card">
            <h1 class="cadastro-pessoa__titulo">Cadastrar Usuário</h1>

            <form action="" method="POST">
                <div class="cadastro-pessoa__campo">
                    <label for="nome" class="campo__label">Nome:</label>
                    <input type="text" id="nome" name="nome" class="campo__input" required>
                </div>

                <div class="cadastro-pessoa__campo">
                    <label for="cpf" class="campo__label">CPF:</label>
                    <input type="text" id="cpf" name="cpf" class="campo__input" required>
                </div>

                <div class="cadastro-pessoa__linha">
                    <div class="cadastro-pessoa__campo">
                        <label for="data_nascimento" class="campo__label">Data de nascimento:</label>
                        <input type="text" id="data_nascimento" name="data_nascimento" class="campo__input" placeholder="dd/mm/aaaa">
                    </div>

                    <div class="cadastro-pessoa__campo">
                        <label for="cargo" class="campo__label">Cargo:</label>
                        <input type="text" id="cargo" name="cargo" class="campo__input">
                    </div>
                </div>

                <div class="cadastro-pessoa__acoes">
                    <a href="<?= BASE_URL ?>home" class="cadastro-pessoa__botao cadastro-pessoa__botao--voltar">Voltar</a>
                    <button type="submit" class="cadastro-pessoa__botao cadastro-pessoa__botao--confirmar">Confirmar</button>
                </div>
            </form>
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

