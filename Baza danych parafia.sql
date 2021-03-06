CREATE DATABASE parafia;
USE parafia;

CREATE TABLE osoba(
id_osoby INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
imie VARCHAR(40) NOT NULL,
nazwisko VARCHAR(50) NOT NULL,
data_urodzenia DATE,
plec VARCHAR(1) NOT NULL,
zdjecia blob,
opis text,
date_wprowadzenia TIMESTAMP
);

CREATE TABLE kontakty (
id_kontaktu int NOT Null AUTO_INCREMENT PRIMARY KEY,
numer_stacjonarny VARCHAR(12),
numer_komurkowy VARCHAR(12),
email VARCHAR(50),
id_osoby INT UNSIGNED NOT NULL,
FOREIGN KEY (id_osoby)
	REFERENCES osoba(id_osoby)
);


CREATE TABLE adres(
  id_adres INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  id_osoby INT UNSIGNED NOT NULL,
  ulica VARCHAR(40) NOT NULL,
  numer_budynku INT UNSIGNED NOT NULL,
  numer_mieszkania int UNSIGNED,
  kod_pocztowy VARCHAR(6) NOT NULL,
  miasto VARCHAR(40) NOT NULL,
  FOREIGN KEY (id_osoby) REFERENCES osoba(id_osoby)
);

# CREATE TABLE osoba_adres (
# id_osoby INT UNSIGNED NOT NULL,
# id_adres INT UNSIGNED NOT NULL,
#
# 	FOREIGN KEY (id_osoby) REFERENCES osoba(id_osoby),
#      FOREIGN KEY (id_adres) REFERENCES adres(id_adres)
# );

CREATE TABLE pokrewienstwo (
id_rodzica INT UNSIGNED NOT NULL,
id_dziecka INT UNSIGNED NOT NULL,
 FOREIGN KEY(id_rodzica) REFERENCES osoba(id_osoby),
 FOREIGN KEY(id_dziecka)	REFERENCES osoba(id_osoby),
PRIMARY KEY(id_rodzica, id_dziecka)   
);

CREATE TABLE cmentarz(
x INT NOT NULL CHECK ( x BETWEEN 1 AND 100 ),
y INT NOT  NULL CHECK ( Y BETWEEN 1 AND 50 ),
Od_wynajete DATE NOT NULL,
do_wynajtete DATE NOT NULL,
id_osoby INT UNSIGNED NOT NULL,
FOREIGN KEY (id_osoby) REFERENCES osoba(id_osoby),
PRIMARY KEY (x, y)
);

CREATE TABLE pochowany (
x INT NOT NULL CHECK ( x BETWEEN 1 AND 100 ),
y INT NOT  NULL CHECK ( Y BETWEEN 1 AND 50 ),
imie VARCHAR(30) NOT NULL,
nazwisko VARCHAR(50) NOT NULL,
data_urodzenia DATE,
data_smierci DATE NOT NULL,
PRIMARY KEY (x, y),
FOREIGN KEY (x, y) REFERENCES cmentarz(x, y)
);

CREATE TABLE datki_osoba (
id_osoby INT UNSIGNED,
kwota DEC (10, 2) NOT NULL,
data DATE NOT NULL,
FOREIGN KEY (id_osoby) REFERENCES osoba(id_osoby)
);

INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Maciej', 'Jawor', '1986-01-01', 'M', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Łukasz', 'Gwózdz', '1975-02-01', 'M', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Katarzyna', 'Brochowska', '1990-03-15', 'K', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Agnieszka', 'Ząbek', '1966-04-30', 'K', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Asia', 'Kurnik', '1990-05-31', 'K', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Zbigniew', 'Mały', '1969-07-30', 'K', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL,'Juliana', 'Kowalska', '1950-08-30', 'K', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Andrzej', 'Kubaski', '1944-09-07', 'M', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Anna','Symonowicz', '1933-10-31', 'K', NULL);
INSERT INTO osoba (id_osoby, imie, nazwisko, data_urodzenia, plec, date_wprowadzenia) VALUES (NULL, 'Joanna', 'Nowak', '1933-10-12', 'K', NULL);

INSERT INTO cmentarz (x, y, Od_wynajete, do_wynajtete, id_osoby) VALUES (1, 1, curdate(), '2050-01-01', 2);
INSERT INTO cmentarz (x, y, Od_wynajete, do_wynajtete, id_osoby) VALUES (2, 1, '2000-10-10', '2025-10-10', 1);
INSERT INTO cmentarz (x, y, Od_wynajete, do_wynajtete, id_osoby) VALUES (3, 5, '1900-01-01', '2015-10-10', 2);
INSERT INTO cmentarz (x, y, Od_wynajete, do_wynajtete, id_osoby) VALUES (32, 31, '1996-12-12', '2100-12-11', 3);
INSERT INTO cmentarz (x, y, Od_wynajete, do_wynajtete, id_osoby) VALUES (14, 17, '2016-01-01', '2025-10-10', 4);

INSERT INTO adres (id_adres, id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (NULL, '1', 'Kijowska', 10, 16, '40-123',  'Katowice');
INSERT INTO adres (id_adres, id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (NULL, '2', 'Miejska', 123, NULL, '41-223', 'Katowice');
INSERT INTO adres (id_adres, id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (NULL, '3', 'Staromiejska', 1, 345, '42-654', 'Katowice');
INSERT INTO adres (id_adres, id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (NULL, '4', 'Śląska', 2, NULL, '40-033', 'Katowice');
INSERT INTO adres (id_adres, id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (NULL, '5', '3 Maja', 10, 2, '48-123', 'Katowice');
INSERT INTO adres (id_adres, id_osoby, ulica, numer_budynku, numer_mieszkania, kod_pocztowy, miasto) VALUES (NULL, '6', '1 Maja', 987, 89, '40-121',  'Katowice');

# INSERT INTO osoba_adres(id_osoby, id_adres) VALUES (1,2);
# INSERT INTO osoba_adres(id_osoby, id_adres) VALUES (2,4);
# INSERT INTO osoba_adres(id_osoby, id_adres) VALUES (3,1);
# INSERT INTO osoba_adres(id_osoby, id_adres) VALUES (4,6);
# INSERT INTO osoba_adres(id_osoby, id_adres) VALUES (5,5);
# INSERT INTO osoba_adres(id_osoby, id_adres) VALUES (6,3);

INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (1, 1000, '2015-01-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (2, 2000, '2016-01-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (3, 3000, '2015-02-28');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (4, 4000, '2015-10-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (5, 5000, '2014-03-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (6, 6000, '2013-01-01');

INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (1, 7000, '2016-01-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (2, 4000, '2016-05-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (3, 7000, '2015-07-28');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (4, 3000, '2015-11-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (5, 8000, '2014-12-01');
INSERT INTO datki_osoba (id_osoby, kwota, data) VALUES (6, 9000, '2012-09-01');

INSERT INTO kontakty (id_kontaktu, numer_stacjonarny, numer_komurkowy, email, id_osoby) VALUES(NULL, '32-206-10-10', '605-605-605', 'maciej@maciej.pl', 1);
INSERT INTO kontakty (id_kontaktu, numer_stacjonarny, numer_komurkowy, email, id_osoby) VALUES(NULL, NULL, '603-605-610', 'kamil@02.pl', 2);
INSERT INTO kontakty (id_kontaktu, numer_stacjonarny, numer_komurkowy, email, id_osoby) VALUES(NULL, '32-202-17-99', NULL, 'kasia@monet.pl', 3);
INSERT INTO kontakty (id_kontaktu, numer_stacjonarny, numer_komurkowy, email, id_osoby) VALUES(NULL, '32-100-10-10', NULL, NULL, 4);

INSERT INTO pochowany (x, y, imie, nazwisko, data_urodzenia, data_smierci) VALUES (1, 1, 'Gerard', 'Nowak', '1900-01-23' ,'2000-06-04');
INSERT INTO pochowany (x, y, imie, nazwisko, data_urodzenia, data_smierci) VALUES (2, 1, 'Gerard', 'Kowalski', '1912-04-23' ,'1999-02-04');

CREATE VIEW osoby_wiek AS
SELECT imie, nazwisko, 
(YEAR(CURDATE()) - YEAR(data_urodzenia)) - (RIGHT(CURDATE(), 5) < RIGHT(data_urodzenia, 5)) AS wiek,
data_urodzenia
FROM osoba
ORDER BY nazwisko;

CREATE VIEW osoby AS
SELECT o.nazwisko, o.imie
FROM osoba AS o
ORDER BY nazwisko;

CREATE VIEW adres_all AS
SELECT o.nazwisko, o.imie, a.ulica, a.numer_budynku, a.numer_mieszkania, 
a.kod_pocztowy, a.miasto 
FROM osoba AS o
# NATURAL JOIN osoba_adres
NATURAL JOIN adres AS a
ORDER BY nazwisko;

CREATE VIEW datki AS
SELECT o.imie, o.nazwisko, d.kwota, d.data 
FROM osoba AS o
NATURAL JOIN datki_osoba AS d
ORDER BY d.kwota DESC, o.nazwisko ASC;

CREATE VIEW kontakt AS
SELECT o.imie, o.nazwisko, k.numer_komurkowy, k.numer_stacjonarny, k.email
FROM osoba AS o
NATURAL JOIN kontakty AS k
ORDER BY nazwisko;

CREATE VIEW cmientarz AS
SELECT o.imie, o. nazwisko, concat(c.x, ' ', c.y) AS numer, c.Od_wynajete, c.do_wynajtete 
FROM osoba AS o
NATURAL JOIN cmentarz AS c
ORDER BY x, y;

CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(64) NOT NULL,
	email VARCHAR(100) NOT NULL,
	phone_number VARCHAR(13)
);

INSERT  INTO users (firstname, lastname, username, password, email, phone_number) VALUES ('m', 'm', 'm', SHA2("m", 256), 'admin@parafia.com', '+48123456789');
INSERT  INTO users (firstname, lastname, username, password, email, phone_number) VALUES ('Adam', 'Kowalski', 'proboszcz', SHA2("zaq12wsx", 256), 'proboszcz@parafia.com', '+48777777777');
	
/*to chyba przy takiej bazie danych nie ma sensu!*/
	
/* CREATE USER proboszcz IDENTIFIED BY 'zaq12wsx';
GRANT ALL ON parafia.* TO proboszcz WITH GRANT OPTION;

CREATE USER pracownik_kancelari IDENTIFIED BY 'zaq12wsx';
GRANT SELECT ON parafia.* TO pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON adres TO  pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON datki_osoba TO  pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON kontakty TO  pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON miasto TO  pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON osoba TO  pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON osoba_adres TO  pracownik_kancelari;
GRANT UPDATE, INSERT, DELETE ON pokrewienstwo TO  pracownik_kancelari;

CREATE USER pracownik_cmentarza IDENTIFIED BY 'zaq12wsx';
GRANT SELECT, UPDATE, INSERT, DELETE  ON cmentarz TO pracownik_cmentarza;
GRANT SELECT, UPDATE, INSERT, DELETE ON pochowany TO pracownik_cmentarza;
GRANT SELECT ON osoba TO pracownik_cmentarza; */
