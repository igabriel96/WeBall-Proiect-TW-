<!DOCTYPE html>
<?php require_once('header.php') ?>

<form class="modal-content animate" action="http://localhost:8181/index.php?action=reviews&id_meci=1" method="POST" style="width: 50%;height:40%">
 
	<div class="container">
    <label><b><center>Edit your review</center></b></label>
    <input type="hidden" name="id_review" value="<?php echo $_REQUEST['id_review'];?>">    
    <input type="text"  maxlength="30" placeholder="Insert text..."  name="editreview">
    <button type="Submit">Edit</button>
    </div>
	
</form>

<?php require_once('footer.php') ?>
