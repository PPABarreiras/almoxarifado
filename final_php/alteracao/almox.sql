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

CREATE TABLE fornecedores (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco VARCHAR(200) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL
);

INSERT INTO materiais (nome, quantidade, data_aquisicao, categoria_id, fornecedor_id)
VALUES

  ('Lápis', 100, '2023-06-27',1, 3), -- a categoria é semelhante, pois pode ser gravadosjuntos, já os fornecedor pode
  ('Régua', 150, '2023-06-27', 1, 5),
  ('Papel A4', 100, '2023-06-27', 1, 7),
  ('Pincéis', 70, '2023-06-29', 1, 9),
  ('Lápis', 100, '2023-06-27', 1, 1),
  ('Pastas', 100, '2023-06-23', 1, 4),
  ('Caneta', 50, '2023-06-28', 1, 8),
  ('Borracha', 200, '2023-06-29', 1), 8,
  ('Giz de cera', 200, '2023-06-29',1, 13),
  ('Tinta Guache', 200, '2023-06-29', 1, 2),
  ('Papel Sulfite', 200, '2023-06-29', 1, 1);

    -- existe a necessidade de já fazer os insert com os dados do almoxarifado? ou é só necessario criar um pararametro para o usuario/adm poder inserir os dados necessarios.

  CREATE TABLE fornecedores (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  endereco VARCHAR(200) NOT NULL,
  telefone VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL
);

CREATE TABLE solicitacoes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  material_id INT,
  quantidade INT NOT NULL,
  data_solicitacao DATE NOT NULL,
  status ENUM('pendente', 'aprovado', 'rejeitado', 'null') NOT NULL,
  FOREIGN KEY (material_id) REFERENCES materiais(id)
); 

  -- verificar se é necessario criar um campo extra para adicionar qual categoria se adequa a cada produto 

CREATE TABLE solicitacoes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  material_id INT,
  quantidade INT NOT NULL,
  data_solicitacao DATE NOT NULL,
  status ENUM('pendente', 'aprovado', 'rejeitado') NOT NULL,
  FOREIGN KEY (material_id) REFERENCES materiais(id)
); 
-- verificar como devo adicionar os status para cada solicitação e mostrar essa informação na tela do usuario

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
nivel int, -- definir niveis de privilegio entre os usuarios (1 - professor, 2 - aluno, 3 servidores)
);

SELECT * FROM fornecedores;
SELECT * FROM materiais;
SELECT * FROM categorias;
SELECT * FROM funcionarios;
SELECT * FROM usuarios;

