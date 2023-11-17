create database if not exists galeria;
use galeria;
CREATE TABLE IF NOT EXISTS users(
    id SERIAL primary key,
    nome VARCHAR(50) NOT NULL,
    sobrenome VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    avatar VARCHAR(200) NOT NULL DEFAULT "./assets/img/default.png",
    createdAt TIMESTAMP NOT NULL DEFAULT current_timestamp()
);
CREATE TABLE IF NOT EXISTS imagem(
    id SERIAL PRIMARY KEY,
    caminho VARCHAR(200) NOT NULL,
    descricao VARCHAR(50),
    userId INT NOT NULL,
    categoria INT UNSIGNED NOT NULL DEFAULT 1,
    FOREIGN KEY(userId) REFERENCES users(id),
    FOREIGN KEY(categoria) REFERENCES categoria(id)
);
CREATE TABLE IF NOT EXISTS categoria(
    id SERIAL PRIMARY KEY,
    userId INT UNSIGNED NOT NULL,
    nome VARCHAR(50) NOT NULL,
    FOREIGN KEY (userId) REFERENCES users(id)
);