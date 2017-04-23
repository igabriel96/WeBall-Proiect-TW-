<?php require_once('header.php') ?>
<div>
	<form action="http://localhost:8181/TW/index.php?action=update_scoruri&find_on=1" method="POST">
    <div class="container">
      <button type="submit">Cauta meci</button>
      <label><b>Echipa gazda</b></label>
      <input type="text" placeholder="Echipa gazda" name="echipa_gazda" value="<?php if(isset($_REQUEST['echipa_gazda'])){echo $_REQUEST['echipa_gazda'];}?>">
      <label><b>Echipa oaspete</b></label>
      <input type="text" placeholder="Echipa oaspete" name="echipa_oaspete" value="<?php if(isset($_REQUEST['echipa_oaspete'])){echo $_REQUEST['echipa_oaspete'];}?>" >
    </div>
  </form>
</div>
<?php
	if(isset($_REQUEST['find_on']))
	{	
?>
<table>
	<tr>
	    <td><strong>Data<strong></th>
	    <td><strong>Echipa gazda<strong></th> 
	    <td><strong>Echipa oaspete<strong></th>
	    <td><strong>Scor</strong></th>
	</tr>
	<?php 
	while(oci_fetch($statement)){ ?>
		<tr>
			<td><?php echo oci_result($statement,'DATA')?></td>
			<td><?php echo oci_result($statement,'ECHIPA_GAZDA')?></td>
			<td><?php echo oci_result($statement,'ECHIPA_OASPETE')?></td>
			<td><a href="index.php?action=update_scor_meci&id_meci=<?php echo oci_result($statement,'ID')?>" ><?php echo oci_result($statement,'REZ1').'-'.oci_result($statement,'REZ2')?></a></td>
		</tr>
	<?php } ?>
<table>
<?php }?>

