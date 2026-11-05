ALTER TABLE pessoa
ADD CONSTRAINT uk_pessoa_usuario UNIQUE (usuario_id);

CREATE TABLE IF NOT EXISTS movimentacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto_id INT NOT NULL,
    pessoa_id INT NOT NULL,
    tipo ENUM('ENTRADA', 'SAIDA') NOT NULL,
    quantidade INT NOT NULL,
    data_hora DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    observacao VARCHAR(255),

    CONSTRAINT chk_movimentacao_quantidade
        CHECK (quantidade > 0),

    CONSTRAINT fk_movimentacao_produto
        FOREIGN KEY (produto_id) REFERENCES produto(id),

    CONSTRAINT fk_movimentacao_pessoa
        FOREIGN KEY (pessoa_id) REFERENCES pessoa(id)
);