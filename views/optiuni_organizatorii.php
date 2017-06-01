<?php require_once('header.php') ?>
<?php 
$sql="Select organizare_campionat.getTipCampionat() from dual";
$statement=oci_parse($db,$sql);
oci_execute($statement);
$row=oci_fetch_array($statement);
if($row[0]!='necunoscut')
{
?>
<a href="index.php?action=alege_tip_echipa" style="float:center;"><button>Register team</button></a>
<a href="index.php?action=inregistreaza_jucator" style="float: center;"><button>Register player</button></a>
<a href="index.php?action=sterge_echipa" style="float: center;"><button>Set teams</button></a>
<?php } ?>
<a href="index.php?action=seteaza_grupe" style="float: center;"><button>Set Organizational model</button></a>
