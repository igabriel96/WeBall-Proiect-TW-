<?php require_once('header.php') ?>
<form class="modal-content animate" action="index.php?action=insert_model_organizational" method="POST">
 
	<div class="container">
    <label><b>Organization type</b></label><br>

    <input type="radio" value="cupa"  onclick="document.getElementById('nr_echipe_grupe').style.display='inline';document.getElementById('nr_echipe_campionat').style.display='none'"  name="tip">Cupa cu 4 grupe (primele 2 se califica)<br>
    <input type="radio" value="campionat" onclick="document.getElementById('nr_echipe_grupe').style.display='none';document.getElementById('nr_echipe_campionat').style.display='inline'"   name="tip">Campionat<br>
    <div id="nr_echipe_grupe" style="display: none">
    <label>Numar echipe pe grupa</label><br>
    <input type="number" name="nr_echipe_grupe" maxlength=3 >
    </div>
    <div id="nr_echipe_campionat" style="display: none">
    <label>Numar echipe campionat</label><br>
    <input  type="number" name="nr_echipe_campionat"  maxlength=3>
    </div>
    <button type="Submit">Set</button>
    </div>
	
</form>
