CREATE DATABASE bd_bytelogic;

USE bd_bytelogic;

CREATE TABLE usuario(
    cpf CHAR(11) PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    admin BOOLEAN DEFAULT FALSE
);

CREATE TABLE categoria(
    nome_categoria VARCHAR(100) PRIMARY KEY
);

CREATE TABLE assunto(
    assunto VARCHAR(50) PRIMARY KEY
);

CREATE TABLE questao(
    id_questao INT AUTO_INCREMENT PRIMARY KEY,
    enunciado_questao TEXT NOT NULL,
    nome_categoria VARCHAR(100),
    assunto VARCHAR(50),
    FOREIGN KEY(nome_categoria) REFERENCES categoria(nome_categoria),
    FOREIGN KEY(assunto) REFERENCES assunto(assunto)
);

CREATE TABLE alternativas(
    id_alternativa CHAR(1),
    id_questao INT,
    enunciado_alternativa TEXT NOT NULL,
    PRIMARY KEY(id_alternativa,id_questao),
    FOREIGN KEY(id_questao) REFERENCES questao(id_questao) ON DELETE CASCADE
);

CREATE TABLE alternativa_correta(
    id_questao INT PRIMARY KEY,
    alternativa_correta CHAR(1),
    FOREIGN KEY(id_questao) REFERENCES questao(id_questao) ON DELETE CASCADE,
    FOREIGN KEY(alternativa_correta,id_questao) REFERENCES alternativas(id_alternativa,id_questao)
);

CREATE TABLE resposta_usuario(
    id_resposta INT AUTO_INCREMENT PRIMARY KEY,
    usuario_cpf CHAR(11),
    id_questao INT,
    resposta CHAR(1),
    data_resposta DATE,
    UNIQUE(usuario_cpf,id_questao),
    FOREIGN KEY(usuario_cpf) REFERENCES usuario(cpf) ON DELETE CASCADE,
    FOREIGN KEY(id_questao) REFERENCES questao(id_questao)
);

CREATE VIEW visao_acertos_usuario AS SELECT u.nome, ru.usuario_cpf, q.id_questao, ru.resposta, 
ac.alternativa_correta, CASE WHEN ru.resposta = ac.alternativa_correta THEN 'Correta'
ELSE 'Incorreta' END AS status_resposta FROM resposta_usuario ru INNER JOIN usuario u
ON ru.usuario_cpf=u.cpf INNER JOIN questao q ON ru.id_questao=q.id_questao
INNER JOIN alternativa_correta ac ON q.id_questao=ac.id_questao;

CREATE PROCEDURE cadastrar_questao(
    IN p_enunciado TEXT,
    IN p_categoria VARCHAR(100),
    IN p_assunto VARCHAR(50),
    IN p_altA TEXT,
    IN p_altB TEXT,
    IN p_altC TEXT,
    IN p_altD TEXT,
    IN p_altE TEXT,
    IN p_correta CHAR(1)
)

BEGIN DECLARE v_id INT; 

INSERT INTO questao(enunciado_questao, nome_categoria, assunto)
VALUES(p_enunciado,p_categoria,p_assunto);

SET v_id = LAST_INSERT_ID();

INSERT INTO alternativas VALUES ('A',v_id,p_altA), ('B',v_id,p_altB), ('C',v_id,p_altC), ('D',v_id,p_altD),
('E',v_id,p_altE); 

INSERT INTO alternativa_correta VALUES (v_id,p_correta);

CREATE PROCEDURE cadastrar_resposta(
    IN p_cpf CHAR(11),
    IN p_id INT,
    IN p_resposta CHAR(1)
)

BEGIN IF EXISTS(
    SELECT * FROM resposta_usuario WHERE usuario_cpf=p_cpf AND id_questao=p_id
)

THEN UPDATE resposta_usuario SET resposta=p_resposta, data_resposta=CURDATE() WHERE usuario_cpf=p_cpf
AND id_questao=p_id;

ELSE INSERT INTO resposta_usuario(
    usuario_cpf,
    id_questao,
    resposta,
    data_resposta
) VALUES(
    p_cpf,
    p_id,
    p_resposta,
    CURDATE()
);

INSERT INTO categoria VALUES ('Iniciante'),('Intermediário'),('Avançado');
INSERT INTO assunto VALUES ('Variáveis'), ('Operadores'), ('Condicional'), ('Repetição'), ('Listas'), ('Funções');
INSERT INTO usuario VALUES('00000000001','jonas@admin.com','jonas123','Jonas', TRUE);