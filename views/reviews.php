<!DOCTYPE html>
<?php require_once('header.php') ?>
<div class="container">
<button onclick="document.getElementById('review_block').style.display='block'">Add review</button>
</div>
 <div id="review_block" style="display: none">
 	<form action="index.php?action=reviews&id_meci=<?php echo $_REQUEST['id_meci'];?>" method="post">
 	<input type="text"  name="text" placeholder="Insert review..." style="margin-left:0.8%;width:98.5%">
 	<button type="submit" style="width:15.5%;margin-left:0.8%" >Post Review</button>
    <button type="reset" value="Reset" style="width:15.5%;margin-left:0.1%">Cancel</button>
 	</form>
 </div>
<?php 
if(isset($_REQUEST['text'])&&$_SESSION['text']!=$_REQUEST['text'])
{
     $row = oci_fetch_row($statement);
     $sql="insert into review(id_utilizator,id_meci,text,is_deleted) values('".$row[0]."','".$_REQUEST['id_meci']."','".$_REQUEST['text']."','0')";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);     
}
$sql="Select username ,data_review,text from review join utilizator on review.id_utilizator=utilizator.id where is_deleted=0 and id_meci=".$_REQUEST['id_meci']." order by data_review desc";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
        while(oci_fetch($statement)){ ?>
            <div class="reviewblock">
              <div class="review">
                 <p> Review added by <br><b><?php echo oci_result($statement, 'USERNAME');?>  </b><br><small><?php   
                date_default_timezone_set('Europe/London');                
                 $delta_time = time() - strtotime(substr(oci_result($statement, 'DATA_REVIEW'),1,17).substr(oci_result($statement,'DATA_REVIEW'),25,3))+7200;
                $hours = floor($delta_time / 3600);
                $delta_time %= 3600;
                $minutes = floor($delta_time / 60);
                echo " {$hours} hours and {$minutes}  minutes ago";  ?></small></p>
              </div>
              <div class="reviewtext">
                <p> <?php echo oci_result($statement,'TEXT'); ?></p>
              </div>
            </div>
            <hr>
      <?php 
         }  ?>
<?php require_once('footer.php') ?>
