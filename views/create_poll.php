<?php require_once('header.php') ?>
<div>
	<form action="index.php?action=insert_poll" method="POST">
    <div class="container" style="border:1px solid white;margin-left:33.5%;height:50%;width:30%">
        <label style="color:white;margin-left:30%;margin-bottom:10%"><b>Choose the match</b></label><br><br>
        <select name="id_meci"><?php
        $sql="select (select nume from echipe where id=id_echipa1) as echipa1 , (select nume from echipe where id=id_echipa2) as echipa2 ,id from meciuri";
        $statement=oci_parse($db, $sql);
        oci_execute($statement);
        while($row=oci_fetch_array($statement))
        	echo '<option value="'.$row['ID'].'" >'.$row['ECHIPA1'].'-'.$row['ECHIPA2'].'</option>';
         ?>
      </select><br>
     <label style="color:white">Question :</label><br>
     <input type="text" name="intrebare" required="">
     <div id="raspuns1" >
     <label style="color:white">Answer 1 :</label><br>
     <input type="text" onkeypress ="document.getElementById('raspuns2').style.display='inline'"  name="raspuns1" required><br>
     </div>
      <div id="raspuns2" requierd   onkeypress="document.getElementById('raspuns3').style.display='inline'" style="display: none">
     <label style="color:white">Answer 2 :</label><br>
     <input type="text"  onkeypress="document.getElementById('raspuns3').style.display='inline'" name="raspuns2"><br>
     </div>
      <div id="raspuns3" onkeypress="document.getElementById('raspuns4').style.display='inline'" style="display: none">
     <label style="color:white">Answer 3 :</label><br>
     <input type="text" name="raspuns3"><br>
     </div>
       <div id="raspuns4" style="display: none">
     <label style="color:white">Answer 4 :</label><br>
     <input type="text" name="raspuns4"><br>
     </div>
     <button type="submit" style="width:55%;margin-left:24%">Create poll</button>
    </div>
  </form>
</div>
