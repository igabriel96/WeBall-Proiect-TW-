create or replace trigger trigger_clasament after update or insert on meciuri 
for each row
Declare 
rez1 integer;
rez2 integer;
Begin
  rez1:=:new.REZULTAT1;
  rez2:=:new.REZULTAT2;
  case
    when inserting then
      if(rez1=rez2)then
        update clasament set punctaj=punctaj+1 ,goluri_date=goluri_date+:new.rezultat1 ,goluri_primite=goluri_primite+:new.rezultat2 ,egaluri=egaluri+1 where id_echipa=(:new.id_echipa1);
        update clasament set punctaj=punctaj+1 ,goluri_date=goluri_date+:new.rezultat2 ,goluri_primite=goluri_primite+:new.rezultat1 ,egaluri=egaluri+1 where id_echipa=(:new.id_echipa2);
      else
        if(:new.rezultat1>:new.rezultat2)then
          update clasament set punctaj=punctaj+3 ,goluri_date=goluri_date+:new.rezultat1 ,goluri_primite=goluri_primite+:new.rezultat2 ,victorii=victorii+1 where id_echipa=(:new.id_echipa1);
          update clasament set goluri_date=goluri_date+:new.rezultat2 ,goluri_primite=goluri_primite+:new.rezultat1 ,infrangeri=infrangeri+1 where id_echipa=(:new.id_echipa2);
        else
          update clasament set goluri_date=goluri_date+:new.rezultat1 ,goluri_primite=goluri_primite+:new.rezultat2 ,infrangeri=infrangeri+1 where id_echipa=(:new.id_echipa1);
          update clasament set punctaj=punctaj+3 ,goluri_date=goluri_date+:new.rezultat2 ,goluri_primite=goluri_primite+:new.rezultat1 ,victorii=victorii+1 where id_echipa=(:new.id_echipa2);
        end if;
      end if;
    when updating then
      if(:old.rezultat1=:old.rezultat2)then
        update clasament set punctaj=punctaj-1 ,goluri_date=goluri_date-:old.rezultat1 ,goluri_primite=goluri_primite-:old.rezultat2 ,egaluri=egaluri-1 where id_echipa=(:old.id_echipa1);
        update clasament set punctaj=punctaj-1 ,goluri_date=goluri_date-:old.rezultat2 ,goluri_primite=goluri_primite-:old.rezultat1 ,egaluri=egaluri-1 where id_echipa=(:old.id_echipa2);
      else
        if(:old.rezultat1>:old.rezultat2)then
          update clasament set punctaj=punctaj-3 ,goluri_date=goluri_date-:old.rezultat1 ,goluri_primite=goluri_primite-:old.rezultat2 ,victorii=victorii-1 where id_echipa=:old.id_echipa1;
          update clasament set goluri_date=goluri_date-:old.rezultat2 ,goluri_primite=goluri_primite-:old.rezultat1 ,infrangeri=infrangeri-1 where id_echipa=:old.id_echipa2;
        else
          update clasament set goluri_date=goluri_date-:old.rezultat1 ,goluri_primite=goluri_primite-:old.rezultat2 ,infrangeri=infrangeri-1 where id_echipa=:old.id_echipa1;
          update clasament set punctaj=punctaj-3 ,goluri_date=goluri_date-:old.rezultat2 ,goluri_primite=goluri_primite-:old.rezultat1 ,victorii=victorii-1 where id_echipa=:old.id_echipa2;
        end if;
      end if;
      
      if(:new.rezultat1=:new.rezultat2)then
        update clasament set punctaj=punctaj+1 ,goluri_date=goluri_date+:new.rezultat1 ,goluri_primite=goluri_primite+:new.rezultat2 ,egaluri=egaluri+1 where id_echipa=:new.id_echipa1;
        update clasament set punctaj=punctaj+1 ,goluri_date=goluri_date+:new.rezultat2 ,goluri_primite=goluri_primite+:new.rezultat1 ,egaluri=egaluri+1 where id_echipa=:new.id_echipa2;
      else
        if(:new.rezultat1>:new.rezultat2)then
          update clasament set punctaj=punctaj+3 ,goluri_date=goluri_date+:new.rezultat1 ,goluri_primite=goluri_primite+:new.rezultat2 ,victorii=victorii+1 where id_echipa=:new.id_echipa1;
          update clasament set goluri_date=goluri_date+:new.rezultat2 ,goluri_primite=goluri_primite+:new.rezultat1 ,infrangeri=infrangeri+1 where id_echipa=:new.id_echipa2;
        else
          update clasament set goluri_date=goluri_date+:new.rezultat1 ,goluri_primite=goluri_primite+:new.rezultat2 ,infrangeri=infrangeri+1 where id_echipa=:new.id_echipa1;
          update clasament set punctaj=punctaj+3 ,goluri_date=goluri_date+:new.rezultat2 ,goluri_primite=goluri_primite+:new.rezultat1 ,victorii=victorii+1 where id_echipa=:new.id_echipa2;
        end if;
      end if;
  end case;
end trigger_clasament;
   
/
create or replace trigger trigger_utilizator_delete after delete on utilizator
for each row
begin
  update review set is_deleted=1 where id_utilizator=:old.id;
end;
/
