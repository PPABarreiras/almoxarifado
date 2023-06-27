create database almoxarifado;

CREATE TABLE materiais (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  quantidade INT NOT NULL,
  fornecedor VARCHAR(100) NOT NULL,
  data_aquisicao DATE NOT NULL
);

INSERT INTO materiais (nome, quantidade, fornecedor, data_aquisicao)
VALUES

  ('Lápis', 100, 'Fornecedor A', '2023-06-27'),
  ('Régua', 150, 'Fornecedor D', '2023-06-27'),
  ('Papel A4', 100, 'Fornecedor A', '2023-06-27'),
  ('Pincéis', 70, 'Fornecedor B', '2023-06-29'),
  ('Lápis', 100, 'Fornecedor A', '2023-06-27'),
  ('Pastas', 100, 'Fornecedor A', '2023-06-23'),
  ('Caneta', 50, 'Fornecedor B', '2023-06-28'),
  ('Borracha', 200, 'Fornecedor A', '2023-06-29'),
  ('Caderno', 80, 'Fornecedor C', '2023-06-30'),
  ('Apontador', 50, 'Fornecedor C', '2023-06-29'),
  ('Agenda', 40, 'Fornecedor C', '2023-06-30'),
  ('Calculadora', 200, 'Fornecedor A', '2023-06-29'),
  ('Compasso', 200, 'Fornecedor A', '2023-06-29'),
  ('Clips', 200, 'Fornecedor A', '2023-06-29'),
  ('Grampeador', 200, 'Fornecedor A', '2023-06-29'),
  ('Giz de cera', 200, 'Fornecedor A', '2023-06-29'),
  ('Tinta Guache', 200, 'Fornecedor A', '2023-06-29'),
  ('Papel Sulfite', 200, 'Fornecedor A', '2023-06-29');
  
  -- verificar se é necessario criar um campo extra para adicionar qual categoria se adequa a cada produto 
  
select * from materiais;

CREATE TABLE solicitacoes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  material_id INT,
  quantidade INT NOT NULL,
  data_solicitacao DATE NOT NULL,
  status ENUM('pendente', 'aprovado', 'rejeitado') NOT NULL,
  FOREIGN KEY (material_id) REFERENCES materiais(id)
); 
-- ligação com a tabela material... 
-- o enum vai ser como uma especie de condição, que o numero de caracteres será executado a partir de uma 'condição' como vou fazer isso? ainda não sei 
-- verificar como devo adicionar os status para cada solicitação ( provavel que tenha uma ligação -key na tabaela de materiais )? 

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
  ('Ferramentas');
  
  -- fazer a verificação dos campos repetidos no select ( não deve ser repetidos) 
  
  select * from categorias; 
  
CREATE TABLE funcionarios (
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
id_area int not null
);

CREATE TABLE fornecedores (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco VARCHAR(200) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL
);



