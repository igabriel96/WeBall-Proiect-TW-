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
	<?php }
		
		
		else
			{
				$sql="select * from poll where id_meci=".$_REQUEST['id_meci'];
				$statement1=oci_parse($db, $sql);
				oci_execute($statement1);
				$row1=oci_fetch_array($statement1);

				$nr_raspunsuri[0]=0;$nr_raspunsuri[1]=0;$nr_raspunsuri[2]=0;$nr_raspunsuri[3]=0;$nr_raspunsuri[4]=0;$nr_raspunsuri[5]=0;
				$nr_raspunsuri_totale=0;
				$sql="select count(*) as contor,optiune from vote_poll where id_poll=".$row1['ID'] .' group by optiune';
				$statement5=oci_parse($db,$sql);
				oci_execute($statement5);
				oci_execute($statement5);
				while($row5=oci_fetch_array($statement5))
				{
                    $nr_raspunsuri[$row5['OPTIUNE']]=$row5['CONTOR'];
                    $nr_raspunsuri_totale=$nr_raspunsuri_totale+ $row5['CONTOR'];
				}
				$sql="select intrebare,raspuns1,raspuns2,raspuns3,raspuns4 from poll where id_meci=".$_REQUEST['id_meci'];
				$statement3=oci_parse($db, $sql);
				oci_execute($statement3);
				$row3=oci_fetch_array($statement3);
				$contor=1;
				echo '<fildset>';
				echo '<legend> Results for "'.$row3[0].'"</legend>';
				echo '<ul>';
				while(isset($row3[$contor]))
				{
						echo '<li >';
							echo '<span >'.$nr_raspunsuri[$contor] .' votes : <span>  '.$row3[$contor];
							echo '<br/>';
							if($nr_raspunsuri_totale>0)
							{
								echo '<div class="results-bar" style="width:'.round(round(($nr_raspunsuri[$contor]/($nr_raspunsuri_totale))*100,2)*(4/5),2).'%;">';
								 	echo round(($nr_raspunsuri[$contor]/($nr_raspunsuri_totale))*100,2).'%';
							}
							else
							{
								echo '<div class="results-bar" style="width:0%;">';
								 	echo '0%';
							}
								echo '</div>';

						echo '</li>';
						$contor++;
				}
				echo '</ul>';
				echo '     <h6>Total votes:'.$nr_raspunsuri_totale.'</h6>';
				echo "</fildset>";

			}
	}?>
