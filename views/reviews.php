<!DOCTYPE html>
<?php require_once('header.php') ?>
<div class="container">
<button onclick="document.getElementById('id04').style.display='block'">Add review</button>
</div>
<?php $sql="Select username ,data_review,text from review join utilizator on review.id_utilizator=utilizator.id where is_deleted=0";
    $statement=oci_parse($db,$sql);
    oci_execute($statement);
        while(oci_fetch($statement)){ ?>
            <div id="reviewblock">
              <div class="review">
                 <p> Review added by <br><b><?php echo oci_result($statement, 'USERNAME');?>  </b><br><small>now 2 minutes ago</small></p>
              </div>
              <div class="reviewtext">
                <p> <?php echo oci_result($statement,'TEXT')?></p>
              </div>
            </div>
            <hr>
      <?php } ?>
