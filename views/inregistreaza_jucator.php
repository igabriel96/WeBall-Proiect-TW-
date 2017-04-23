<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php?action=inregistreaza_jucator" method="POST">
 
    <div class="container">
      <label><b>Surname</b></label>
      <input type="text"  maxlength="20"  name="nume" required>
      <label><b>Given Name</b></label>
      <input type="text"  maxlength="20" name="prenume" required>
      <label><b>Age</b></label>
      <input type="text" pattern="[1-9][0-9]" maxlength="2" name="varsta" required>
      <label><b>Team</b></label><br>
      <select name="echipa">
        <?php
          while(oci_fetch($echipe)){ ?>
            <option value="<?php echo oci_result($echipe,'NUME')?>"><?php echo oci_result($echipe,'NUME')?></option>
          <?php }?>
      </select><br>
      <label><b>Nationality</b></label><br>
      <select name="nationalitate">
        <?php
          while(oci_fetch($tari)){ ?>
            <option value="<?php echo oci_result($tari,'NUME')?>"><?php echo oci_result($tari,'NUME')?></option>
          <?php }?>
      </select>
      <button type="Submit">Register player</button>
    </div>
    
  </form>
