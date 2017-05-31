<!DOCTYPE html>
<?php require_once('header.php') ?>
<?php
$sql="select count(*) from utilizator where username = '".$_REQUEST['username']."'";
$statement=oci_parse($db,$sql);
$result=oci_execute($statement);
$row = oci_fetch_row($statement);

if($_REQUEST['username'] != NULL)
{
         
    if($row[0] == 0 ) 
    {
            echo '<p style="color: white;
            text-align: center;margin-top : 5%">Usernameul cautat nu se gaseste in baza de date . Va rugam incercati din nou!</p>';
    }
    
    else
        
    {
        ?>
	    <table class="tablematches">
        <tr>
           <th>Username</th>
           <th>Parola</th> 
           <th>Email</th>
           <th>Role</th>
           <th>Delete</th>
 	    </tr>
        <?php 
        $sql="select username , parola , email , rol from utilizator where username = '".$_REQUEST['username']."'";
        $statement=oci_parse($db,$sql);
        $result=oci_execute($statement);
     
        while($row = oci_fetch_array($statement)){ ?>
 		  <tr>
            <div class="displaymatches">
              <td>
                <?php echo $row['USERNAME'] ?>
              </td>
              <td>
                <?php echo $row['PAROLA']?>
              </td>
              <td>
                <?php echo $row['EMAIL']?>
              </td>
              <td>
                <?php echo $row['ROL']?>
              </td>
              <td>      
                <div class="reviewpoll"><a href="index.php?action=sterge_cont&username=<?php echo $row['USERNAME']?>" style="color: white"><center> DELETE ACCOUNT </center></a></div>   
              </td>
              </div>
         </tr>
 	<?php }}
  }
   
 else
    
  {   ?>
        <table class="tablematches">
        <tr>
           <th>Username</th>
           <th>Parola</th> 
           <th>Email</th>
           <th>Role</th>
           <th>Delete</th>
 	    </tr>
        <?php 
        $sql="select username , parola , email , rol from utilizator order by rol";
        $statement=oci_parse($db,$sql);
        $result=oci_execute($statement);
     
        while($row = oci_fetch_array($statement))
        { ?>
 		  <tr>
            <div class="displaymatches">
              <td>
                <?php echo $row['USERNAME'] ?>
              </td>
              <td>
                <?php echo $row['PAROLA']?>
              </td>
              <td>
                <?php echo $row['EMAIL']?>
              </td>
              <td>
                <?php echo $row['ROL']?>
              </td>
              <td>      
                <div class="reviewpoll"><a href="index.php?action=sterge_cont&username=<?php echo $row['USERNAME']?>" style="color: white"><center> DELETE ACCOUNT </center></a></div>   
              </td>
              </div>
         </tr>
    <?php    
        }
    }
         ?>   
    ?>
</table>

<?php require_once('footer.php') ?>