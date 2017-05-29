<?php require_once('header.php') ?>


<form class="modal-content animate" action="index.php?action=update_account&filter_on=1" method="POST">
 
	
    <div class="container">
      <label><b>Account Name</b></label>
      <input type="text"  maxlength="20" placeholder="Account Name"  name="nume_cont" required>
	  <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
	   <label><b> New Password</b></label>
      <input type="password" placeholder="Enter Password" name=" new_password" required>
      <button type="Submit">Update account</button>
    </div>
<?php
if(isset($_REQUEST['filter_on'])) {

	//print_r ($_REQUEST['nume_cont']);
	$v_nume_cont=$_REQUEST['nume_cont'];
	$password=$_REQUEST['password'];
	$new_password=$_REQUEST['new_password'];
	$sql = " UPDATE UTILIZATOR SET parola= '";
	$sql.="$new_password";
	$sql.="'";
	$sql.=" where parola ='";
	$sql.="$password";
	$sql.="'";
	$result = oci_parse($db, $sql);
	oci_execute($result);
	print_r('Contul a fost actualizat');
	
}
    

