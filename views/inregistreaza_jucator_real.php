

<?php require_once('header.php') ?>
<script>
function get_data(index)
	{
				var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("jucator").innerHTML =this.responseText;
		    }
		  };
		  xhttp.open("Get", "views/get_players.php?id="+index, true);
		  xhttp.send();
	}
	function insert_player(index,name)
	{
			var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		      document.getElementById("jucator").innerHTML =this.responseText;
		    }
		  };
		  xhttp.open("Get", "views/get_players.php?id="+index, true);
		  xhttp.send();
	}
</script>
<form class="modal-content animate" action="index.php?action=inregistreaza_jucator_realdhfghf" method="GET">
 
    <div class="container">
      <label><b>Echipa</b></label><br>
      <input type="hidden" name="action" value="insert_jucator"></input>
      <select onchange="get_data(document.getElementById('select_team').value)" name="id_team" id="select_team">
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
      <div id="jucator"></div>
      <button >Register player</button>
    </div>  
</form>