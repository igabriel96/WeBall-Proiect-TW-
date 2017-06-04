<?php require_once('header.php') ?>
<?php
 $sql= 'insert into vote_poll(id_poll,id_utilizator,optiune) values('.$_REQUEST['id_poll'] .','.$_SESSION['uid'].','.$_REQUEST['Poll'].')'; 
 $statement=oci_parse($db, $sql);
 oci_execute($statement);
 ?>