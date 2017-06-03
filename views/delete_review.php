<!DOCTYPE html>
<?php require_once('header.php') ?>


<form class="modal-content animate" action="http://localhost:8181/TW/index.php?action=reviews&id_meci=<?php echo $_REQUEST['id_meci']?>" method="POST" style="width: 30%;height:20%">
 
	<div class="container">
    <label style="height:100%"><b><center>You really want to delete the review?</center></b></label>
    <input type="hidden" name="id_review" value="<?php echo $_REQUEST['id_review'];?>"><br>    
    <button type="Submit" style="float:left;width:48%;margin-right: 2%" name="yes" value="yes">Yes</button>
    <button type="Submit" style="float:left;width:48%;margin-left:2%" name="no" value="no">No</button> 
    <br>
    <br>
    </div>
	
</form>


<?php require_once('footer.php') ?>