 set serveroutput on;
DECLARE
numar integer;
cursor_id         INTEGER;
sql_query         VARCHAR2(300);
return_execute    INTEGER;
column  varchar2(10000);
column1 varchar2(10000);
my_buffer varchar2(30000);
sir_de_caractere varchar2(10000);
file_objects UTL_FILE.FILE_TYPE;
file_inserts UTL_FILE.FILE_TYPE;
BEGIN

  file_objects := UTL_FILE.FOPEN ('MY_DIR', 'export_creare_obiecte.sql', 'W');
  file_inserts := UTL_FILE.FOPEN ('MY_DIR', 'export_inserturi_tabele.sql', 'W');
  FOR linie_cursor IN ( SELECT OBJECT_TYPE , OBJECT_NAME FROM USER_OBJECTS ) LOOP
       IF (linie_cursor.OBJECT_TYPE != 'PACKAGE BODY') THEN
       select DBMS_METADATA.GET_DDL( linie_cursor.OBJECT_TYPE ,linie_cursor.OBJECT_NAME) into my_buffer from DUAL; 
       END IF;
       UTL_FILE.PUT_LINE(file_objects,my_buffer,true);
  END LOOP;
  
  FOR linie_user_tables IN ( SELECT TABLE_NAME FROM USER_TABLES ORDER BY TABLE_NAME DESC) LOOP
   
     SELECT COUNT(*) into numar FROM user_tab_columns WHERE TABLE_NAME = linie_user_tables.TABLE_NAME ;
    
     sql_query := 'SELECT * FROM ' || linie_user_tables.TABLE_NAME; 
     
     cursor_id := DBMS_SQL.OPEN_CURSOR;
      
     DBMS_SQL.PARSE(cursor_id, sql_query, dbms_sql.native);  
     
     
     FOR i in 1..numar LOOP
       sir_de_caractere := column||i;
       DBMS_SQL.DEFINE_COLUMN(cursor_id, i, sir_de_caractere, 10000); 
     END LOOP;      
     return_execute := dbms_sql.execute(cursor_id);
    
     LOOP
        IF DBMS_SQL.FETCH_ROWS(cursor_id) > 0 
        THEN 
        
        my_buffer := 'INSERT INTO '||linie_user_tables.table_name||' VALUES(''';
        
        FOR i in 1..numar LOOP
           sir_de_caractere := column||i;
           DBMS_SQL.COLUMN_VALUE(cursor_id, i, sir_de_caractere); 
           IF i != numar
                THEN   my_buffer := my_buffer || sir_de_caractere ||''',''';
                ELSE   my_buffer := my_buffer || sir_de_caractere ;
            END IF;
        END LOOP;
        my_buffer := my_buffer ||''');';
        UTL_FILE.PUT_LINE(file_inserts,my_buffer,true);
           ELSE
              EXIT; 
           END IF;    
           
     END LOOP;
  END LOOP;
  UTL_FILE.FCLOSE(file_objects);
  UTL_FILE.FCLOSE(file_inserts);
END;