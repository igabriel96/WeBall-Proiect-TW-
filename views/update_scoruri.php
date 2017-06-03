<?php require_once('header.php') ?>
<br>
<div>
	<form action="index.php?action=update_scoruri&find_on=1" method="POST">
    <div class="container" style="border:1px solid white;margin-left:33.5%;height:50%;width:30%">
        <label style="color:white;margin-left:30%;margin-bottom:10%"><b>Choose the match</b></label><br><br>
    
      <select name="id_meci" style="padding:6px 10px;width:32%;margin-left: 35%" ><?php
        $sql="select (select nume from echipe where id=id_echipa1) as echipa1 , (select nume from echipe where id=id_echipa2) as echipa2 ,id from meciuri";
        $statement=oci_parse($db, $sql);
        oci_execute($statement);
        while($row=oci_fetch_array($statement))
        	echo '<option value="'.$row['ID'].'" >'.$row['ECHIPA1'].'-'.$row['ECHIPA2'].'</option>';
         ?>
      </select><br><br>
      <button type="submit" style="width:55%;margin-left:24%">Search game</button>
    </div>
  </form>
</div>
<?php
	if(isset($_REQUEST['find_on']))
    { ?>
    <table class="tablematches">
 	<tr>
         <th>Data meci</th>
         <th>Echipa gazda</th> 
         <th>Scorul</th>
         <th>Echipa oaspete</th>
         <th>Grupa</th>
 	 </tr>
 	<?php 
   $sql="Select id , (select nume from echipe where id = id_echipa1) as echipa1, (Select logo from echipe where id = id_echipa1) as logo1, (Select logo from echipe where id = id_echipa2) as logo2,(Select nume from echipe where id = id_echipa2) as echipa2,id_grupa,etapa ,rezultat1,rezultat2,data_meci from meciuri where id=".$_REQUEST['id_meci'];
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
                    <a href="index.php?action=update_scor_meci&id_meci=<?php echo $row['ID'] ?>" style="text-decoration:none;color:red">
                       <?php echo $row['REZULTAT1'].'-'.$row['REZULTAT2']?>
                    </a>
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
