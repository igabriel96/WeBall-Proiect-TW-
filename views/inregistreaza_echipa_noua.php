<?php require_once('header.php') ?>

<?php

if(!isset($_REQUEST['nameofteam']))
{?>

<form class="modal-content animate" action="index.php?action=inregistreaza_echipa_noua&filter_on=1" method="POST">
 
    <div class="container">
      <label><b>Name team</b></label>
      <input type="text" placeholder="Insert the name of the team" maxlength="20"  name="nameofteam" pattern="[a-zA-Z].{2,}" title="The name of the team should have at least three letters">
      <label><b>Country</b></label>
      <input type="text"  placeholder="Insert the country of the team" maxlength="20" name="country" pattern="[a-zA-Z].{3,}" title="The name of the team should have at least four letters">
      <label><b>Number of players</b></label><br>
      <input type="number" name="numberofplayers" placeholder="Number of players" min="11" max="30"><br>
      <label><b>Group number</b></label><br>
      <input type="number" name="groupnumber" placeholder="Group number" min="1" max="<?php echo $row[0] ?>"> 
      <button type="Submit">Register Team</button>
    </div>  
  </form>
    
<?php }  else { 
    if(isset($_REQUEST['filter_on'])) {
    
	$teamname = $_REQUEST['nameofteam'];
    $country = $_REQUEST['country'];
    $numberofplayers = $_REQUEST['numberofplayers'];
    $groupnumber = $_REQUEST['groupnumber'];
    $sql="insert into echipe(nume,logo,tara,numar_jucatori,id_grupa) values('".$teamname."','http://www.s-cup.it/public/squadre/new-team.png','".$country."','".$numberofplayers."','".$groupnumber."')";
    $statement=oci_parse($db,$sql);
    $result=oci_execute($statement);
     echo '<p style="color: white;
        text-align: center;margin-top : 5%">Ai inregistrat echipa cu succes!</p>';    
}
}?>
<style>
    input[type=number]{
    width: 17%;
    padding: 10px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
        
    }
</style>
<?php require_once('views/footer.php');
