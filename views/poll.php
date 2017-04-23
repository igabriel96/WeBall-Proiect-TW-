<!DOCTYPE html>
<?php require_once('header.php') ?>
<html>
<body>
<div class="poll-body">    
<fieldset>
	<legend>Which team is better?</legend>
	<form action="index.php?action=pollresults" id="form1" name="form1" method="POST">
		<label>
			<input type="radio" name="Poll" value="barcelona" id="Poll_0" />
			Barcelona
		 </label>
		<label>
			<input type="radio" name="Poll" value="realmadrid" id="Poll_1" />
			Real Madrid
		</label>
            <label>
			<input type="radio" name="Poll" value="equal" id="Poll_2" />
			Are equal
		</label>
		<input type="submit" name="submit" id="submit" value="Submit vote!" />
		<input type="hidden" name="id" value="form1" />
		<input type="hidden" name="MM_insert" value="form1" />
	</form>
</fieldset>
</div>
</body>
</html>