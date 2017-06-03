<!DOCTYPE html>
<?php require_once('header.php') ?>
<fieldset style="width: 50%;text-align: center" >
	<?php
		$sql="Select * from poll where id_meci=".$_REQUEST['id_meci'];
		$statement=oci_parse($db, $sql);
		oci_execute($statement);
		$row=oci_fetch_array($statement);
		 ?>
	<legend><?php echo $row['INTREBARE']; ?></legend>
	<form action="index.php?show_poll" id="form1" name="form1" method="GET" style="text-align: left">
		<?php
		$contor=1;
		while(isset(($row['RASPUNS'.$contor])))
		{
			echo '<label>';
			echo '<input type="radio" name="Poll" value="'.$row['RASPUNS'.$contor].'" id="'.$contor.'" />';
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
