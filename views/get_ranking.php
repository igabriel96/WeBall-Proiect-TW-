<table class="tablematches">
 	<tr>
         <th>Loc</th>
         <th>Echipa</th>
         <th>Victorii</th>
         <th>Infrangeri</th>
         <th>Egaluri</th>
         <th>Goluri D.</th>
         <th>Goluri P.</th>
		 <th>Golaveraj</th>
         <th>Puncte</th>
 	 </tr>
 	<?php  
   $db=oci_connect('student','STUDENT','localhost/XE');
   $sql="select clasament.id, echipe.nume , echipe.id_grupa ,golaveraj,goluri_date, goluri_primite,victorii,infrangeri,egaluri,punctaj from clasament join echipe on clasament.id_echipa=echipe.id where echipe.id_grupa=".$_REQUEST['grupa'];
   echo '<br>';
   $statement=oci_parse($db,$sql);
   $result=oci_execute($statement);
    ?>
    <?php $contor = 1; ?>
 	<?php while($row = oci_fetch_array($statement)){ ?>
					<tr>
						<td><strong><?php echo $contor; ?></strong></td>
						<td>
                        <strong><?php echo 
                        oci_result($statement,'NUME')?></strong></td>
						<td><strong><?php echo oci_result($statement,'VICTORII')?></strong></td>
						<td><strong><?php echo oci_result($statement,'INFRANGERI')?></strong></td>
						<td><strong><?php echo oci_result($statement,'EGALURI')?></strong></td>
						<td><strong><?php echo oci_result($statement,'GOLURI_DATE')?></strong></td>
						<td><strong><?php echo oci_result($statement,'GOLURI_PRIMITE')?></strong></td>
						<td><strong><?php echo oci_result($statement,'GOLAVERAJ')?></strong></td>
						<td><strong><?php echo oci_result($statement,'PUNCTAJ')?></strong></td>
					</tr>
				<?php $contor++;} ?>
	</table>
	<br>
	<br>