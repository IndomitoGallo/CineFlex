CREATE TABLE dbpw;

USE dbpw;

CREATE TABLE utenti(
	username varchar(15) PRIMARY KEY,
	password varchar(8) NOT NULL,
	email varchar(25) NOT NULL,
)Engine=InnoDB;

CREATE TABLE commenti(
	id int auto_increment PRIMARY KEY,
	testo varchar(250) NOT NULL,
	user varchar(15) NOT NULL,
	FOREIGN KEY (user) REFERENCES utenti(username)
    	ON DELETE NO ACTION,
    	ON UPDATE NO ACTION
)Engine=InnoDB;

CREATE TABLE film(
	id int auto_increment PRIMARY KEY,
	titolo varchar(45) NOT NULL,
	regista varchar(25) NOT NULL,
	scheda varchar(250) NOT NULL
)Engine=InnoDB;