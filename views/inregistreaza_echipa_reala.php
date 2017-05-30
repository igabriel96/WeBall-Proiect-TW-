<?php require_once('header.php') ?>
<script>
function get_data(index)
	{
				var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("echipe").innerHTML =this.responseText;
		    }
		  };
		  xhttp.open("Get", "views/get_real_teams_data.php?id="+index, true);
		  xhttp.send();
	}
	function insert_team(index,name)
	{
			var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("echipe").innerHTML =this.responseText;
		    }
		  };
		  xhttp.open("Get", "views/get_real_teams_data.php?id="+index, true);
		  xhttp.send();
	}
</script>
<form class="modal-content animate" action="index.php?action=inregistreaza_echipa_realadhfghf" method="GET">
 
    <div class="container">
      <label><b>Competition</b></label><br>
      <input type="hidden" name="action" value="insert_echipa"></input>
      <select onchange="get_data(document.getElementById('select_competition').value)" name="id_campion" id="select_competition">
      <?php 
      $uri='http://api.football-data.org/v1/competitions/';
        $reqPrefs['http']['method']='GET';
		$reqPrefs['http']['header']='X-Auth-Token: 8aea7ae20b5340f585f81fecc3474c9d';
		$stream_context = stream_context_create($reqPrefs);
		$json = file_get_contents($uri, false, $stream_context);
		$data=json_decode($json,TRUE);
        foreach ($data as $item) {
      	echo '<option value="'.$item["id"].'">'.$item['caption']."</option>";
       } ?>
       </select>
       <br>
      <div id="echipe"></div>
      <button >Register Team</button>
    </div>  
</form>