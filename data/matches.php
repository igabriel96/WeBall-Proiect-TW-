<?php 
	$db=oci_connect('student','STUDENT','localhost/XE');
	$sql="select id , 
  (Select nume from echipe where id=id_echipa1) as echipa1, 
  (Select nume from echipe where id=id_echipa2) as echipa2,
  id_grupa,etapa , rezultat1,rezultat2,data_meci from meciuri";
	$statement=oci_parse($db,$sql);
	$data="[";
	oci_execute($statement);
	while($row=oci_fetch_array($statement))
	{
		$data.='{"data_meci":' .'"'.$row['DATA_MECI'].'","echipa_gazda":'.'"'.$row['ECHIPA1'].'","echipa_oaspete":"'.$row['ECHIPA2'].'","goluri_echipa_gazda":"'.$row['REZULTAT1'].'","goluri_echipa_oaspete":"'.$row['REZULTAT2'].'"},';
	}
	$data=substr($data,0,sizeof($data)-2);
	$data.=']';
		echo $data;
?>