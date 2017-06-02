
<table class="tablematches">
	<tr>
        <th>Data meci</th>
        <th>Echipa gazda</th> 
        <th>Scorul</th>
        <th>Echipa oaspete</th>
        <th>Grupa</th>
        <th>Review</th>
        <th>Poll</th>
	 </tr>
	<?php  
  $db=oci_connect('student','STUDENT','localhost/XE');
  $sql="select id , 
  (Select nume from echipe where id=id_echipa1) as echipa1, 
  (Select logo from echipe where id=id_echipa1) as logo1, 
  (Select logo from echipe where id=id_echipa2) as logo2,
  (Select nume from echipe where id=id_echipa2) as echipa2,
  id_grupa,etapa , rezultat1,rezultat2,data_meci from meciuri where etapa=".$_REQUEST['etapa'];
  echo '<br>';
  $statement=oci_parse($db,$sql);
  $result=oci_execute($statement);
	while($row = oci_fetch_array($statement)){ ?>
		<tr>
            <div class="displaymatches">
                <td><?php echo substr($row['DATA_MECI'],0,2).
                str_repeat('&nbsp;',1).substr($row['DATA_MECI'],3,1).
                strtolower(substr($row['DATA_MECI'],4,2)).
                str_repeat('&nbsp;', 1).'20'.
                substr($row['DATA_MECI'],7,2) ?></td>
                <td><?php echo $row['ECHIPA1']?></td>
                <td>
                <div id="scorescontainer">
                  <div id="leftimg">    
                    <img src="<?php echo $row['LOGO1'] ?>" >
                  </div>
                  <div id="centerscore">
                    <?php echo $row['REZULTAT1'].'-'.$row['REZULTAT2']?>
                  </div>       
                  <div id="rightimg">
                      <img src="<?php echo $row['LOGO2'] ?>" >
                 </div>
               </div>
              </td>
            <td><?php echo $row['ECHIPA2']?></td>
            <td><?php echo $row['ID_GRUPA']?></td>
            
     	    <td ><div class="reviewpoll"><a href="index.php?action=reviews&id_meci=<?php echo $row['ID']?>" style="color: white"><center> REVIEW </center></a></div></td>
            <td><div class="reviewpoll"><a href="index.php?action=poll&id_meci=<?php echo $row['ID']?>" style="color: white"><center> POLL </center></a></div></td>
			</div></tr>
	<?php } ?>
	</table>
