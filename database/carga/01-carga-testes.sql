INSERT INTO usuario (senha, cargo) VALUES
('hash_senha_adm123', 'ADM'),           -- ID 1
('hash_senha_func123', 'FUNCIONARIO'), -- ID 2
('hash_senha_func456', 'FUNCIONARIO'); -- ID 3

INSERT INTO pessoa (nome, data_nascimento, cpf, usuario_id) VALUES
('Carlos Eduardo Silva', '1988-05-14', '12345678901', 1),
('Mariana Oliveira Santos', '1995-10-22', '98765432100', 2),
('Lucas Gabriel Pereira', '2000-03-08', '45678912344', 3);

INSERT INTO produto (nome, quantidade, preco_compra, preco_venda, descricao, codigo_barras, unidade_medida, pessoa_alteracao_id) VALUES
('Arroz Integral 1kg', 50, 4.50, 7.90, 'Arroz integral tipo 1', '7891000000001', 'UN', 1),
('Feijão Preto 1kg', 40, 5.20, 8.50, 'Feijão preto tipo 1', '7891000000002', 'UN', 1),
('Açúcar Refinado 1kg', 30, 2.80, 4.90, 'Açúcar refinado especial', '7891000000003', 'UN', 2),
('Café Torrado e Moído 500g', 60, 12.00, 18.90, 'Café tradicional', '7891000000004', 'UN', 2),
('Óleo de Soja 900ml', 80, 4.10, 6.50, 'Óleo vegetal de soja', '7891000000005', 'UN', 3),
('Leite Integral 1L', 100, 3.20, 5.10, 'Leite UHT integral', '7891000000006', 'L', 1),
('Farinha de Trigo 1kg', 25, 3.00, 4.80, 'Farinha de trigo tipo 1', '7891000000007', 'UN', 3),
('Detergente Líquido 500ml', 120, 1.50, 2.90, 'Detergente neutro', '7891000000008', 'UN', 2),
('Sabão em Pó 1kg', 45, 8.50, 14.20, 'Sabão em pó para roupas', '7891000000009', 'UN', 1),
('Papel Higiênico 12un', 35, 12.50, 19.90, 'Papel higiênico folha dupla', '7891000000010', 'CX', 2),
('Água Mineral 1.5L', 150, 1.20, 3.00, 'Água mineral sem gás', '7891000000011', 'L', 3),
('Refrigerante Guaraná 2L', 60, 4.00, 7.50, 'Refrigerante de guaraná', '7891000000012', 'UN', 1),
('Biscoito Recheado 140g', 90, 1.80, 3.20, 'Biscoito recheado de chocolate', '7891000000013', 'UN', 2),
('Manteiga com Sal 200g', 20, 7.00, 11.50, 'Manteiga extra com sal', '7891000000014', 'UN', 3),
('Queijo Mussarela', 15, 28.00, 42.00, 'Queijo mussarela peça/fatiado', '7891000000015', 'KG', 1),
('Presunto Cozido', 18, 18.00, 29.90, 'Presunto cozido fatiado', '7891000000016', 'KG', 2),
('Macarrão Espaguete 500g', 70, 2.50, 4.30, 'Macarrão de sêmola espaguete', '7891000000017', 'UN', 3),
('Molho de Tomate 340g', 85, 1.60, 3.10, 'Molho de tomate tradicional', '7891000000018', 'UN', 1),
('Creme de Leite 200g', 50, 2.30, 4.00, 'Creme de leite leve', '7891000000019', 'UN', 2),
('Chocolates Sortidos 250g', 40, 9.00, 15.00, 'Caixa de bombons sortidos', '7891000000020', 'CX', 3);

INSERT INTO movimentacao (produto_id, pessoa_id, tipo, quantidade, observacao) VALUES
(1, 1, 'ENTRADA', 50, 'Recebimento de lote inicial do fornecedor'),
(2, 2, 'ENTRADA', 40, 'Abastecimento de estoque do fornecedor'),
(3, 3, 'ENTRADA', 30, 'Compra quinzenal'),
(6, 2, 'SAIDA', 5, 'Venda ao cliente - Nota Fiscal #1001'),
(10, 1, 'SAIDA', 2, 'Uso interno / Venda PDV'),
(15, 3, 'ENTRADA', 15, 'Entrada de laticínios refrigeração'),
(11, 2, 'SAIDA', 10, 'Venda para evento local');