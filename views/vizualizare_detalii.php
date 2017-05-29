
<?php require_once('header.php') ?>



<form class="modal-content animate" action="index.php?action=vizualizare_detalii" method="POST">
 
	
    <div class="container">
      <label><b>Account Name</b></label>
      <input type="text"  maxlength="20" placeholder="Account Name"  name="nume_cont" required>
	  <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <button type="Submit">View account</button>
    </div>
<?php
if(isset($_REQUEST['filter_on'])) {

	//print_r ($_REQUEST['nume_cont']);
	$v_nume_cont=$_REQUEST['nume_cont'];
	$password=$_REQUEST['password'];
	$sql = " select * FROM UTILIZATOR where username = '";
	$sql.="$v_nume_cont";
	$sql.="'";
	$sql.=" and parola ='";
	$sql.="$password";
	$sql.="'";
	$result = oci_parse($db, $sql);
	oci_execute($result);
	$r = oci_fetch_row($result);
	if(!$r) {print_r('Contul nu a fost gasit'); exit;}
	//print_r($r);
	print_r('ID ul este ');
	print_r($r[0]);
	?> <br> <?php
	print_r('Username ul este ');
	print_r($r[1]);
	?> <br> <?php
	print_r('Parola este ');
	print_r($r[2]);
	?> <br> <?php
	print_r('Emailul este ');
	print_r($r[3]);
	?> <br> <?php
	print_r('Rolul este de ');
	print_r($r[4]);	
}
    
