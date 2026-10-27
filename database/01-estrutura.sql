CREATE DATABASE IF NOT EXISTS nova_gestao_db;

USE nova_gestao_db;

CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) DEFAULT NULL,
    cargo ENUM('ADM', 'FUNCIONÁRIO')
);

CREATE TABLE IF NOT EXISTS pessoa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    data_nascimento DATE,
    cpf VARCHAR(11) UNIQUE NOT NULL,
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id)
);

CREATE TABLE IF NOT EXISTS produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(60),
    quantidade INT NOT NULL DEFAULT 0,
    preco_compra DECIMAL(10,2),
    preco_venda DECIMAL(10,2),
    descricao TEXT,
    codigo_barras VARCHAR(14),
    unidade_medida ENUM('UN', 'KG', 'L', 'CX'),
    pessoa_alteracao_id INT,
    FOREIGN KEY (pessoa_alteracao_id) REFERENCES pessoa(id)
);