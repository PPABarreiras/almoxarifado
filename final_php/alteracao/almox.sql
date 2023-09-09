create database almoxarifado;

CREATE TABLE categorias (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL
);

INSERT INTO categorias (nome)
VALUES
  ('Eletrônicos'),
  ('Papelaria'),
  ('Limpeza'),
  ('Ferramentas'),
  ('Alimentos'),
  ('CAMED'),
  ('Vestiario');

CREATE TABLE materiais (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  categoria_id varchar(100) NOT NULL,
  quantidade INT NOT NULL,
  fornecedor_id  VARCHAR(100) NOT NULL,
  data_aquisicao DATE NOT NULL,
   FOREIGN KEY (categoria_id) REFERENCES categorias(id),
   FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id)
);

   ALTER TABLE materiais ADD fornecedor_id INT;
   ALTER TABLE materiais ADD FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id);

);

INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao) -- sendo feito o insert de acordo com cada categoria (eletronicos)
VALUES
  ('Smartphone', 1, 50, 3, '2023-08-29'),
  ('Notebook', 1, 30, 5, '2023-08-29');

INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao)
VALUES --(Papelaria)
  ('Caneta Esferográfica', 2, 200, 3, '2023-08-29'),
  ('Bloco de Notas', 2, 150, 6, '2023-08-29');
  
INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao)
VALUES --(material de limpeza)
  ('Detergente', 3, 100, 4, '2023-08-29'),
  ('Pano de Limpeza', 3, 200, 5, '2023-08-29');

INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao)
VALUES --(ferramentas)
  ('Chave de Fenda', 4, 50, 7, '2023-08-29'),
  ('Martelo', 4, 30, 8, '2023-08-29');

INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao)
VALUES --(alimentos)
  ('Arroz', 5, 100, 9, '2023-08-29'),
  ('Feijão', 5, 150, 10, '2023-08-29');

INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao)
VALUES --(CAMED)
  ('Dipirona', 6, 20, 11, '2023-08-29'),
  ('Termômetro', 6, 30, 12, '2023-08-29');

INSERT INTO materiais (nome, categoria_id, quantidade, fornecedor_id, data_aquisicao)
VALUES --(vestiario)
  ('Farda', 7, 200, 13, '2023-08-29'),
  ('Meias', 7, 150, 14, '2023-08-29');

  CREATE TABLE fornecedores (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco VARCHAR(200) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL
);

INSERT INTO fornecedores (nome, endereco, telefone, email)
VALUES
  ('Fornecedor A', 'Rua A, 123', '(11) 1234-5678', 'fornecedor_a@example.com'),
  ('Fornecedor B', 'Rua B, 456', '(22) 9876-5432', 'fornecedor_b@example.com'),
  ('Fornecedor C', 'Rua C, 789', '(33) 5555-5555', 'fornecedor_c@example.com');

CREATE TABLE solicitacoes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  material_id INT,
  quantidade INT NOT NULL,
  data_solicitacao DATE NOT NULL,
  status ENUM('pendente', 'aprovado', 'rejeitado', 'null') NOT NULL,
  FOREIGN KEY (material_id) REFERENCES materiais(id)
); 
  
CREATE TABLE funcionarios ( -- ser utilizada no cadastro de novos funcionarios 
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  cargo VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,  
  telefone VARCHAR(20) NOT NULL
);

create table usuarios (
id_user int auto_increment key,
nome_user varchar (30),
senha varchar(20),
cpf varchar (15) unique, 
email_user varchar (120),
telefone varchar (16),
nivel int, 
);

create table departamento (
  id_departamento int auto_increment primary key,
  departamento varchar(50)
);

insert into departamento (departamento) values ('Servidor'), ('Professor'), ('Aluno'), ('DEPAD'),('DEPEN'),('CONSUP'),('DETEC'), ('CAENS'), ('CAMED');

SELECT * FROM fornecedores;
SELECT * FROM materiais;
SELECT * FROM categorias;
SELECT * FROM funcionarios;
SELECT * FROM usuarios;
select * FROM departamento; 

