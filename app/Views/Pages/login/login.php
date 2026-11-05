<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaGestão - Login</title>

    <style>
        <?php include_once "./Public/CSS/global.css"; ?>
        <?php include_once "./Public/CSS/produtos-listagem.css"; ?>
        <?php include_once "./Public/CSS/login.css"; ?>
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
                <a href="<?= BASE_URL ?>login" class="menu__item menu__item--sair">
                    <span class="material-symbols-outlined">logout</span>
                    Sair
                </a>
            </div>
        </div>
    </nav>

    <main class="login">
        <section class="login__card">
            <h1 class="login__titulo">Login</h1>

            <?php include_once './App/Views/Components/avisos.php'; ?>

            <form action="<?= BASE_URL ?>login/autenticar" method="POST">
                <div class="login__campo">
                    <label for="email" class="campo__label">E-mail:</label>
                    <input type="email" id="email" name="email" class="campo__input" value="<?= htmlspecialchars($dados['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" autocomplete="email" required>
                </div>

                <div class="login__campo">
                    <label for="senha" class="campo__label">Senha:</label>
                    <input type="password" id="senha" name="senha" class="campo__input" autocomplete="current-password" required>
                </div>

                <div class="login__acoes">
                    <a href="<?= BASE_URL ?>home" class="login__botao login__botao--voltar">Voltar</a>
                    <button type="submit" class="login__botao login__botao--confirmar">Confirmar</button>
                </div>
            </form>
        </section>
    </main>
    <script>
        <?php include_once './Public/JS/avisos.js'; ?>
    </script>
</body>
</html>

