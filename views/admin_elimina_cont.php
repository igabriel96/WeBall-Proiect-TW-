
<?php require_once('header.php') ?>

<form class="modal-content animate" action="index.php?action=admin_elimina_cont&filter_on=1" method="POST">
 
	
    <div class="container">
      <label><b>Account Name</b></label>
      <input type="text"  maxlength="20"  placeholder="Name" name="nume_cont" required>
      <button type="Submit">Delete account</button>
    </div>
	
</form>


<?php
if(isset($_REQUEST['filter_on'])) {

	//print_r ($_REQUEST['nume_cont']);
	$v_nume_cont=$_REQUEST['nume_cont'];
	$password=$_REQUEST['password'];
	
	$sql = " DELETE FROM UTILIZATOR where username = '";
	$sql.="$v_nume_cont";
	$sql.="'";
	$result = oci_parse($db, $sql);
	oci_execute($result);
	print_r('Contul a fost sters');
	require_once('class/class.user.php');
	
}
    

