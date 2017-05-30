<?php
echo '<label>Team</label><br>';
echo '<select id="select_team" name="nume_echipa">';
$uri='http://api.football-data.org/v1/competitions/'.$_REQUEST['id'].'/teams/';
$reqPrefs['http']['method']='GET';
$reqPrefs['http']['header']='X-Auth-Token: 8aea7ae20b5340f585f81fecc3474c9d';
$stream_context = stream_context_create($reqPrefs);
$json = file_get_contents($uri, false, $stream_context);
$data = json_decode($json, TRUE);
foreach($data['teams'] as $item) 
{
	echo '<option value="'.$item['name'].'" > '.$item['name'].'</option>';
}
echo '</select>';
?>