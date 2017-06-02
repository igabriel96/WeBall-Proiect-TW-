
<?php


 function register($username, $password, $email)
 { 	 global $db;
	 $result = array(
		'success' => false,
      'username' => null,
      'password' =>null,
      'email' => null,
      'mesaj_user'=>null,
      'mesaj_password'=>null,
      'mesaj_email'=>null,
		'redirect'=> 0
	 );

	 try {

			//print_r($username);
			//print_r($password);
			//print_r($email);
	 	$statement_register="Select weball_user.este_eligibil('".$username."'".",'".$email."') from dual";
		$q=oci_parse($db,$statement_register);
		$flag=oci_execute($q);
		$row=oci_fetch_row($q);
		if(!$flag) {
			//print_r('asada');
			$result['mesaj'] = 'User sau email deja existenta. Go to Login!'.$statement_register.oci_error();
			$result['redirect']= 1;
			return $result;

		}
		if($row[0]==1)
		{
			$result['mesaj_username']='User existent';
			$result['redirect']= 1;
			return $result;
		}
		if($row[0]==1)
		{
			$result['mesaj_email']='Email existent';
			$result['redirect']= 1;
			return $result;
		}

			//valid info
      if( !(strlen(trim($username)) >=5 && strlen(trim($username)) <=20)) {
         $result['mesaj_username']= 'Username invalid';
         $result['redirect']= 1;
         return $result;
      }

      if( !(strlen(trim($password)) >=5 && strlen(trim($password)) <=50)) {
         $result['mesaj_password']='Invalid password';
         $result['redirect']= 1;
         return $result;
      }

      if(!strchr($email, '@'))
      {
       $result['mesaj_email']= 'Invalid email';
       $result['redirect']= 1;
       return $result;
      }


      $interogare="insert into utilizator (username,parola,email,rol) values(";
      $interogare.="'$username";
      $interogare.="',";
      $interogare.="'$password";
      $interogare.="',";
      $interogare.="'$email";
      $interogare.="',";
      $interogare.="'user";
      $interogare.="')";
      //."'".$username."',"."'$password"."',"."'$email"."',"."'user"."')";
	  $statement=oci_parse($db,$interogare);
		$ok = oci_execute($statement);

			if (!$ok){
				$result['mesaj_username']='eroare la insert '.oci_error().$interogare;
				$result['redirect'] = 1;
				return $result;
			}
			else
			{
				$result['success']=true;
				return $result;
			}
	 }
	 catch (Exception $e) {
		 $result['mesaj'] = $e->getMessage();
	}

	return $result;

 }

 function login($username,$password)
{ global $db;
	try{
		if(empty($username) )
			throw new Exception('Empty username.');

		if(empty($password))
			throw new Exception('The password doesnt exist. Retry.');

		
		$interogare="Select count(*) ,id from utilizator where username='".$username."' and parola='".$password ."' group by id";
	//	$interogare="Select * from users";
		$q=oci_parse($db, $interogare);
		$result=oci_execute($q);
		if(!$result)
		{
			throw new Exception('Go to login , eroare la conectarea cu baza de date');
		}
		$row=oci_fetch_row($q);
		if($row==0)
		{
			throw new Exception("Userul nu exista");
			
		}
		$id =$row[0];
		//verificare rol user
		$sql="Select rol from utilizator where username=:nume and parola=:password";
		$statement=oci_parse($db,$sql);
		oci_bind_by_name($statement,':nume', $username);
		oci_bind_by_name($statement,':password',$password);
		oci_execute($statement);
		$row=oci_fetch_array($statement);
		$_SESSION['rol']=$row[0];
		return $id;


	}
	catch (Exception $e) {
		echo $e->getMessage();
		return false;
	}
}
function deletecont()
{
	global $db;
	$my_id=$_SESSION['uid'];
	$sql_statement="Delete from utilizator where id=$my_id";
	$sql_result=oci_parse($db,$sql_statement);
	if(oci_execute($sql_result)==false)
	{
		var_dump("eroare la execute".oci_error());
		die;
	}
}
	function logout (){
	if (isset($_SESSION['uid'])) {
	   session_destroy();
	   echo "You are logged out successufuly!";
	}
	 echo "<br/><a href='index.php'>login</a>";

	}
