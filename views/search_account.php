<!DOCTYPE html>
<?php require_once('header.php') ?>


<form class="modal-content animate" action="http://localhost:8181/TW/index.php?action=afisare_cont" method="POST">
 
	<div class="container">
    <label><b>Account Username</b></label>
    <input type="text"  maxlength="30" placeholder="Insert username"  name="username" >
    <button type="Submit">Search</button>
    </div>
	
</form>

<?php require_once('footer.php') ?>