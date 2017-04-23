
<?php require_once('header.php') ?>

<form class="modal-content animate" action="index.php?action=elimina_conturi" method="POST">
 
	
    <div class="container">
      <label><b>Account Name</b></label>
      <input type="text"  maxlength="20"  placeholder="Name" name="nume cont" required>
	  
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
	</div>
      <button type="Submit">Delete account</button>
    </div>
	
</form>




