<?php require_once('header.php') ?>
<?php 
$sql="Select tip_campionat from global_date";
$statement=oci_parse($db,$sql);
oci_execute($statement);
$row=oci_fetch_array($statement);
if($row[0]!='necunoscut')
{
?>
	<?php 
		$sql="Select * from global_date";
		$statement=oci_parse($db,$sql);
		oci_execute($statement);
		$row2=oci_fetch_array($statement);
		$sql="Select  count(*) from meciuri";
		$statement=oci_parse($db,$sql);
		oci_execute($statement);
		$row3=oci_fetch_array($statement);
		if($row2['TIP_CAMPIONAT']=='campionat'&&$row2['NR_MAXIM_ECHIPE_CAMPIONAT']>$row2['NR_ECHIPE_CAMPIONAT'])
			echo '<a href="index.php?action=alege_tip_echipa" style="float:center;"><button>Register team</button></a>';
		if($row2['TIP_CAMPIONAT']=='cupa'&&$row2['NR_MAXIM_ECHIPE_CUPA']>$row2['NR_ECHIPE_CUPA']*4)
			echo '<a href="index.php?action=alege_tip_echipa" style="float:center;"><button>Register team</button></a>';
		if($row2['TIP_CAMPIONAT']=='campionat'&&$row2['NR_MAXIM_ECHIPE_CAMPIONAT']=$row2['NR_ECHIPE_CAMPIONAT']&&$row3[0]==0)
			echo '<a href="index.php?action=creaza_etape" style="float:center;"><button>Stabileste meciuri</button></a>';
		if($row2['TIP_CAMPIONAT']=='cupa'&&$row2['NR_MAXIM_ECHIPE_CUPA']=$row2['NR_ECHIPE_CUPA']*4&&$row3[0]==0)
			echo '<a href="index.php?action=creaza_etape" style="float:center;"><button>Stabileste_meciuri</button></a>';
	?>

	<a href="index.php?action=inregistreaza_jucator" style="float: center;"><button>Register player</button></a>
	<a href="index.php?action=sterge_echipa" style="float: center;"><button>Set teams</button></a>
	<a href="index.php?action=delete_database" style="float: center;"><button>Delete database</button></a>
<?php }else{ ?>

<a href="index.php?action=seteaza_model_organizational" style="float: center;"><button>Set Organizational model</button></a>
<?php }?>
