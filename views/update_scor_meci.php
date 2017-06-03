<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php?action=update_scor_meci&id_meci=
      <?php echo $_REQUEST['id_meci']?>&set_score=1" method="POST" style="width:25%">
 
    <div class="container">
      <label style="margin-left: 26%"><b>Points host team</b></label>
      <input type="text" pattern="[0-9]+" maxlength="2"  name="goluri_echipa_gazda" required>
      <label style="margin-left: 26%"><b>Points guest team</b></label>
      <input type="text" pattern="[0-9]+" maxlength="2" name="goluri_echipa_oaspete" required>
      <button type="SET SCORE">Set Score</button>
    </div>
    
  </form>
