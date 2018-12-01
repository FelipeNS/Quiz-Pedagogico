DROP DATABASE IF EXISTS quizPedag;

CREATE DATABASE quizPedag;

USE quizPedag;

DROP TABLE IF EXISTS login;
DROP TABLE IF EXISTS pergunta;
DROP TABLE IF EXISTS alternativa;
DROP TABLE IF EXISTS teste;
DROP TABLE IF EXISTS rank;

CREATE TABLE login (
	log_id int NOT NULL AUTO_INCREMENT,
	log_usuario varchar(50) NOT NULL,
	log_nome varchar(100) NOT NULL,
	log_senha varchar(15) NOT NULL,
	log_nivel boolean NOT NULL,
	log_dat_cad date NOT NULL,
	Log_logado boolean NOT NULL DEFAULT 0,
	PRIMARY KEY (log_id)
);

CREATE TABLE categoria (
	cat_id int NOT NULL AUTO_INCREMENT,
	cat_materia varchar(100) NOT NULL,
	PRIMARY KEY (cat_id)
);

CREATE TABLE pergunta (
	perg_id int NOT NULL AUTO_INCREMENT,
	perg_enunciado varchar(255) NOT NULL,
	perg_cat_id int NOT NULL,
	PRIMARY KEY (perg_id),
	FOREIGN KEY (perg_cat_id) REFERENCES categoria (cat_id)
);

CREATE TABLE alternativa (
	alt_id int NOT NULL AUTO_INCREMENT,
	alt_texto varchar(255) NOT NULL,
	alt_perg_id int NOT NULL,
	alt_resposta boolean NOT NULL,
	PRIMARY KEY (alt_id),
	FOREIGN KEY (alt_perg_id) REFERENCES pergunta (perg_id)
);

CREATE TABLE teste (
	test_id int NOT NULL AUTO_INCREMENT,
	test_acerto boolean NOT NULL,
	test_log_id int NOT NULL,
	test_perg_id int NOT NULL,
	test_data date NOT NULL,
	PRIMARY KEY (test_id),
	FOREIGN KEY (test_log_id) REFERENCES login(log_id),
	FOREIGN KEY (test_perg_id) REFERENCES pergunta(perg_id)
);

CREATE TABLE rank (
	rank_id int NOT NULL AUTO_INCREMENT,
	rank_pontuacao int NOT NULL,
	rank_log_id int NOT NULL,
	rank_data date NOT NULL,
	PRIMARY KEY (rank_id),
	FOREIGN KEY (rank_log_id) REFERENCES login(log_id)
);


-- Usuário Padrao
INSERT INTO login (log_usuario, log_nome, log_senha, log_nivel, log_dat_cad) VALUES ("admin", "Administrador", "admin", 0, "2017-10-10");


-- Categorias de perguntas
INSERT INTO categoria (cat_materia) VALUES ("Matematica");
INSERT INTO categoria (cat_materia) VALUES ("Historia");
INSERT INTO categoria (cat_materia) VALUES ("Geografia");


-- Perguntas
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Onde aconteceu a inconfidência mineira?',2);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Qual foi a data da morte de Tiradentes?',2);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Quando foi proclamada a independência do Brasil?',2);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Qual a maior bacia hidrográfica do mundo ?',3);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Forma de relevo igualmente elevado:',3);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Porcão cercada por água:',3);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Um livro tem 394 páginas, Fernando já leu 156. Quantas páginas ele ainda precisa ler para terminar seu livro?',1);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Quanto é 2015 - 150?',1);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Ganhei 120 balas, dei 45 para Maria e 36 para Marina, com quantas balas fiquei?',1);
INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES ('Vovô tem 70 anos, vovó tem 8 anos a menos. Quantos anos os dois têm juntos?',1);


-- Alternativas
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Ouro Preto - Minas Gerais',1,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Belo Horizonte - Minas Gerais',1,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Paraty - Rio de Janeiro',1,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Barueri - São Paulo',1,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('21 de abril de 1792',2,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('20 de agosto de 1800',2,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('18 de setembro de 1992',2,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('01 de janeiro de 1699',2,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('07 de setembro de 1822',3,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('16 de dezembro de 1810',3,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('07 de setembro de 1816',3,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('14 de novembro de 1821',3,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Bacia Amazônica',4,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Bacia do Paraná',4,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Bacia do Nordeste',4,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Bacia do Rio de Janeiro',4,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Planalto',5,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Planície',5,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Ilha',5,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Bacia',5,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Ilha',6,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Montanha',6,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Praia',6,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('Depressão',6,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('238 páginas',7,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('198 páginas',7,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('159 paginas',7,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('200 páginas',7,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('1865',8,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('1870',8,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('1978',8,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('1997',8,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('39 balas',9,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('40 balas',9,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('28 balas',9,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('35 balas',9,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('132',10,1);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('135',10,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('129',10,0);
INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES ('123',10,0);