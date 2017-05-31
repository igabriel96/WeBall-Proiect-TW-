<?php
 		$db=oci_connect('student','STUDENT','localhost/XE');
		$sql ="select (Select nume from echipe where id=id_echipa) as echipa,GRUPA,VICTORII,EGALURI,INFRANGERI,GOLURI_DATE,GOLURI_PRIMITE,PUNCTAJ from clasament order by grupa ,punctaj desc";
		$statement=oci_parse($db,$sql);
		$result=oci_execute($statement);
		$data="[";
		while($row=oci_fetch_array($statement))
		{
			$data.='{"echipa":"'.$row['ECHIPA'].'","grupa":"'.$row['GRUPA'].'","vicorii":"'.$row['VICTORII'].'","egaluri":"'.$row['EGALURI'].'","infrangeri":"'.$row['INFRANGERI'].'","goluri_date":"'.$row['GOLURI_DATE'].'","goluri_primite":"'.$row['GOLURI_PRIMITE'].'","punctaj":"'.$row['PUNCTAJ'].'"},';
		}
		$data=substr($data,0,sizeof($data)-2);
		$data.=']';
		echo $data;
?>