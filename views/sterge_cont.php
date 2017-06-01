
<?php require_once('header.php') ?>
<?php require_once('class/class.user.php')?>

<?php
$row = oci_fetch_row($statement);

if($_REQUEST['username'] == $row[0])
{
     
     $sql="delete from utilizator where username = '".$row[0]."'";
     $statement=oci_parse($db,$sql);
     $result=oci_execute($statement);
     echo '<p style="color: white;
     text-align: center;margin-top : 5%">Stergerea contului s-a realizat cu succes!</p>';
     logout();
     die();
}
else
{

    $sql="select rol from utilizator where username = '".$_REQUEST['username']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
    $row = oci_fetch_row($statement);
    if($row[0] == admin)
        {
            echo '<p style="color: white;
            text-align: center;margin-top : 5%">Nu poti sterge contul unui  alt admin!</p>';
        }
    else
        {
        $sql="delete from utilizator where username = '".$_REQUEST['username']."'";
        $statement=oci_parse($db,$sql);
        $result=oci_execute($statement);
        echo '<p style="color: white;
        text-align: center;margin-top : 5%">Stergerea userului s-a realizat cu succes!</p>';
}
}
?>
<?php require_once('footer.php') ?>
