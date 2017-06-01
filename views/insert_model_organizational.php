<?php
	if($_REQUEST['tip']=='campionat')
	{
		$sql="update global_date set tip_campionat='campionat' , nr_maxim_echipe_campionat=".$_REQUEST['nr_echipe_campionat'] . " where id=1";
		$statement=oci_parse($db, $sql);
		oci_execute($statement);
	}
	else
	{
		$sql="update global_date set  tip_campionat='cupa' , nr_maxim_echipe_grupa=".$_REQUEST['nr_echipe_grupe'] ."where id=1";
		$statement=oci_parse($db, $sql);
		oci_execute($statement);
	}
?>