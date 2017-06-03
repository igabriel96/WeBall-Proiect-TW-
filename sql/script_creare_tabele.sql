/
DROP TABLE echipe
/
DROP TABLE meciuri
/
Drop Table global_date
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
DROP TABLE fixtures
/
DROP TABLE jucatori
/
CREATE TABLE jucatori(
  id NUMBER(10),
  nume VARCHAR2(30) Not NULL,
  prenume Varchar2(30) NOT NULL,
  nationalitate Varchar2(100) ,
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
logo Varchar2(500) Not NULL,
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
DROP SEQUENCE mec_seq;
/
CREATE SEQUENCE mec_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER mec_bir 
BEFORE INSERT ON meciuri
FOR EACH ROW

BEGIN
  SELECT mec_seq.NEXTVAL
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
grupa NUMBER(10),
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
data_review timestamp(6)  default CURRENT_TIMESTAMP ,
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
Create Table fixtures(
id NUMBER(10),
id_echipa1 Number(10) ,
id_echipa2 Number(10) ,
rezultat1 Number(2) default 0,
rezultat2 Number(2) default 0,
etapa_eliminatorie number(2),
data_meci date
)
/
ALTER TABLE fixtures ADD (
  CONSTRAINT fixtures_pk PRIMARY KEY (ID));
/
DROP SEQUENCE fixtures_seq;
/
CREATE SEQUENCE fixtures_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER fixtures_bir 
BEFORE INSERT ON fixtures
FOR EACH ROW

BEGIN
  SELECT fixtures_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
create table global_date(id integer primary key ,tip_campionat varchar2(100) ,nr_maxim_echipe_campionat integer,nr_maxim_echipe_grupa integer,nr_echipe_campionat integer,nr_echipe_grupa integer)

/
insert into global_date(id,tip_campionat,nr_maxim_echipe_campionat,nr_maxim_echipe_grupa,nr_echipe_campionat,nr_echipe_grupa) values(1,'necunoscut',0,0,0,0)
/
create or replace procedure creare_meciuri as
Type myVect is Table of Number(10) index by pls_integer;
v1 myVect;
v2 myVect;
type_champ varchar2(100);
nr_echipe integer;
contor integer(10):=1;
contor2 integer:=1;
contor3 integer :=1;
Cursor curs is select * from echipe;
Begin
  for indx in curs LOOP
      v1(contor):=indx.id;
      contor:= contor + 1;
  End loop;
  Select tip_campionat into type_champ from global_date where id=1;
  if( type_champ='campionat')then
    Select nr_maxim_echipe_campionat into nr_echipe from global_date where id=1;
    dbms_output.put_line(nr_echipe);
    contor2:=1;
    while contor2 <=  nr_echipe loop
      contor3:=1;
      while contor3 <= nr_echipe/2 loop
        insert into meciuri(id_echipa1,id_echipa2,etapa) values(v1(contor3) ,v1(nr_echipe -contor3+1),contor2);  
        contor3:=contor3 +1;
      end loop;
      for con in v1.first..v1.last LOOP
        dbms_output.put_line(con);
        if(con=1)then
          v2(1):=v1(v1.last);
        else
            v2(con):=v1(con-1);
        end if;
      end loop;
    for con in v2.first..v2.last loop
      v1(con):=v2(con);
    end loop;
    contor2:=contor2+1;
    end loop;
  end if;
End creare_meciuri;
/
create or replace trigger global_date_echipe after insert on echipe 
begin
   update global_date set nr_echipe_campionat=nr_echipe_campionat+1 ,nr_echipe_grupa=nr_echipe_grupa+1;
end global_date_echipe;
/
create or replace procedure inserare_echipe_clasament as 
cursor curs is Select * from echipe;
begin
  for indx in curs LOOP
    insert into clasament(id_echipa,grupa) values(indx.id,1);
  end loop;
end inserare_echipe_clasament;
/
drop table poll;
/
create table poll(id integer ,id_meci integer ,intrebare varchar2(255) ,raspuns1 varchar2(100),raspuns2 varchar2(100),
raspuns3 varchar2(100) ,raspuns4 varchar2(100) ,raspuns5 varchar2(100) ,vot1 integer,vot2 integer,vot3 integer,vot4 integer,vot5 integer);
/
ALTER TABLE poll ADD (
  CONSTRAINT poll_pk PRIMARY KEY (ID));
/
DROP SEQUENCE poll_seq;
/
CREATE SEQUENCE poll_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER poll_bir 
BEFORE INSERT ON poll
FOR EACH ROW

BEGIN
  SELECT poll_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Drop table vote_poll;
/
create table vote_poll(id integer,id_poll integer,id_utilizator integer,optiune integer);
/
ALTER TABLE vote_poll ADD (
  CONSTRAINT vote_poll_pk PRIMARY KEY (ID));
/
DROP SEQUENCE vote_poll_seq;
/
CREATE SEQUENCE vote_poll_seq START WITH 1;
/
CREATE OR REPLACE TRIGGER vote_poll_bir 
BEFORE INSERT ON vote_poll
FOR EACH ROW

BEGIN
  SELECT vote_poll_seq.NEXTVAL
  INTO   :new.id
  FROM   dual;
END;
/
Commit;
/
