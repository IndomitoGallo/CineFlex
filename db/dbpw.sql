CREATE DATABASE IF NOT EXISTS dbpw;

USE dbpw;

CREATE TABLE utente(
	username varchar(30) PRIMARY KEY,
    nome varchar(20) NOT NULL,
    cognome varchar(20) NOT NULL,
	password varchar(8) NOT NULL,
	email varchar(30) NOT NULL
)Engine=InnoDB;

CREATE TABLE commento(
	id int auto_increment PRIMARY KEY,
    username varchar(30) NOT NULL,
	nota varchar(255) NOT NULL,
    data datetime NOT NULL,
	FOREIGN KEY (username) REFERENCES utenti(username)
    	ON DELETE CASCADE,
    	ON UPDATE CASCADE
)Engine=InnoDB;

CREATE TABLE film(
	titolo varchar(30) PRIMARY KEY,
	regista varchar(30) NOT NULL,
    attori varchar(100) NOT NULL,
    anno int NOT NULL,
    durata int NOT NULL,
    genere varchar(15) NOT NULL
)Engine=InnoDB;