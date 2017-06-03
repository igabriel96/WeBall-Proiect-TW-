
<?php require_once('header.php') ?>

<?php 
    
    $row = oci_fetch_row($statement);
 ?>
  <div class="display-details">
     <h4>ACCOUNT DETAILS</h4>

     <div class="obiect">  
         <div class="obiect-2">  
             Username
         </div>
         <div class="margin-1">
             : <?php echo $row[0] ?>
         </div>
     </div>
     
      <div class="obiect">  
         <div class="obiect-2">  
             Password
         </div>
         <div class="margin-2">
             : <?php echo $password = str_repeat("*", strlen($row[1]));  ?>
         </div>
     </div>
      
      <div class="obiect">  
         <div class="obiect-2">  
             Email
         </div>
         <div class="margin-3">
             : <?php echo $row[2] ?>
         </div>
     </div>
      
      <div class="obiect">  
         <div class="obiect-2">  
             Rol
         </div>
         <div class="margin-4">
             : <?php echo $row[3] ?>
         </div>
     </div>
      
      <div class="update-delete">
        <div class="update">
            <a href="index.php?action=update_account&username=<?php echo $row[0]?>" style="color : white;text-decoration : none;">UPDATE</a> 
        </div>
        <div class="delete">
            <a href="index.php?action=sterge_cont&username=<?php echo $row[0]?>" style="color : white;text-decoration : none;">DELETE</a> 
        </div>
      </div>

          
 </div>
 <style>
     
     .obiect{
         width: 100%;
         display: inline-block;
     }
     .obiect-2{
         float : left;
     }
     .margin-1{
         float : left;
         margin-left : 4%;
     }
      .margin-2{
         float : left;
         margin-left : 5%;
     }
      .margin-3{
         float : left;
         margin-left : 11.5%;
     }
      .margin-4{
         float : left;
         margin-left : 16%;
     }
.display-details h4{
    margin-top : 0;
    text-align: center;
         
}
.display-details{
    width: 35%;
    border: 1px solid white;
    padding: 25px;
    margin : auto;
    color : white;
    margin-top : 4%;
}
     .update-delete{
         width : 100%;
         margin-top : 2%;
         margin-bottom: 5%;
     }
     .update{
         float : left;
         width: 47%;
         text-align: center;
         margin-left: 2%;
     }
     .update:hover {
      background-color: #00264d;
     }
     .delete{
         float : left;
         width: 47%;
         text-align: center;
     }
     .delete:hover {
      background-color: #00264d;
     }


</style>

<?php require_once('footer.php') ?>
