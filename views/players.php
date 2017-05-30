<!DOCTYPE html>
<script>
var etape=<?php $sql="select count(*) from echipe";
    $statement=oci_parse($db,$sql); 
    $result=oci_execute($statement);
    $row = oci_fetch_array($statement);
	echo $row[0]; ?>;
window.onload=get_data(1);
	function get_data(index)
	{
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("players_data").innerHTML = this.responseText;
		  }
		  };
        xhttp.open("GET", "views/get_players.php?id_echipa="+index, true);
        xhttp.send();
	}
</script>
<?php require_once('header.php') ?>
<button id="etapa_viitoare" class="button_cursor" onclick="if(document.getElementById('index_select').value<etape){document.getElementById('index_select').value++;get_data(document.getElementById('index_select').value)}" style="float: right;">Echipa viitoare</button>
<select id="index_select" onchange="get_data(document.getElementById('index_select').value)" style="float: right ;height: 30px ;width: 10%;">
<?php
    for($i=1;$i<=$row[0];$i++) 
    {
        $sql="select nume from echipe where id =".$i;
        $statement=oci_parse($db,$sql); 
        $result=oci_execute($statement);
        $row2 = oci_fetch_array($statement);
        echo '<option value="'.$i.'">'.$row2[0].'</option>';
    }
?>
</select>
<button id="etapa_trecuta" style="float: right ; " class="button_cursor" onclick="if(document.getElementById('index_select').value>1){document.getElementById('index_select').value--;get_data(document.getElementById('index_select').value)}">Echipa precedenta</button>

<div id="players_data" ></div>
<?php require_once('footer.php') ?>
  
