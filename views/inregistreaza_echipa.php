<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php?action=inregistreaza_echipa" method="POST">
 
    <div class="container">
      <label><b>Nume echipa</b></label>
      <input type="text"  maxlength="20"  name="nume" required>
      <label><b>Tara</b></label>
      <input type="text"  maxlength="20" name="tara" required>
      <label><b>Numar jucatori</b></label>
      <input type="text" pattern="[1-9][0-9]" maxlength="2" name="numar_jucatori" required>
      <button type="Submit">Inregistreaza echipa</button>
    </div>
    
  </form>