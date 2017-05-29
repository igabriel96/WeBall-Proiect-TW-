<!doctype html>
<html>
<?php require_once('header.css') ?>

<body>
<p><center><a href="index.php" style="text-decoration: none;"><font size="10" color="#ede8ed"><strong>WeBall</strong></font></a></center></p>

<div  class="btn-group" >
<a href="index.php?action=players" style="float:left;"> <button>Players</button></a>
<a href="index.php?action=matches" style="float:left;"><button>Matches</button></a>
<a href="index.php?action=clasament" style="float:left;"> <button>Ranking</button></a>




<?php if(!$_SESSION['uid']):?>
<button  style="float:right;width:100px;" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Register</button>
<button  style="float:right;width:100px;" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</button>
<button  style="float:right;width:100px;" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Admins</button>

<?php else:?>
<a href="index.php?action=logout" style="float:right;"> <button>Logout</button></a>
<a href="index.php?action=update_scoruri" style="float:right;"><button>Update scores</button></a>
<a href="index.php?action=optiuni_organizatorii" style="float:right;"><button>Organization</button></a>
<a href="index.php?action=optiuni_conturi" style="float:right;"><button> My Account</button></a>
<a href="index.php?action=users_accounts" style="float:right;"><button>Users accounts</button></a>
<?php endif;?>



</div>
<div id="id01" class="modal"><font size="5">

  <form class="modal-content animate" action="index.php?action=register" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>


	   <label><b>Confirm Password</b></label>
      <input type="password" placeholder=" Enter Password" name="password" required>
       <input type="hidden" value="register" name="action">


	    <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

     <button < type="submit">Register</button> 

    </div></font>

    <div class="container" style="background-color:#f1f1f1"><font size="5">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div><font size="5">


<?php
	if(isset($_GET['messageUsername']) )
	{
		?>
	<div class="alert alert-info">
	<strong>Warning!</strong>
	 <?php echo $_GET['messageUsername']; ?>
	</div>
	<?php } ?>


<?php
  if(isset($_GET['eroare_update_cont']) )
  {
    ?>
  <div class="alert alert-info">
  <strong>Warning!</strong>
   <?php echo $_GET['eroare_update_cont']; ?>
  </div>
  <?php } ?>




  <?php
  	if(isset($_GET['messagePassword']) )
  	{
  		?>
  	<div class="alert alert-info">
  	<strong>Warning!</strong>
  	 <?php echo $_GET['messagePassword']; ?>
  	</div>
  	<?php } ?>



    <?php
      if(isset($_GET['messageEmail']) )
      {
        ?>
      <div class="alert alert-info">
      <strong>Warning!</strong>
       <?php echo $_GET['messageEmail']; ?>
      </div>
      <?php } ?>


<div id="id02" class="modal">

  <form class="modal-content animate" action="index.php?action=login" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
       <input type="hidden" value="login" name="action">

      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id03" class="modal">

  <form class="modal-content animate" action="index.php?action=updatecont" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" requiered>
      <label><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" >

      <button type="submit">Update cont</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
  <a href="index.php?action=deletecont"><button>Delete acount</button></a>
</div>



<script >
// Get the modal
var modal_1 = document.getElementById('id01');
var modal_2 = document.getElementById('id02');
var modal_3=document.getElementById('id03');

// When the user clicks anywhere outside of the modal_1, close it
window.onclick = function(event) {
    if (event.target == modal_1) {
        modal_1.style.display = "none";
    }
	if (event.target == modal_2) {
        modal_2.style.display = "none";
    }
}
</script>



</body>
</html>
