CREATE DATABASE todoapp;

CREATE TABLE korisnik (
id int unsigned not null auto_increment primary key,
ime varchar(30) NOT NULL,
prezime varchar(30) NOT NULL,
email varchar(60) NOT NULL,
lozinka varchar(255) NOT NULL,
token varchar(255) NOT NULL,
active boolean NOT NULL,
datum_registracije timestamp NOT NULL,
zadnji_login datetime NOT NULL
) DEFAULT CHARACTER SET utf8 ENGINE=INNODB;

CREATE TABLE todo (
id int unsigned not null auto_increment primary key,
naziv_liste varchar(30) not null,
datum_izrade datetime not null,
IDkorisnika int unsigned not null,
foreign key(IDkorisnika) references korisnik(id) on delete cascade) DEFAULT CHARACTER SET utf8 ENGINE=INNODB;

CREATE TABLE task (
id int unsigned not null auto_increment primary key,
naziv_taska varchar(30) not null,
prioritet enum('low', 'normal', 'high') not null,
rok datetime not null,
status varchar(15) not null DEFAULT 'nije zavrseno',
todoID int unsigned not null,
foreign key(todoID) references todo(id) on delete cascade) DEFAULT CHARACTER SET utf8 ENGINE=INNODB;

