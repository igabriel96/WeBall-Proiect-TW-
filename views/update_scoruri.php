<?php require_once('header.php') ?>
<br>
<div>
	<form action="http://localhost:8181/TW/index.php?action=update_scoruri&find_on=1" method="POST">
    <div class="container" style="border:1px solid white;margin-left:33.5%;height:50%;width:30%">
        <label style="color:white;margin-left:30%;margin-bottom:10%"><b>Choose the teams</b></label><br><br>
     <label style="color:white;margin-left:25%"><b>Host team</b></label>
    <select name="echipa1" style="padding:6px 10px;width:120px;margin-left:1%">
        <?php
          while(oci_fetch($echipe)){ ?>
            <option value="<?php echo oci_result($echipe,'NUME')?>"><?php echo oci_result($echipe,'NUME')?></option>
          <?php }?>
      </select><br>
      
     <label style="color:white;margin-left:25%"><b>Gest team</b></label>
     <select name="echipa2" style="padding:6px 10px;width:120px;margin-left:0.8%">
        <?php
          while(oci_fetch($echipe1)){ ?>
            <option value="<?php echo oci_result($echipe1,'NUME')?>"><?php echo oci_result($echipe1,'NUME')?></option>
          <?php }?>
      </select>
      <br>
      <button type="submit" style="width:55%;margin-left:24%">Search game</button>
    </div>
  </form>
</div>
<?php
	if(isset($_REQUEST['find_on']))
    { 
          $sql="select id from echipe where nume ='".$_REQUEST['echipa1']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
    $row1=oci_fetch_row($statement);
        
    $sql="select id from echipe where nume ='".$_REQUEST['echipa2']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
    $row2=oci_fetch_row($statement);
        
   $sql="Select (select nume from echipe where id = ".$row1[0].") as echipa1, (Select logo from echipe where id = ".$row1[0].") as logo1, (Select logo from echipe where id = ".$row2[0].") as logo2,(Select nume from echipe where id = ".$row2[0].") as echipa2,id_grupa,etapa ,rezultat1,rezultat2,data_meci from meciuri where id_echipa1 = ".$row1[0]." and id_echipa2 = ".$row2[0];
   $statement=oci_parse($db,$sql);
   $result=oci_execute($statement);
   $rowtest=oci_fetch_row($statement);
    if($rowtest[0] != NULL) 
    { ?>
    <table class="tablematches">
 	<tr>
         <th>Data meci</th>
         <th>Echipa gazda</th> 
         <th>Scorul</th>
         <th>Echipa oaspete</th>
         <th>Grupa</th>
 	 </tr>
 	<?php }  
    $sql="select id from echipe where nume ='".$_REQUEST['echipa1']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
    $row1=oci_fetch_row($statement);
        
    $sql="select id from echipe where nume ='".$_REQUEST['echipa2']."'";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
    $row2=oci_fetch_row($statement);
        
   $sql="Select (select nume from echipe where id = ".$row1[0].") as echipa1, (Select logo from echipe where id = ".$row1[0].") as logo1, (Select logo from echipe where id = ".$row2[0].") as logo2,(Select nume from echipe where id = ".$row2[0].") as echipa2,id_grupa,etapa ,rezultat1,rezultat2,data_meci from meciuri where id_echipa1 = ".$row1[0]." and id_echipa2 = ".$row2[0];
   echo '<br>';
   $statement=oci_parse($db,$sql);
   $result=oci_execute($statement);
 	while($row = oci_fetch_array($statement)){ ?>
 		<tr>
          <div class="displaymatches">
            <td>
                <?php echo substr($row['DATA_MECI'],0,2).
                str_repeat('&nbsp;',1).substr($row['DATA_MECI'],3,1).
                strtolower(substr($row['DATA_MECI'],4,2)).
                str_repeat('&nbsp;', 1).'20'.
                substr($row['DATA_MECI'],7,2) ?>
            </td>
            <td>
            <div class="awayteam" >
                <?php echo $row['ECHIPA1']?>
            </div>
            </td>
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
            <div class="awayteam" >
            <td><?php echo $row['ECHIPA2']?></td>
            </div>
            <div class="group" >  
            <td><?php echo $row['ID_GRUPA']?></td>
            </div>
        </div>
     </tr>
 	<?php } ?>   
    </table>
     }
?>

<?php }?>
