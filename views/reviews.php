<!DOCTYPE html>
<?php require_once('header.php') ?>
<?php 
 
if(isset($_REQUEST['yes']) || isset($_REQUEST['no'])){

    $sql="select rol from utilizator where username = '".$_SESSION['username']."'";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    $row=oci_fetch_row($statement);
    
     $sql="select id_utilizator from review where id = ".$_REQUEST['id_review'];
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    $row1=oci_fetch_row($statement);
    
    $sql="select id from utilizator where username = '".$_SESSION['username']."'";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    $row2=oci_fetch_row($statement);
     
     if(!isset($_REQUEST['no'])){
     if(($row[0] == 'admin' &&  isset($_REQUEST['yes'])) || ($row1[0] == $row2[0] &&  isset($_REQUEST['yes'])))
    {
    
           $sql="delete from review where id =".$_REQUEST['id_review'];
		   $statement=oci_parse($db ,$sql);
           $result=oci_execute($statement);
    
    }
    else
    {
       ?> <div class="alert-reviews">
    <span class="closebtn-reviews" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong> Nu poti sterge reviewul altui user doar daca esti admin! </strong>
    </div> <?php
    }
    
    
    
}
}    
    
if(isset($_REQUEST['editreview'])) {

    
    $sql="select rol from utilizator where username = '".$_SESSION['username']."'";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    $row=oci_fetch_row($statement);
    
     $sql="select id_utilizator from review where id = ".$_REQUEST['id_review'];
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    $row1=oci_fetch_row($statement);
    
    $sql="select id from utilizator where username = '".$_SESSION['username']."'";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    $row2=oci_fetch_row($statement);
    
    
    
    if($row[0] == 'admin' || $row1[0] == $row2[0])
    {
    $sql="update review set text ='".$_REQUEST['editreview']."' where id = ".$_REQUEST['id_review'];
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
    }
    else
    {
       ?> <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <strong> Nu poti edita reviewul altui user decat daca esti admin! </strong>
    </div> <?php
    }
} ?>
<div class="container">
<button onclick="document.getElementById('review_block').style.display='block'">Add review</button>
</div>
 <div id="review_block" style="display: none">
 	<form action="index.php?action=reviews&id_meci=<?php echo $_REQUEST['id_meci'];?>" method="post">
 	<input type="text"  name="text" placeholder="Insert review..." style="margin-left:0.8%;width:98.5%">
 	<button type="submit" style="width:15.5%;margin-left:0.8%" >Post Review</button>
    <button  onclick="this.parentElement.style.display='none'" style="width:15.5%;margin-left:0.1%">Cancel</button>
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
$sql="Select review.id , username ,data_review,text from review join utilizator on review.id_utilizator=utilizator.id where is_deleted=0 and id_meci=".$_REQUEST['id_meci']." order by data_review desc";
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
              <div class="review-right-side">
              <div class="review-text">  
                <p> <?php echo oci_result($statement,'TEXT'); ?></p>
              </div>
               <div class="review-edit-delete">
                  <a href="index.php?action=edit_review&id_review=<?php echo oci_result($statement,'ID')?>&id_meci=<?php echo $_REQUEST['id_meci']?>"style="text-decoration:none;color: white">Edit</a>
              </div> 
              <div class="review-edit-delete">
                 <a href="index.php?action=delete_review&id_review=<?php echo oci_result($statement,'ID')?>&id_meci=<?php echo $_REQUEST['id_meci']?>"style="text-decoration:none;color: white">Delete</a>
              </div>
            </div> 
            </div>
            <hr>
      <?php 
         }  ?>
<?php require_once('footer.php') ?>
