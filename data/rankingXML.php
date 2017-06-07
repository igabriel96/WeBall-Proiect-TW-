<?php		
		$db=oci_connect('student','STUDENT','localhost/XE');
		$sql ="select id,(Select nume from echipe where id=id_echipa) as echipa,GRUPA,VICTORII,EGALURI,INFRANGERI,GOLURI_DATE,GOLURI_PRIMITE,PUNCTAJ from clasament order by grupa ,punctaj desc";
		$statement=oci_parse($db,$sql);
		$result=oci_execute($statement);
		header('Content-Type: application/xml');
		header('Content-Disposition: attachement; filename="meciuri.xml"');
		$fp = fopen('php://output', 'w');
		fwrite($fp,"<?xml version='1.0' encoding='iso-8859-1' ?>"."\n");
		fwrite($fp ,'<feed xml:lang="en-US" xmlns="http://www.w3.org/2005/Atom">'."\n");
		fwrite($fp,'<title>Ranking</title>'."\n");
		fwrite($fp, '<subtitle> Provisional ranking</subtitle>'."\n");
		fwrite($fp,'<link href="http://www.weball.com/views/ranking" rel="self/">'."\n");
		date_default_timezone_set('Europe/Bucharest');
		$date = date('m/d/Y', time());
		fwrite($fp ,'<updated>'.$date.'</updated>'."\n");
		fwrite($fp,'<author>'."\n");
		fwrite($fp,"<name>Vinatoru Razvan</name>"."\n");
		fwrite($fp,"<email>vinatorurazvan@gmail.com</email>"."\n");
		fwrite($fp,'</author>'."\n");
		fwrite($fp,'<category term="sport"/>'."\n");
		$contor=1;
		while($row = oci_fetch_array($statement)) {

			fwrite($fp,'<entry>'."\n");
			fwrite($fp,'<id>'.$row['ID'].'</id>'."\n");
			fwrite($fp,'<title>Team</title>'."\n");
			fwrite($fp,'<link href="http://weball.com/views/ranking" />'."\n");
			fwrite($fp,'<content type="text/xml">'."\n");
			fwrite($fp ,'<team>'.$row[1].'</team>'."\n");
			fwrite($fp,'<rank>'.$contor.'</rank>'."\n");
			fwrite($fp,'<wins>'.$row['VICTORII'].'</wins>'."\n");
			fwrite($fp,'<loss>'.$row['INFRANGERI'].'</loss>'."\n");
			fwrite($fp,'<draws>'.$row['EGALURI'].'</draws>'."\n");
			fwrite($fp,'<goals_scored>'.$row['GOLURI_DATE'].'</goals_scored>'."\n");
			fwrite($fp,'<goals_received>'.$row['GOLURI_PRIMITE'].'</goals_received>'."\n");
			fwrite($fp,'<scores>'.$row['PUNCTAJ'].'</scores>'."\n");
			fwrite($fp,'</content>'."\n");
			fwrite($fp,'</entry>'."\n");
			$contor++;
		}
		fwrite($fp,'</feed>');
		fclose($fp);
?>
