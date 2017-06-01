<table class="tablematches">
 	<tr>
         <th>Nume</th>
         <th>Prenume</th> 
         <th>Varsta</th>
         <th>Nationalitate</th>
    </tr>
 	<?php  
   $db=oci_connect('student','STUDENT','localhost/XE');
   echo $_REQUEST['id_echipa'];
   $sql = "SELECT nume,prenume,varsta, nationalitate from jucatori where id_echipa=".$_REQUEST['id_echipa'];
   echo '<br>';
   $statement=oci_parse($db,$sql);
   $result=oci_execute($statement);
 	while($row = oci_fetch_array($statement)){ ?>
 		<tr>
			<td><?php echo oci_result($statement,'NUME')?></td>
			<td><?php echo oci_result($statement,'PRENUME')?></td>
			<td><?php echo oci_result($statement,'VARSTA')?></td>
            <td><?php echo oci_result($statement,'NATIONALITATE')?></td>
		</tr>
 	<?php } ?>
</table>
<br>
<br>
