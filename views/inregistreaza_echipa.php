<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php?action=inregistreaza_echipa" method="POST">
 
    <div class="container">
      <label><b>Name team</b></label>
      <input type="text"  maxlength="20"  name="nume" required>
      <label><b>Country</b></label>
      <input type="text"  maxlength="20" name="tara" required>
      <label><b>Number of players</b></label>
      <input type="text" pattern="[1-9][0-9]" maxlength="2" name="numar_jucatori" required>
      <button type="Submit">Register Team</button>
    </div>
    
  </form>
