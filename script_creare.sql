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
DROP SEQUENCE jucatori_seq;
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
logo Varchar2(50) Not NULL,
tara Varchar2(50) Not NULL,
numar_jucatori NUMBER(5),
id_grupa Varchar2(50)
)
/
ALTER TABLE echipe ADD (
  CONSTRAINT echipe_pk PRIMARY KEY (ID));
/
DROP SEQUENCE echipe_seq;
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
etapa number(2),
id_grupa Number(10),
data_meci date
)
/
ALTER TABLE meciuri ADD (
  CONSTRAINT meciuri_pk PRIMARY KEY (ID));
/
DROP SEQUENCE meciuri_seq;
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
DROP SEQUENCE pozitii_seq;
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
DROP SEQUENCE pozitie_seq;
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
DROP SEQUENCE grupa_seq;
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
DROP SEQUENCE clasament_seq;
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
DROP SEQUENCE nationalitate_seq;
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
DROP SEQUENCE utilizator_seq;
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
data_review date  default CURRENT_TIMESTAMP ,
is_deleted number(10)
)
/
ALTER TABLE review ADD (
  CONSTRAINT review_pk PRIMARY KEY (ID));
/
DROP SEQUENCE review_seq;
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
DROP SEQUENCE pronostic_seq;
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

insert into echipe (nume,logo,tara) values('Steaua','steaua.png','Romania');
insert into echipe (nume,logo,tara) values('Dinamo','dinamo.png','Romania');
insert into echipe (nume,logo,tara) values('Rapid','rapid.png','Romania');
insert into echipe (nume,logo,tara) values('Astra','astra.png','Romania');
insert into echipe (nume,logo,tara) values('Botosani','botosani.png','Romania');
insert into echipe (nume,logo,tara) values('Brasov','brasov.png','Romania');
insert into echipe (nume,logo,tara) values('CFR Cluj','cfr.png','Romania');
insert into echipe (nume,logo,tara) values('Concordia','concordia.png','Romania');
insert into echipe (nume,logo,tara) values('Iasi','iasi.png','Romania');
insert into echipe (nume,logo,tara) values('Petrolul','petrolul.png','Romania');
insert into echipe (nume,logo,tara) values('Viitorul','viitorul.png','Romania');
insert into echipe (nume,logo,tara) values('Gaz Metan','gazmetan.png','Romania');
update  echipe set id_grupa=1 where id=any(1,2,3,4);
update  echipe set id_grupa=2 where id=any(5,6,7,8);
update  echipe set id_grupa=3 where id=any(9,10,11,12);

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

insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(1,2,1,to_date('3/4/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(3,1,1,to_date('4/4/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(1,4,1,to_date('5/4/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(2,3,1,to_date('6/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(4,2,1,to_date('9/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(4,3,1,to_date('10/5/2017','dd/mm/yyyy'));

insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(5,6,2,to_date('12/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(5,7,2,to_date('14/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(8,6,2,to_date('16/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(6,7,2,to_date('18/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(8,5,2,to_date('20/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(7,8,2,to_date('24/5/2017','dd/mm/yyyy'));

insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(9,10,3,to_date('25/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(9,11,3,to_date('28/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(11,10,3,to_date('29/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(12,9,3,to_date('29/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(12,10,3,to_date('29/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,id_grupa,data_meci) values(11,9,3,to_date('29/5/2017','dd/mm/yyyy'));

update meciuri set etapa = 1 where data_meci >= to_date('03/5/2017','dd/mm/yyyy') and data_meci < to_date('10/5/2017','dd/mm/yyyy');
update meciuri set etapa = 2 where data_meci >= to_date('10/5/2017','dd/mm/yyyy') and data_meci < to_date('17/5/2017','dd/mm/yyyy');
update meciuri set etapa = 3 where data_meci >= to_date('17/5/2017','dd/mm/yyyy') and data_meci < to_date('24/5/2017','dd/mm/yyyy');
update meciuri set etapa = 4 where data_meci >= to_date('24/5/2017','dd/mm/yyyy') and data_meci < to_date('31/5/2017','dd/mm/yyyy');

insert into utilizator(username , parola , email , rol) values('alinapetrei','123123123','alinapetrei@gmail.com','admin');
insert into utilizator(username , parola , email , rol) values('gabrielionesei','123456789','gabrielionesei@gmail.com','admin');
insert into utilizator(username , parola , email , rol) values('paulavasiliu','987654321','paulavasiliu@gmail.com','admin');
insert into utilizator(username , parola , email , rol) values('razvantheodoru','159753951','gabrielionesei@gmail.com','admin');
insert into utilizator(username , parola , email , rol) values('ioanabodnar','1212121212','ioanabodnar@gmail.com','user');
insert into utilizator(username , parola , email , rol) values('raresarvinte','1515151515','raresarvinte@gmail.com','user');
insert into utilizator(username , parola , email , rol) values('ciprianpurice','newpass','ciprianpurice@gmail.com','user');
insert into utilizator(username , parola , email , rol) values('theodoravarvaroi','passnew','theodoravarvaroi@gmail.com','user');
insert into utilizator(username , parola , email , rol) values('paulacarp','newpass123','paulacarp@gmail.com','user');
insert into utilizator(username , parola , email , rol) values('cosminpintilie','passnew123','cosminpintilie@gmail.com','user');

insert into clasament(id_echipa) values(1);
insert into clasament(id_echipa) values(2);
insert into clasament(id_echipa) values(3);
insert into clasament(id_echipa) values(4);
insert into clasament(id_echipa) values(5);
insert into clasament(id_echipa) values(6);
insert into clasament(id_echipa) values(7);
insert into clasament(id_echipa) values(8);
insert into clasament(id_echipa) values(9);
insert into clasament(id_echipa) values(10);
insert into clasament(id_echipa) values(11);
insert into clasament(id_echipa) values(12);

declare
TYPE VECTOR IS TABLE OF VARCHAR2(1000) INDEX BY PLS_INTEGER;
comments VECTOR;
begin
comments(1) := 'Ability is what you are capable of doing. Motivation determines what you do. Attitude determines how well you do it.';
comments(2) := 'Pressure is something you feel when you do not know what the hell you are doing.';
comments(3) := 'The problem with winter sports is that -- follow me closely here -- they generally take place in winter.';
comments(4) := 'If a man watches three football games in a row, he should be declared legally dead.';
comments(5) := 'football is like life - it requires perserverance, self-denial, hard work, sacrifice, dedication and respect for authority.';
comments(6) := 'The thing about football - the important thing about football - is that it is not just about football.';
comments(7) := 'Anyone who is just driven 90 yards against huge men trying to kill them has earned the right to do Jazz hands.';
comments(8) := 'The same boys who got detention in elementary school for beating the crap out of people are now rewarded for it. They call it football.';
comments(9) := 'I like football. I find its an exciting strategic game. Its a great way to avoid conversation with your family at Thanksgiving.';
comments(10) := 'In football everything is complicated by the presence of the opposite team.';
comments(11) := 'Football is the ballet of the masses.';
comments(12) := 'The Enemy of the best is the good. If you are always settling with what is good, you wll never be the best.';
comments(13) := 'Really well played by both of the teams';
comments(14) := 'So exciting match , got me more than everything else';
comments(15) := 'Football combines two of the worst things in American life. It is violence punctuated by committee meetings.';
comments(16) := 'Not bad , but i really want to see who will win the championship';
comments(17) := 'You got one guy going boom, one guy going whack, and one guy not getting in the endzone.';
comments(18) := 'Nothing are better than a good football match';
comments(19) := 'Football: A sport that bears the same relation to education that bullfighting does to agriculture.';
comments(20) := 'Everyone has the fire, but the champions know when to ignite the spark.';
for i in 1..1000 LOOP
   
   insert into review(id_utilizator,id_meci,text,is_deleted) values(dbms_random.value(1,12),dbms_random.value(1,12),comments(dbms_random.value(1,20)),0);

END LOOP;
end;
/
declare
contor integer;
i integer := 1;
begin
select count(*) into contor from meciuri;
while (i <= contor) LOOP
update meciuri set rezultat1 = dbms_random.value(1,8) where id = i;
update meciuri set rezultat2 = dbms_random.value(1,8) where id = i;
i := i + 1;
END LOOP;
end;
/
DECLARE 
  v_nr1 integer;
  v_nr2 integer;
  v_nume varchar2(20);
  v_prenume varchar2(20);
  v_contor integer :=0;
  v_varsta integer :=0;
BEGIN
   WHILE (v_contor < 100) LOOP       
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
COMMIT;
