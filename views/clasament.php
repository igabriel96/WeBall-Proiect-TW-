<?php require_once('views/header.php');
while(oci_fetch($statement_id_grupa))
{ 
	$id_grupa=oci_result($statement_id_grupa,'ID_GRUPA');
	$sql="select clasament.id, echipe.nume , echipe.id_grupa ,golaveraj,goluri_date, goluri_primite,victorii,infrangeri,egaluri,punctaj from clasament join echipe on clasament.id_echipa=echipe.id where echipe.id_grupa=$id_grupa order by punctaj desc";
	$echipe_grupa=oci_parse($db,$sql);
	oci_execute($echipe_grupa);
	?>
	<table>
		<tr>
			<th>Loc</th>
			<th>Echipa</th>
			<th>Victori</th>
			<th>Infrangeri</th>
			<th>Egaluri</th>
			<th>Goluri date</th>
			<th>Goluri primite</th>
			<th>Golaveraj</th>
			<th>Puncte</th>
		</tr>
		<?php while(oci_fetch($echipe_grupa)){ $contor=1;?>
					<tr>
						<td><strong><?php echo $contor;$contor=$contor+1;?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'NUME')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'VICTORII')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'INFRANGERI')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'EGALURI')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'GOLURI_DATE')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'GOLURI_PRIMITE')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'GOLAVERAJ')?></strong></td>
						<td><strong><?php echo oci_result($echipe_grupa,'PUNCTAJ')?></strong></td>
					</tr>
				<?php } ?>
	</table>
	<br>
	<br>
<?php } ?>

