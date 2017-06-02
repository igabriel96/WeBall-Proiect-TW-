<?php require_once('header.php') ?>

<?php

if(!isset($_REQUEST['nume']))
{?>

<form class="modal-content animate" action="index.php?action=inregistreaza_jucator&filter_on=1" method="POST">
 
    <div class="container">
      <label><b>Surname</b></label>
      <input type="text"  maxlength="20"  placeholder="Insert the surname of the player" name="nume"  pattern="[a-zA-Z].{1,}" title="The surname of the player should have at least two letters" >
      <label><b>Given Name</b></label>
      <input type="text"  maxlength="20" name="prenume"  placeholder="Insert the given name of the player" pattern="[a-zA-Z].{1,}" title="The given name of the player should have at least two letters">
      <label><b>Age</b></label><br>
      <input type="number"  placeholder="Age" maxlength="2" title="Only numbers" name="varsta" min="16" max="45" style="padding:6px 10px;width:95px">
      <br><label><b>Team</b></label><br>
      <select name="echipa" style="padding:6px 10px;width:120px">
        <?php
          while(oci_fetch($echipe)){ ?>
            <option value="<?php echo oci_result($echipe,'NUME')?>"><?php echo oci_result($echipe,'NUME')?></option>
          <?php }?>
      </select><br>
      <label><b>Nationality</b></label><br>
      <select name="nationalitate" style="padding:6px 10px;width:120px">
        <?php
          while(oci_fetch($tari)){ ?>
            <option value="<?php echo oci_result($tari,'NATIONALITATE')?>"><?php echo oci_result($tari,'NATIONALITATE')?></option>
          <?php }?>
      </select>
      <button type="Submit">Register player</button>
    </div>
  </form>
<?php }  else { 
    if(isset($_REQUEST['filter_on'])) {
        $nume = $_REQUEST['nume'];
        $prenume = $_REQUEST['prenume'];
        $varsta = $_REQUEST['varsta'];
        $echipa = $_REQUEST['echipa'];
        $nationalitate = $_REQUEST['nationalitate'];
         $sql="select id from echipe where nume ='".$echipa."'";
         $statement=oci_parse($db,$sql);
         $result=oci_execute($statement);
         $row=oci_fetch_row($statement);
         $sql="insert into jucatori(nume,prenume,nationalitate,varsta,id_echipa) values('".$nume."','".$prenume."','".$nationalitate."','".$varsta."','".$row[0]."')";
        $statement=oci_parse($db,$sql);
        $result=oci_execute($statement);
        echo '<p style="color: white;
        text-align: center;margin-top : 5%">Ai inregistrat jucatorul cu succes!</p>';
    }
}?>
<?php require_once('views/footer.php');
