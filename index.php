<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors',true);
$db=oci_connect('student','STUDENT','localhost/XE');

$action = '';
if (isset($_REQUEST['action'])) $action = $_REQUEST['action'];

switch($action){

	case "register":
		require_once('class/class.user.php');

		$result = register($_POST['username'], $_POST['password'], $_POST['email'] );
		if ( $result['success'] ){
			$id = login($_POST['username'], $_POST['password'] );
			if ($id){
				$_SESSION['uid'] = $id;

				header('Location: index.php');
				exit;
			}

		}
		else{
			if(result['redirect'] ){
				print_r('1122');
			echo $_GET['mesaj_username'];
				header("Location: index.php?messageUsername=".$result['mesaj_username']."&messagePassword=".$result['mesaj_password'].'&messageEmail='.$result['mesaj_email']);
			}
		}

	break;
	case "login":
		require_once('class/class.user.php');
		$id = login($_POST['username'], $_POST['password'] );
		if ($id){
			$_SESSION['uid'] = $id;
			$_SESSION['username']=$_POST['username'];
			$_SESSION['password']=$_POST['password'];
			header('Location: index.php');
		}

	break;
	case "logout":
		require_once('class/class.user.php');
		logout();
		header('Location: index.php');
		exit;
	break;

	default:
		require_once('views/home.php');
	break;
}
?>
