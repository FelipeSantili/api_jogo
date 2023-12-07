-- Active: 1695837195664@@localhost@3306@jogos_slim
CREATE TABLE jogos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(70) NOT NULL,
    empresa VARCHAR(70) NOT NULL,
    anoLancamento INT NOT NULL,
    categoria VARCHAR(1) NOT NULL, /* A=Ação, R=RPG, V=Aventura, P=Puzzle, F=FPS*/
    plataforma VARCHAR(1) NOT NULL, /* P=Playstation, C=PC, X=Xbox, N=Nintendo , M=Multiplataforma*/
    capaJogo VARCHAR(1000) NOT NULL,
    CONSTRAINT pk_jogos PRIMARY KEY (id)
);

/* INSERTs jogos */
INSERT INTO jogos (nome, empresa, anoLancamento, categoria, plataforma, capaJogo) 
VALUES ('League of Legends', 'Riot Games', 2009, 'R', 'C', 'https://pentagram-production.imgix.net/cc7fa9e7-bf44-4438-a132-6df2b9664660/EMO_LOL_02.jpg?rect=0%2C0%2C1440%2C1512&w=640&crop=1&fm=jpg&q=70&auto=format&fit=crop&h=672');

INSERT INTO jogos (nome, empresa, anoLancamento, categoria, plataforma, capaJogo) 
VALUES ('Fortnite', 'Epic Games', 2017, 'A', 'M', 'https://upload.wikimedia.org/wikipedia/commons/7/7c/Fortnite_F_lettermark_logo.png');
