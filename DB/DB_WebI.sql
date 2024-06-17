CREATE DATABASE `Sticks&Rocks`;
USE	`Sticks&Rocks`;

CREATE TABLE usuarios 
(
id INT AUTO_INCREMENT PRIMARY KEY,
nome CHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
cel VARCHAR(11) NOT NULL,
cpf VARCHAR(11) NOT NULL,
nasc DATE NOT NULL,
senha VARCHAR(16) NOT NULL,
confSenha VARCHAR(16) NOT NULL,
role ENUM('admin', 'usuario') NOT NULL DEFAULT 'usuario'
);

CREATE TABLE produtos
(
id INT AUTO_INCREMENT PRIMARY KEY,
nome CHAR(15) NOT NULL,
categoria ENUM('Pedra','Graveto') NOT NULL,
preco DECIMAL(4,2) NOT NULL,
estoque INT NOT NULL,
descricao VARCHAR(50)
);

INSERT INTO produtos (nome,categoria,preco,estoque,descricao) 
VALUES ("Pedra do SEPT",'Pedra',01.99,3256,"ISTO E UMA PEDRA COMUM DO SEPT"),
('GRAVETO DE TESTE','Graveto',05.75,5432,"GRAVETO PARA TESTES MT IRADO ELE");


INSERT INTO usuarios VALUE
(0,'Adminstrador','nsouadmin',0,0,'0000-00-00','admin123','admin123','admin');

INSERT INTO usuarios (nome, email, cel, cpf, nasc, senha, confSenha) VALUES
('João Silva', 'joao@example.com', 123456789, 12345678901, '1990-05-01', 'senha123', 'senha123'),
('Maria Souza', 'maria@example.com', 987654321, 98765432109, '1985-10-15', 'senha456', 'senha456'),
('Pedro Santos', 'pedro@example.com', 111222333, 11122233307, '1982-03-20', 'senha789', 'senha789'),
('Ana Oliveira', 'ana@example.com', 555666777, 55566677703, '1995-07-12', 'senhaabc', 'senhaabc'),
('Luiz Costa', 'luiz@example.com', 999888777, 99988877705, '1988-12-30', 'senhadef', 'senhadef'),
('Camila Rocha', 'camila@example.com', 444333222, 44433322204, '1992-08-25', 'senhaghi', 'senhaghi'),
('Rafaela Pereira', 'rafaela@example.com', 777888999, 77788899908, '1987-06-05', 'senhajkl', 'senhajkl'),
('Bruno Carvalho', 'bruno@example.com', 666555444, 66655544406, '1993-11-18', 'senhamno', 'senhamno'),
('Carolina Lima', 'carolina@example.com', 222333444, 22233344402, '1980-09-22', 'senhapqr', 'senhapqr'),
('Gabriel Almeida', 'gabriel@example.com', 888999000, 88899900000, '1984-04-09', 'senhastu', 'senhastu'),
('Fernanda Fernandes', 'fernanda@example.com', 333222111, 33322211106, '1998-02-14', 'senhavwx', 'senhavwx'),
('Daniel Martins', 'daniel@example.com', 777666555, 77766655505, '1991-01-28', 'senhazab', 'senhazab'),
('Juliana Oliveira', 'juliana@example.com', 111999888, 11199988802, '1986-07-03', 'senha123', 'senha123'),
('Marcos Pereira', 'marcos@example.com', 555444333, 55544433301, '1989-12-17', 'senha456', 'senha456'),
('Lucas Rodrigues', 'lucas@example.com', 222111000, 22211100005, '1994-08-10', 'senha789', 'senha789'),
('Aline Silva', 'aline@example.com', 999888777, 99988877702, '1983-03-24', 'senhaabc', 'senhaabc'),
('Vinicius Santos', 'vinicius@example.com', 333222111, 33322211102, '1997-11-05', 'senhadef', 'senhadef'),
('Mariana Lima', 'mariana@example.com', 888777666, 88877766601, '1981-10-28', 'senhaghi', 'senhaghi'),
('Paula Oliveira', 'paula@example.com', 666555444, 66655544402, '1996-04-20', 'senhajkl', 'senhajkl'),
('Felipe Costa', 'felipe@example.com', 111000999, 11100099901, '1989-09-13', 'senhamno', 'senhamno'),
('Gustavo Almeida', 'gustavo@example.com', 777666555, 77766655502, '1992-02-26', 'senhapqr', 'senhapqr'),
('Natália Carvalho', 'natalia@example.com', 555444333, 55544433302, '1987-05-08', 'senhastu', 'senhastu'),
('Roberta Ferreira', 'roberta@example.com', 222111000, 22211100002, '1995-01-31', 'senhavwx', 'senhavwx'),
('Thiago Martins', 'thiago@example.com', 888777666, 88877766602, '1984-06-23', 'senhazab', 'senhazab');
