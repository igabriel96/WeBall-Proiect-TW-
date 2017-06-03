<!DOCTYPE html>
<?php require_once('header.php') ?>


<form class="modal-content animate" action="index.php?action=afisare_cont" method="POST" style="width:25%">
 
	<div class="container">
    <label style="margin-left:23%"><b>Account Username</b></label>
    <input type="text"  maxlength="30" placeholder="Insert username"  name="username" >
    <button type="Submit">Search</button>
    </div>
	
</form>

<?php require_once('footer.php') ?>
