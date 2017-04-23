/
DROP TABLE echipe
/
DROP TABLE meciuri
/
DROP TABLE pozitii
/

DROP TABLE pozitie
/
DROP TABLE grupa
/
DROP TABLE clasament
/
DROP TABLE nationalitate
/
DROP TABLE utilizator
/
DROP TABLE review
/
DROP TABLE pronostic
/
DROP TABLE NUME_STUDENTI5
/
DROP TABLE jucatori
/
CREATE TABLE jucatori(
  id NUMBER(10),
  nume VARCHAR2(30) Not NULL,
  prenume Varchar2(30) NOT NULL,
  id_nationalitate Number(10) ,
  varsta Number(3),
  id_echipa Number(10)
  )
/

ALTER TABLE jucatori ADD (
  CONSTRAINT jucatori_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE jucatori_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER jucatori_bir 
BEFORE INSERT ON jucatori
FOR EACH ROW

BEGIN
  SELECT jucatori_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Create Table echipe(
id NUMBER(10),
nume Varchar2(50) Not NULL,
tara Varchar2(50) Not NULL,
numar_jucatori NUMBER(5),
id_grupa Varchar2(50)
)
/
ALTER TABLE echipe ADD (
  CONSTRAINT echipe_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE echipe_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER echipe_bir 
BEFORE INSERT ON echipe
FOR EACH ROW

BEGIN
  SELECT echipe_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Create Table meciuri(
id NUMBER(10),
id_echipa1 Number(10) ,
id_echipa2 Number(10) ,
rezultat1 Number(2) default 0,
rezultat2 Number(2) default 0,
id_grupa Number(10),
data_meci date
)
/
ALTER TABLE meciuri ADD (
  CONSTRAINT meciuri_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE meciuri_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER meciuri_bir 
BEFORE INSERT ON meciuri
FOR EACH ROW

BEGIN
  SELECT meciuri_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Create Table pozitii
(
id NUMBER(10),
id_jucator Number(10),
id_pozitie Number(3)
)
/
ALTER TABLE pozitii ADD (
  CONSTRAINT pozitii_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE pozitii_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER pozitii_bir 
BEFORE INSERT ON pozitii
FOR EACH ROW

BEGIN
  SELECT pozitii_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Create Table pozitie
(
  id Number(10) ,
  nume Varchar2(50)
)
/
ALTER TABLE pozitie ADD (
  CONSTRAINT pozitie_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE pozitie_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER pozitie_bir 
BEFORE INSERT ON pozitie
FOR EACH ROW

BEGIN
  SELECT pozitie_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Create Table grupa
(
  id Number(10),
  nume Varchar2(50)
)
/
ALTER TABLE grupa ADD (
  CONSTRAINT grupa_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE grupa_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER grupa_bir 
BEFORE INSERT ON grupa
FOR EACH ROW

BEGIN
  SELECT grupa_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
create table clasament
(
id Number(10) ,
id_echipa NUMBER(10),
punctaj number(3) default 0,
goluri_date number(10) default 0,
goluri_primite number(10) default 0,
victorii number(5) default 0,
infrangeri number(5) default 0,
egaluri number(5) default 0,
golaveraj number(5) default 0 
)
/
ALTER TABLE clasament ADD (
  CONSTRAINT clasament_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE clasament_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER clasament_bir 
BEFORE INSERT ON clasament
FOR EACH ROW

BEGIN
  SELECT clasament_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
create Table nationalitate
(
  id NUMBER(10),
  nume Varchar2(10)
)
/
ALTER TABLE nationalitate ADD (
  CONSTRAINT nationalitate_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE nationalitate_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER nationalitate_bir 
BEFORE INSERT ON nationalitate
FOR EACH ROW

BEGIN
  SELECT nationalitate_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
create Table utilizator (
id NUMBER(10),
username Varchar2(50),
parola Varchar2(50),
email Varchar2(50),
rol Varchar2(50)
)
/

ALTER TABLE utilizator ADD (
  CONSTRAINT utilizator_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE utilizator_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER utilizator_bir 
BEFORE INSERT ON utilizator
FOR EACH ROW

BEGIN
  SELECT utilizator_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
create table review(
id NUMBER(10),
id_utilizator Number(10) ,
id_meci Number(10) ,
text Varchar2(255),
data_review date  default CURRENT_TIMESTAMP 
)
/
ALTER TABLE review ADD (
  CONSTRAINT review_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE review_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER review_bir 
BEFORE INSERT ON review
FOR EACH ROW

BEGIN
  SELECT review_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
create table pronostic 
( id Number(10),
  id_utilizator Number(10) ,
  id_meci NUMBER(10),
  atribut int Check (atribut<=2 and atribut > =0)
)
/
ALTER TABLE pronostic ADD (
  CONSTRAINT pronostic_pk PRIMARY KEY (ID));
/
CREATE SEQUENCE pronostic_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER pronostic_bir 
BEFORE INSERT ON pronostic
FOR EACH ROW

BEGIN
  SELECT pronostic_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
  CREATE TABLE NUME_STUDENTI5
   (  NUME VARCHAR2(50), 
      PRENUME VARCHAR2(50)
   ) 
/
insert into pozitie(nume) values('Atacant');
insert into pozitie(nume) values('Portar');
insert into pozitie(nume) values('Fundas stanga');
insert into pozitie(nume) values('Fundas central');
insert into pozitie(nume) values('Fundas dreapta');
insert into pozitie(nume) values('Mijlocas central');
insert into pozitie(nume) values('Mijlocas stanga');
insert into pozitie(nume) values('Mijlocas dreapta');
insert into pozitie(nume) values('Mijlocas defensiv');
insert into pozitie(nume) values('Mijlocas ofensiv');
Insert into nationalitate (nume) values('Romana');
Insert into nationalitate (nume) values('Italiana');
Insert into nationalitate (nume) values('Franceza');
Insert into nationalitate (nume) values('Germana');
Insert into nationalitate (nume) values('Engleza');
Insert into nationalitate (nume) values('Rusa');
Insert into nationalitate (nume) values('Bulgara');
Insert into nationalitate (nume) values('Greaca');
Insert into nationalitate (nume) values('Chineza');
Insert into nationalitate (nume) values('Japoneza');
Insert into nationalitate (nume) values('Rwandeza');

insert into echipe (nume,tara) values('Steaua','Romania');
insert into echipe (nume,tara) values('Barcelona','Spania');
insert into echipe (nume,tara) values('Real MAdrid','Spania');
insert into echipe (nume,tara) values('Juventus','Italia');
insert into echipe (nume,tara) values('AS Roma','Italia');
insert into echipe (nume,tara) values('PSG','Franta');
insert into echipe (nume,tara) values('FC BOTOSANI','Romania');
insert into echipe (nume,tara) values('CS VORNICENI','Romania');
update  echipe set id_grupa=2 where id=any(5,6,7,8);
update  echipe set id_grupa=1 where id=any(1,2,3,4);
/
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Frunza','Teodor ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Onu','Stefan ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Teclici','Radu ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Patachi','Paula ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Haba','Gabriela ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Piriu','Adrian ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Darie','Sergiu ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Lupu','Razvan ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Dragoman','Andreas ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Gitlan','Ionut ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Nemtoc','Ciprian ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Simon','Stefania ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Apostol','Constantin ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Bejenaru','George ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Chirila','Loredana ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Tanasa','Petru ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Damian','Bogdan ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Bivol','Daniel ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Borcan','Andreea ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Pantiru','Paul ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Ulinici','Cristina ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Filimon','Lucian ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Motroi','Valeriu ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Ionita','Alexandru ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Catana','Vasile ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Chelmus','Rares ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Turcu','Nicusor ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Rosca','Andreea ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Leonte','Maria ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Procop','Vladimir ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Prodan','Marius ');
Insert into NUME_STUDENTI5 (NUME,PRENUME) values (' Trifan','Tamara ');
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(1,2,1,to_date('20/4/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(1,3,1,to_date('21/4/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(2,3,1,to_date('22/4/2017','dd/mm/yyyy'));
/
DECLARE 
  v_nr1 integer;
  v_nr2 integer;
  v_nume varchar2(20);
  v_prenume varchar2(20);
  v_contor integer :=0;
  v_varsta integer :=0;
BEGIN
   WHILE (v_contor < 10001) LOOP       
       v_contor := v_contor + 1;
       v_nr1:=DBMS_Random.value(1,15);
       v_nr2:=DBMS_Random.value(1,15);
       v_varsta:=DBMS_Random.value(16,40);
       select trim(nume) into v_nume from (select rownum as "rw" , nume from NUME_STUDENTI5 ) where "rw"=v_nr1;
        select trim(prenume) into v_prenume from (select rownum as "rw" , prenume from NUME_STUDENTI5 ) where "rw"=v_nr2;
        insert into jucatori(nume,prenume,id_nationalitate,varsta,id_echipa) values(v_nume,v_prenume,4,v_varsta,11);
   END LOOP;
END;
/
DECLARE 
  v_nr1 integer;
  v_nr2 integer;
  v_username varchar2(50);
  v_parola varchar2(50);
  v_contor integer :=0;
BEGIN
   WHILE (v_contor < 10001) LOOP       
       v_contor := v_contor + 1;
       v_nr1:=DBMS_Random.value(1,15);
       v_nr2:=DBMS_Random.value(1,15);
       select trim("nume")||trim(v_contor) into v_username from (select rownum as "rw" , nume||prenume as "nume" from NUME_STUDENTI5 ) where "rw"=v_nr1;
        select trim("parola") into v_parola from (select rownum as "rw" , reverse(prenume) as "parola" from NUME_STUDENTI5 ) where "rw"=v_nr2;
        insert into utilizator(username,parola,email,rol) values(v_username,v_parola,v_username||'@gmail.com','user');
   END LOOP;
END;
/