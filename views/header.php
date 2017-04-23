<!doctype html>
<html>
<style>
/*button for update*/
.btn-group button {
	
    background-color: #800080; /* Violet background */
    border: 1px solid #800080; /* Violet border */
    color: white; /* White text */
    padding: 10px 24px; /* Some padding */
    cursor: pointer; /* Pointer/hand icon */
    float: left; /* Float the buttons side by side */
	
}

/* Clear floats (clearfix hack) */
.btn-group:after {
    content: "";
    clear: both;
    display: table;
}

.btn-group button:not(:last-child) {
    border-right: none; /* Prevent double borders */

}

/* Add a background color on hover */
.btn-group button:hover {
    background-color: #B19CD9;
}
.edit_button,
/*LOGIN*/

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #800080;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 90%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
/*for login*/
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}
.reviewpoll a{
    text-decoration: none;
    color: white;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

td {
    width: 250px;
    border: 1px solid #CCC;
    padding: 10px;
}
table{

	margin-top:20px;
	margin-left:auto;
	margin-right:auto;
}




 /*Register*/

/* Full-width input fields */
input[type=text], input[type=password], input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

.alert {
	width: 25%;
	 border: 1px solid #CCC;
	 padding: 15px;
}


body  {
    background-image: url("http://www.hitra-froya.no/incoming/article11464333.ece/paepd8/ALTERNATES/w980-default/Fotball.jpg");
    background-color: #6b6a6a;
	 background-blend-mode: multiply;
	background-size: 100% auto;

	
	
}
image{
	 -webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
    filter: grayscale(100%);
}



</style>

<body>
<p><center><a href="index.php" style="text-decoration: none;"><font size="10" color="#ede8ed"><strong>WeBall</strong></font></a></center></p>

<div  class="btn-group" >
<a href="index.php?action=players" style="float:left;"> <button>Players</button></a>
<a href="index.php?action=matches" style="float:left;"><button>Matches</button></a>
<a href="index.php?action=groups" style="float:left;"> <button>Ranking</button></a>




<?php if(!$_SESSION['uid']):?>
<button  style="float:right;width:100px;" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Register</button>
<button  style="float:right;width:100px;" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Login</button>
<button  style="float:right;width:100px;" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Admins</button>

<?php else:?>
<button  style="float:right;width:100px;" onclick="document.getElementById('id03').style.display='block'" style="width:auto;">Update</button>
<a href="index.php?action=logout" style="float:right;"> <button>Logout</button></a>
<a href="index.php?action=update_scoruri" style="float:right;"><button>Update scores/button></a>
<a href="index.php?action=optiuni_organizatorii" style="float:right;"><button>Organization</button></a>
<a href="index.php?action=optiuni_conturi" style="float:right;"><button>Account Options</button></a>
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
