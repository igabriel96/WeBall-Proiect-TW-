
insert into echipe (nume,logo,tara) values('Steaua','http://i.imgur.com/FgxhO2c.png','Romania');
insert into echipe (nume,logo,tara) values('Dinamo','http://i.imgur.com/2wSeC0I.png','Romania');
insert into echipe (nume,logo,tara) values('Rapid','http://i.imgur.com/6OlKdFA.png','Romania');
insert into echipe (nume,logo,tara) values('Astra','http://i.imgur.com/0pN93j8.png','Romania');
insert into echipe (nume,logo,tara) values('Mures','http://i.imgur.com/LEsp30P.png','Romania');
insert into echipe (nume,logo,tara) values('Brasov','http://i.imgur.com/qaDvzbc.png','Romania');
insert into echipe (nume,logo,tara) values('Farul','http://i.imgur.com/M2igsnF.png','Romania');
insert into echipe (nume,logo,tara) values('CFR','http://i.imgur.com/lU66fSO.png','Romania');
insert into echipe (nume,logo,tara) values('Iasi','http://i.imgur.com/PF8oqHF.png','Romania');
insert into echipe (nume,logo,tara) values('Petrolul','http://i.imgur.com/PNxGznl.png','Romania');
insert into echipe (nume,logo,tara) values('Viitorul','http://i.imgur.com/5BjEyWX.png','Romania');
insert into echipe (nume,logo,tara) values('Pandurii','http://i.imgur.com/nZF7dWH.png','Romania');
insert into echipe (nume,logo,tara) values('Iasi2','http://i.imgur.com/PF8oqHF.png','Romania');
insert into echipe (nume,logo,tara) values('Petrolul2','http://i.imgur.com/PNxGznl.png','Romania');
insert into echipe (nume,logo,tara) values('Viitorul2','http://i.imgur.com/5BjEyWX.png','Romania');
insert into echipe (nume,logo,tara) values('Pandurii2','http://i.imgur.com/nZF7dWH.png','Romania');
update  echipe set id_grupa=1 where id=any(1,2,3,4);
update  echipe set id_grupa=2 where id=any(5,6,7,8);
update  echipe set id_grupa=3 where id=any(9,10,11,12);
update  echipe set id_grupa=3 where id=any(13,14,15,16);

insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Mutu','Adrian','Romana','38','1');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Hagi','Gica','Romana','42','2');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Marica','Ciprian','Romana','34','3');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Lobont','Bogdan','Romana','35','4');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Torje','Gabriel','Romana','28','5');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Stancu','Bogdan','Romana','26','6');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Alibec','Denis','Romana','25','7');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Popa','Adrian','Romana','28','8');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Bicfalvi','Eric','Romana','25','9');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Camataru','Rodion','Romana','43','10');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Duckadam','Helmuth','Romana','44','11');
insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('Lacatus','Marius','Romana','41','12');

insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(1,2,1,1,1,to_date('5/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(2,3,1,2,1,to_date('6/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(3,4,1,2,1,to_date('7/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(1,4,1,3,1,to_date('8/5/2017','dd/mm/yyyy'));

insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(5,6,2,0,2,to_date('11/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(7,8,1,1,2,to_date('12/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(5,6,1,0,2,to_date('13/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(6,8,3,3,2,to_date('14/5/2017','dd/mm/yyyy'));

insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(9,10,3,2,3,to_date('20/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(10,11,4,4,3,to_date('21/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(11,12,2,0,3,to_date('22/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(9,11,1,2,3,to_date('23/5/2017','dd/mm/yyyy'));

insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(13,14,1,1,4,to_date('25/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(15,16,1,3,4,to_date('26/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(13,15,0,2,4,to_date('27/5/2017','dd/mm/yyyy'));
insert into meciuri(id_echipa1,id_echipa2,rezultat1,rezultat2,id_grupa,data_meci) values(14,16,0,6,4,to_date('28/5/2017','dd/mm/yyyy'));


update meciuri set etapa = 1 where data_meci >= to_date('03/5/2017','dd/mm/yyyy') and data_meci < to_date('10/5/2017','dd/mm/yyyy');
update meciuri set etapa = 2 where data_meci >= to_date('10/5/2017','dd/mm/yyyy') and data_meci < to_date('17/5/2017','dd/mm/yyyy');
update meciuri set etapa = 3 where data_meci >= to_date('17/5/2017','dd/mm/yyyy') and data_meci < to_date('24/5/2017','dd/mm/yyyy');
update meciuri set etapa = 4 where data_meci >= to_date('24/5/2017','dd/mm/yyyy') and data_meci < to_date('31/5/2017','dd/mm/yyyy');

insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci) 
values(1,2,0,3,1,to_date('10/5/2017','dd/mm/yyyy'));
insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci)  
values(3,4,1,2,1,to_date('10/5/2017','dd/mm/yyyy'));
insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci)  
values(5,6,0,2,1,to_date('11/5/2017','dd/mm/yyyy'));
insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci)  
values(7,8,4,2,1,to_date('11/5/2017','dd/mm/yyyy'));
insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci)  
values(2,4,3,1,2,to_date('22/5/2017','dd/mm/yyyy'));
insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci)  
values(6,7,2,3,2,to_date('23/5/2017','dd/mm/yyyy'));
insert into fixtures(id_echipa1,id_echipa2,rezultat1,rezultat2,etapa_eliminatorie,data_meci)  
values(2,7,4,0,3,to_date('29/5/2017','dd/mm/yyyy'));

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
update clasament set grupa = 1 where id_echipa = any(1,2,3,4);
update clasament set grupa = 2 where id_echipa = any(5,6,7,8);
update clasament set grupa = 3 where id_echipa = any(9,10,11,12);
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
COMMIT;
