<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors',true);
$db=oci_connect('student','STUDENT','localhost/XE');

$action = '';
if (isset($_REQUEST['action'])) $action = $_REQUEST['action'];

switch($action){
	case "matches":
		require_once('views/matches.php');
		break;
        case "reviews":
                require_once('views/reviews.php');
                break;
	case "poll":
         	require_once('views/poll.php');
   	        break;
    	case "pollresults":
     	        require_once('views/pollresults.php');
    		break;
	case "clasament":
		$sql='Select distinct id_grupa from echipe order by id_grupa asc';
		$statement_id_grupa=oci_parse($db,$sql);
		oci_execute($statement_id_grupa);
		require_once('views/clasament.php');
		break;
	case "players":
		if (! $_SESSION['uid'] ){
			print 'please login';
			exit;
		}
		$statement=oci_parse($db ,"select * from jucatori");
		$result=oci_execute($statement);
		if(!$result)
		{
			echo 'eroare la interogare';
		}
		require_once('views/players.php');
	/*case "sterge_echipa":
		if(isset($_REQUEST['filter_on']))
		{
			$sql="Select id,nume,tara,id_grupa from echipe where upper(nume)=upper('";
			$sql.=$_REQUEST['nume'];
			$sql.="')";
			$statement=oci_parse($db,$sql);
			oci_execute($statement);
		}
		require_once('views/sterge_echipa.php');
		break; */
	case "inregistreaza_jucator":
		$sql='Select nume from nationalitate';
		$tari=oci_parse($db,$sql);
		oci_execute($tari);
		$sql='Select nume from echipe';
		$echipe=oci_parse($db,$sql);
		oci_execute($echipe);
		require_once('views/inregistreaza_jucator.php');
		break;
	case "inregistreaza_echipa":
		require_once('views/inregistreaza_echipa.php');
		break;
	case "optiuni_organizatorii":
		require_once('views/optiuni_organizatorii.php');
		break;
	case "optiuni_conturi":
		require_once('views/optiuni_conturi.php');
		break;	
	case "cauta_cont":
		require_once('views/cauta_cont.php');
		break;
	case "elimina_conturi":
		require_once('views/elimina_conturi.php');
		break;	
	case "vizualizare_detalii":
		require_once('views/vizualizare_detalii.php');
		break;
	case "update_scor_meci":
		require_once('views/update_scor_meci.php');
		if (isset($_REQUEST['set_score']))
		{
			header("Location: index.php?action=update_scoruri");
			die();
		}

		break;
	case "update_scoruri":
			$sql="select meciuri.id as ID, data_meci as DATA ,e1.nume ECHIPA_GAZDA,e2.nume as ECHIPA_OASPETE,rezultat1 as REZ1,rezultat2 as REZ2 from meciuri join echipe e1 on meciuri.id_echipa1=e1.id join echipe e2 on meciuri.id_echipa2=e2.id where upper(e1.nume)=upper('";
			$sql.=$_REQUEST['echipa_gazda']."') and upper(e2.nume)=upper('".$_REQUEST['echipa_oaspete']."')";
			$statement=oci_parse($db ,$sql);
			$result=oci_execute($statement);
			require_once('views/update_scoruri.php');

		break;
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
