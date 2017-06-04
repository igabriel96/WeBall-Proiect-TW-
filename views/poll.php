<!DOCTYPE html>
<?php require_once('header.php') ?>
<?php 
	$sql="Select count(*),id from poll where id_meci=".$_REQUEST['id_meci'].' group by id';
	$statement=oci_parse($db, $sql);
	oci_execute($statement);
	$row=oci_fetch_array($statement);
	if($row[0]==0)
	{
		echo '<div style="text-align:center">Momentan nu exista un poll pentru acest meci</div>';
	}
	else
	{
		$sql="Select count(*) from vote_poll where id_poll=".$row[1].' and id_utilizator='.$_SESSION['uid'];
		$statement=oci_parse($db, $sql);
		oci_execute($statement);
		$row=oci_fetch_array($statement);
		if($row[0]==0)
		{
	?>
			<fieldset style="width: 25%;text-align: center" >
				<?php
					$sql="Select * from poll where id_meci=".$_REQUEST['id_meci'];
					$statement=oci_parse($db, $sql);
					oci_execute($statement);
					$row=oci_fetch_array($statement);
					 ?>
				<legend><?php echo $row['INTREBARE']; ?></legend>
				<form action="index.php?action=insert_vote_poll" id="form1" name="form1" method="POST" style="text-align: left;color:white">
				<input type="hidden" name="id_poll" value="<?php echo $row['ID']; ?>">
					<?php
					$contor=1;
					while(isset(($row['RASPUNS'.$contor])))
					{
						echo '<label>';
						echo '<input type="radio" name="Poll" value="'.$contor.'" id="'.$contor.'" />';
						echo $row['RASPUNS'.$contor];
					 echo '</label>';
					 echo '<br>';
					 $contor++;
					}
					?>
					<div id="button_submit" style="text-align: center">
					<input type="submit" name="submit" id="submit" value="Vote" style=" width: 15% ;height: 10%" />
					</div>
					<input type="hidden" name="id" value="form1" />
					<input type="hidden" name="MM_insert" value="form1" />
				</form>
			</fieldset>
	<?php }}?>
