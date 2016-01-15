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
	nota varchar(500) NOT NULL,
    data datetime NOT NULL,
    film varchar(50) NOT NULL,
	FOREIGN KEY (username) REFERENCES utente(username)
    	ON DELETE CASCADE
    	ON UPDATE CASCADE
)Engine=InnoDB;
