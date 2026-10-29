<style>
    <?php
    include_once './public/css/base/global.css';
    include_once './public/css/components/botao.css';
    include_once './public/css/pages/formularios.css';
    ?>
</style>

<body>
    <div id="content" class="container">
        <main class="cadastro">
            <header class="cadastro__cabecalho">
                <h1 class="cadastro__produto">Produto</h1>
            </header>
            <form action="<?= BASE_URL ?>produto/cadastro/salvar" class="cadastro" method="POST">
                <section class="secao">
                        <div class="campo">
                            <label class="campo__etiqueta" for="nome">Nome</label>
                            <input class="campo__input" inputmode="text" type="text" name="nome" required
                                id="nome" placeholder="Insira um nome"
                                value=""
                                maxlength="60">
                        </div>
                        <div class="campo">
                            <label class="campo__etiqueta" for="descricao">Descrição</label>
                            <input class="campo__input" inputmode="text" type="text" name="descricao"
                                id="descricao" placeholder="Insira uma descricao"
                                value="">
                        </div>
                        <div class="campo">
                            <label class="campo__etiqueta" for="codigo">Código de Barras</label>
                            <input class="campo__input" inputmode="text" type="text" name="codigo" 
                                id="codigo" placeholder="Insira código de barras"
                                value=""
                                maxlength="14">
                        </div>
                        <div class="campo">
                            <label class="campo__etiqueta" for="preco_compra">Preço de Compra</label>
                            <input class="campo__input" inputmode="number" type="number" name="preco_compra" required
                                id="preco_compra" placeholder="Insira o preco de compra"
                                value="">
                        </div>
                        <div class="campo">
                            <label class="campo__etiqueta" for="preco_venda">Preço de Venda</label>
                            <input class="campo__input" inputmode="number" type="number" name="preco_venda" required
                                id="preco_venda" placeholder="Insira o preco de venda"
                                value="">
                        </div>
                        <div class="campo">
                            <label class="campo__etiqueta" for="quantidade">Quantidade</label>
                            <input class="campo__input" inputmode="number" type="number" name="quantidade" required
                                id="quantidade" placeholder="Insira a quantidade"
                                value="">
                        </div>
                        <div class="campo">
                            <label class="campo__etiqueta" for="unidade_medida">Unidade de Medida</label>
                            <select class="campo__input" name="unidade_medida" id="unidade_medida" placeholder="Insira a unidade de medida" required>
                                <option value="UN">Unidade</option>
                                <option value="KG">Quilograma</option>
                                <option value="L">Litro</option>
                                <option value="CX">Caixa</option>
                            </select>
                        </div>
                    </div>
                </section>
                
                <footer class="formulario__rodape">
                    <a href=""
                        class="botao botao--cancelar">
                        Cancelar
                    </a>
                    <button class="botao botao--salvar"
                        type="submit">Salvar</button>
                </footer>
            </form>
        </main>
    </div>
    <script>
        <?php
        
        ?>
    </script>
</body>