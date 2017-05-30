
create or replace package weball_user as 
Function este_eligibil(p_username varchar2,p_email varchar2) return INTEGER;
Function este_email_valid(p_email varchar2) return INTEGER;
Function exista_user(p_username varchar2,p_parola varchar2) return INTEGER;
end weball_user;
/
create or replace package body weball_user as 
Function este_eligibil(p_username varchar2,p_email varchar2) return INTEGER as 
v_count integer;
Begin
  select count(*) into v_count from utilizator where username=p_username;
  if(v_count!=0)then
    Return 1;
  else
    select count(*) into v_count from utilizator where email=p_email;
    if(v_count!=0)then 
      Return 2;
    End if;
  end if;
  Return 0;
End este_eligibil;
Function este_email_valid(p_email varchar2) return INTEGER as 
v_count integer;
Begin
  if(instr(p_email,'@')=0)then
    RETURN 1;--returneaza 1 daca adresa de  email nu contine @
  end if;
  Select count(*) into v_count from utilizator where email=p_email;
  if(v_count!=0)then
   RETURN 2;--returneaza 2 daca adresa de email exista
  end if;
  Return 0;--returneaza 0 daca se poate efectua schimbare de email
End este_email_valid;
Function exista_user(p_username varchar2,p_parola varchar2) return INTEGER as
v_username varchar(50);
v_parola varchar(50);
v_var integer;
Begin
  select substr(p_username||' ',0,instr(p_username||' ',' ')-1) into v_username from dual;
  select substr(p_parola||' ',0,instr(p_parola||' ',' ')-1) into v_parola from dual;
  select count(*) into v_var from utilizator where username=v_username and parola=v_parola and rol='user';
  if(length(p_username)!=length(v_username))then
    return 0;
  end if;
  if(length(p_parola)!=length(v_parola))then
    return 0;
  end if;
  if(v_var>0)then
    return 1;
  else
    return 0;
  end if;
End exista_user;



--------------functie pentru ADMIN---------------------
Function exista_user_admin(p_username varchar2,p_parola varchar2) return INTEGER as
v_username varchar(50);
v_parola varchar(50);
v_var integer;
Begin
  select substr(p_username||' ',0,instr(p_username||' ',' ')-1) into v_username from dual;
  select substr(p_parola||' ',0,instr(p_parola||' ',' ')-1) into v_parola from dual;
  select count(*) into v_var from utilizator where username=v_username and parola=v_parola and rol='admin';
  if(length(p_username)!=length(v_username))then
    return 0;
  end if;
  if(length(p_parola)!=length(v_parola))then
    return 0;
  end if;
  if(v_var>0)then
    return 1;
  else
    return 0;
  end if;
End exista_user_admin;


End weball_user;
