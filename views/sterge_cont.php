
<?php require_once('header.php') ?>

<?php 
   
$sql="select rol from utilizator where username = '".$_REQUEST['username']."'";
$statement=oci_parse($db,$sql);
$result=oci_execute($statement);
$row = oci_fetch_row($statement);
if($row[0] == admin)
{
    echo '<p style="color: white;
    text-align: center;margin-top : 5%">Nu poti sterge contul unui alt admin!</p>';
}
else
{
    $sql="delete from utilizator where username = '".$_REQUEST['username']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
     echo '<p style="color: white;
    text-align: center;margin-top : 5%">Stergerea userului s-a realizat cu succes!</p>';
}
?>
<?php require_once('footer.php') ?>
