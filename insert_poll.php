<?php require_once('header.php') ?>
<?php
	$sql1="insert into poll(id_meci,intrebare ";
	$sql2=" values(".$_REQUEST['id_meci'].",'".$_REQUEST['intrebare']."'";
	$raspuns="raspuns1";
	$contor=1;
	while($_REQUEST[$raspuns])
	{
		$sql1.=",".$raspuns.",vot".$contor;
		$sql2.=",'".$_REQUEST[$raspuns]."',0";
		$contor++;
		$raspuns="raspuns".$contor;
	}
	$sql=$sql1.') '.$sql2.')';
	$statement=oci_parse($db,$sql);
	oci_execute($statement);

?>
