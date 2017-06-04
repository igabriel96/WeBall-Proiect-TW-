<!DOCTYPE html>
<?php require_once('header.php') ?>


<form class="modal-content animate" action="index.php?action=reviews&id_meci=<?php echo $_REQUEST['id_meci']?>" method="POST" style="width: 30%;height:20%">
 
	<div class="container">
    <label style="height:100%"><b><center>Do you really want to react to review?</center></b></label>
    <input type="hidden" name="id_review" value="<?php echo $_REQUEST['id_review'];?>">
    <input type="hidden" name="id_reactie" value="<?php echo $_REQUEST['id_reactie'];?>">      
    <button type="Submit" style="float:left;width:48%;margin-right: 2%" name="yes_react" value="yes_react">Yes</button>
    <button type="Submit" style="float:left;width:48%;margin-left:2%" name="no_react" value="no_react">No</button> 
    <br>
    <br>
    </div>
	
</form>


<?php require_once('footer.php') ?>
