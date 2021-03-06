<!DOCTYPE html>
<head>
	 <link rel="alternate" type="application/atom+xml" 
   href="data/rankingXML.php" title="Atom feed for ranking">
</head>
<script>
var etape=<?php $sql="select count(distinct grupa) from clasament";
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
		      document.getElementById("ranking_data").innerHTML = this.responseText;
		  }
		  };
        xhttp.open("GET", "views/get_ranking.php?grupa="+index, true);
        xhttp.send();
	}
</script>
<?php require_once('header.php') ?>
<a href="views/get_data_ranking.php?tip=csv"><button id="d_csv" style="float: left" class="button_cursor" >CSV File</button></a>
<a href="views/get_data_ranking.php?tip=pdf"><button id="d_pdf" style="float: left" class="button_cursor" >PDF File</button></a>
<a href="data/ranking.php"><button style="float:left" class="button_cursor">JSON</button></a>
<button id="etapa_viitoare" class="button_cursor" onclick="if(document.getElementById('index_select').value<etape){document.getElementById('index_select').value++;get_data(document.getElementById('index_select').value)}" style="float: right;">Grupa urmatoare</button><select id="index_select" onchange="get_data(document.getElementById('index_select').value)" style="float: right ;height: 30px ;width: 10%;">
<?php for($i=1;$i<=$row[0];$i++) 
    echo '<option value="'.$i.'">'.$i.'</option>';
?>
</select>
<button id="etapa_trecuta" style="float: right ; " class="button_cursor" onclick="if(document.getElementById('index_select').value>1){document.getElementById('index_select').value--;get_data(document.getElementById('index_select').value)}">Grupa precedenta</button>
<div id="ranking_data"></div>

<?php require_once('footer.php') ?>
