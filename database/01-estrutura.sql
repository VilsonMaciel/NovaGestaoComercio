CREATE DATABASE IF NOT EXISTS nova_gestao_db;

CREATE TABLE IF NOT EXISTS produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(60),
    quantidade INT,
    data_entrada DATE,
    data_saida DATE,
    preco_compra DECIMAL(10,2),
    preco_venda DECIMAL(10,2),
    descricao TEXT,
    codigo_barras VARCHAR(14),
    unidade_medida ENUM("UN", "KG" , "L" , "CX"),
    pessoa_alteracao_id INT,
    FOREIGN KEY (usuario_alteracao_id) REFERENCES pessoa(id)
    );
    
CREATE TABLE pessoa (
    nome VARCHAR(255),
    data_nascimento DATE,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
    );
    
    
CREATE TABLE IF NOT EXISTS usuario (
    id int AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NULL DEFAULT NULL,
    cargo ENUM("ADM", "FUNCIONÁRIO")
);
    