<?php
if(!isset($_REQUEST['tara']))
{
	$uri='http://api.football-data.org/v1/competitions/'.$_REQUEST['id_campion'].'/teams/';
	$reqPrefs['http']['method']='GET';
	$reqPrefs['http']['header']='X-Auth-Token: 8aea7ae20b5340f585f81fecc3474c9d';
	$stream_context = stream_context_create($reqPrefs);
	$json = file_get_contents($uri, false, $stream_context);
	$data = json_decode($json, TRUE);
	foreach($data['teams'] as $item) 
	{
		if($item['name']==$_REQUEST['nume_echipa'])
		{
			$sql="select * from global_date";
			$statement=oci_parse($db,$sql);
			oci_execute($statement);
			$row=oci_fetch_array($statement);

			if($row['TIP_CAMPIONAT']=='campionat')
			{
				if($row['NR_MAXIM_ECHIPE_CAMPIONAT']>$row['NR_ECHIPE_CAMPIONAT'])
				{	
					$sql="Insert into echipe(nume,logo,tara) values('".$item['name'];
					$sql.="','".$item['crestUrl']."',1)";
					$statement=oci_parse($db,$sql);
					oci_execute($statement);
					$sql="update global_date set NR_ECHIPE_CUPA=".($row['NR_ECHIPE_CUPA']+1);
					$statement=oci_parse($db,$sql);
					oci_execute($statement);
					break;
				}

			}
			else
			{
				if($row['NR_MAXIM_ECHIPE_CUPA']>$row['NR_ECHIPE_CUPA']*4)
				{	
					$sql="Insert into echipe(nume,logo,tara) values('".$item['name'];
					$sql.="','".$item['crestUrl']."',1)";
					$statement=oci_parse($db,$sql);
					oci_execute($statement);
					$sql="update global_date set NR_ECHIPE_CUPA=".($row['NR_ECHIPE_CUPA']+1);
					$statement=oci_parse($db,$sql);
					oci_execute($statement);
					break;
				}

			}
		}
	}
}
else
{
			$sql="Insert into echipe(nume,tara,logo) values('";
			$sql.=$_REQUEST['name']."',";
			$sql.="'".$_REQUEST['tara'];
			$sql.="',";
			$sql.="'"."http://wcdn1.dataknet.com/static/resources/icons/set112/b86bd18a.png"."')";
			$statement=oci_parse($db,$sql);
			oci_execute($statement);
}
?>
