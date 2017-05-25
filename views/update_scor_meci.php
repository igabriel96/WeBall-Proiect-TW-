<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php?action=update_scor_meci&id_meci=<?php echo $_REQUEST['id_meci']?>&set_score=1" method="POST">
 
    <div class="container">
      <label><b>Points host team</b></label>
      <input type="text" pattern="[0-9]+" maxlength="3"  name="goluri_echipa_gazda" required>
      <label><b>Points guest team</b></label>
      <input type="text" pattern="[0-9]+" maxlength="3" name="goluri_echipa_oaspete" required>
      <button type="SET SCORE">Set Score</button>
    </div>
    
  </form>
