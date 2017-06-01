<?php require_once('header.php') ?>

<?php 
    
if(!isset($_REQUEST['password']) && !isset($_REQUEST['newpassword']))
{?>
<form class="modal-content animate" action="index.php?action=update_account&username=<?php echo $_REQUEST['username'];?>&filter_on=1" method="POST">
 	
    <div class="container">   
      <label><b>Old Password</b></label>
      <input type="password"  placeholder="Enter Old Password"  name="password" required>
	  <label><b>New Password</b></label>
      <input type="password" placeholder="Enter New Password" name="newpassword" required>
      <label><b>Confirm Password</b></label>    
      <input type="password" placeholder="Confirm New Password" name="confirmpassword" required>
      <button type="Submit">Update account</button>
    </div>
<?php } else {
if(isset($_REQUEST['filter_on'])) {
    
	$password=$_REQUEST['password'];
	$newpassword=$_REQUEST['newpassword'];
	$sql="select parola from utilizator where username = '".$_REQUEST['username']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
    $row = oci_fetch_row($statement);
    if($_REQUEST['password'] != $row[0])
    {
         echo '<p style="color: white;
         text-align: center;margin-top : 5%">Ai introdus o parola gresita!</p>';
    }
    else
    if($_REQUEST['newpassword'] != $_REQUEST['confirmpassword'])
    {
        echo '<p style="color: white;
        text-align: center;margin-top : 5%">Cele doua parole nu se potrivesc!</p>';
    }
    else
     if($_REQUEST['password'] == $_REQUEST['newpassword'])
    {
        echo '<p style="color: white;
        text-align: center;margin-top : 5%">Parola noua nu poate fi aceeasi cu cea veche!</p>';
    }
    else
    {
        $sql="update utilizator set parola = '".$_REQUEST['newpassword']."' where
        username ='".$_REQUEST['username']."'";
        $statement=oci_parse($db,$sql);
        $result=oci_execute($statement);
        echo '<p style="color: white;
        text-align: center;margin-top : 5%">Ai schimbat parola cu succes!</p>';
    }
}
}?>


