<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php" method="POST">
 
    <div class="container">
      <input type="hidden" name="action" value="insert_echipa"></input>
      <label><b>Name team</b></label>
      <input type="text"  maxlength="20"  name="name" required>
      <label><b>Country</b></label>
      <input type="text"  maxlength="20" name="tara" required>
      <button type="Submit">Register Team</button>
    </div>  
  </form>
