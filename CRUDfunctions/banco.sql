-- Criação da base de dados
CREATE DATABASE IF NOT EXISTS biblioteca;

-- Usar a base de dados criada
USE biblioteca;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL
);

-- Tabela de autores
CREATE TABLE IF NOT EXISTS autor (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nacionalidade VARCHAR(100)
);

-- Tabela de livros
CREATE TABLE IF NOT EXISTS livros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    ano_publicacao INT,
    autor_id INT,
    FOREIGN KEY (autor_id) REFERENCES autor(id)
);


-- Inserindo dados na tabela usuario
INSERT INTO usuario (nome, email, senha) VALUES
('João Silva', 'joao@example.com', 'senha123'),
('Maria Souza', 'maria@example.com', 'abc456'),
('Carlos Oliveira', 'carlos@example.com', 'xyz789');

-- Inserindo dados na tabela autor
INSERT INTO autor (nome, nacionalidade) VALUES
('Machado de Assis', 'Brasileira'),
('Jane Austen', 'Inglesa'),
('Gabriel García Márquez', 'Colombiana'),
('George Orwell', 'Inglesa'),
('Haruki Murakami', 'Japonesa'),
('J.K. Rowling', 'Britânica'),
('Stephen King', 'Americana');

-- Inserindo dados na tabela livros
INSERT INTO livros (titulo, ano_publicacao, autor_id) VALUES
('Dom Casmurro', 1899, 1),
('Orgulho e Preconceito', 1813, 2),
('Cem Anos de Solidão', 1967, 3),
('1984', 1949, 4),
('Norwegian Wood', 1987, 5),
('Harry Potter e a Pedra Filosofal', 1997, 6),
('It', 1986, 7),
('Memórias Póstumas de Brás Cubas', 1881, 1),
('Emma', 1815, 2),
('O Amor nos Tempos do Cólera', 1985, 3),
('A Revolução dos Bichos', 1945, 4),
('1Q84', 2009, 5),
('Harry Potter e a Câmara Secreta', 1998, 6),
('O Iluminado', 1977, 7),
('O Alienista', 1882, 1),
('Razão e Sensibilidade', 1811, 2),
('Crônica de uma Morte Anunciada', 1981, 3),
('A Fazenda dos Animais', 1945, 4),
('Norwegian Wood', 1987, 5),
('Harry Potter e o Prisioneiro de Azkaban', 1999, 6);
