<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors',true);
$db=oci_connect('student','STUDENT','localhost/XE');

$action = '';
if (isset($_REQUEST['action'])) $action = $_REQUEST['action'];

switch($action){
	case "creaza_etape":
		$sql="begin 
		creare_meciuri();
		inserare_echipe_clasament();
		end;";
		$statement=oci_parse($db ,$sql);
		$result=oci_execute($statement);
		header('Location: index.php?action=matches');
		break;
	case "search_account":
		require_once('views/search_account.php');
		break;	
	case "my_account_details":
        $sql = "select username , parola , email , rol from utilizator where username ='".$_SESSION['username']."'";
        $statement=oci_parse($db ,$sql);
        $result=oci_execute($statement);
		require_once('views/my_account_details.php');
		break;
	case "insert_model_organizational":
		require_once('views/insert_model_organizational.php');
		header('index.php?action=optiuni_organizatorii');
		break;
	case "seteaza_model_organizational":
		require_once('views/seteaza_model_organizational.php');
		break;
	case "insert_echipa":
		require_once('views/insert_echipa.php');
		$sql="Select * from global_date";
		$statement=oci_parse($db ,$sql);
        	$result=oci_execute($statement);
        	$row=oci_fetch_array($statement);
        	if($row['TIP_CAMPIONAT']=='campionat'&&$row['NR_MAXIM_ECHIPE_CAMPIONAT']==$row['NR_ECHIPE_CAMPIONAT'])
        		header('Location: index.php');
        	if($row['TIP_CUPA']=='campionat'&&$row['NR_MAXIM_ECHIPE_CUPA']==$row['NR_ECHIPE_CUPA']* 4)
        		header('Location: index.php');
		header('Location: index.php?action=alege_tip_echipa');
		break;
	case "alege_tip_echipa":
		require_once('views/alege_tip_echipa.php');
		break;	
	case "inregistreaza_echipa_noua":
		$sql = "select count(distinct grupa) from clasament";
        	$statement=oci_parse($db ,$sql);
        	$result=oci_execute($statement);
        	$row = oci_fetch_row($statement);
		require_once('views/inregistreaza_echipa_noua.php');
		break;
	case "inregistreaza_echipa_reala":
		require_once('views/inregistreaza_echipa_reala.php');
		break;
	case "matches":
		if (! $_SESSION['uid'] ){
			require_once('views/header.php');
                echo '<p style="color: white;
                text-align: center;margin-top : 5%">Trebuie sa te loghezi ca sa poti benificia de aceasta functionalitate</p>';
            	require_once('views/footer.php');
			exit;
		}
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
	case "ranking":
		if (! $_SESSION['uid'] ){
			require_once('views/header.php');
                echo '<p style="color: white;
                text-align: center;margin-top : 5%">Trebuie sa te loghezi ca sa poti benificia de aceasta functionalitate</p>';
            	require_once('views/footer.php');
			exit;
		}
		require_once('views/ranking.php');
		break;
	case "fixtures":
		if (! $_SESSION['uid'] ){
			require_once('views/header.php');
                echo '<p style="color: white;
                text-align: center;margin-top : 5%">Trebuie sa te loghezi ca sa poti benificia de aceasta functionalitate</p>';
            	require_once('views/footer.php');
			exit;
		}
        	require_once('views/fixtures.php');
        	break;
	case "players":
		if (! $_SESSION['uid'] ){
			require_once('views/header.php');
                echo '<p style="color: white;
                text-align: center;margin-top : 5%">Trebuie sa te loghezi ca sa poti benificia de aceasta functionalitate</p>';
            	require_once('views/footer.php');
			exit;
		}
		require_once('views/players.php');
		break;
	case "inregistreaza_jucator":
		$sql='Select distinct nationalitate from jucatori';
		$tari=oci_parse($db,$sql);
		oci_execute($tari);
		$sql='Select nume from echipe';
		$echipe=oci_parse($db,$sql);
		oci_execute($echipe);
		require_once('views/inregistreaza_jucator.php');
		break;
	case "optiuni_organizatorii":
		require_once('views/optiuni_organizatorii.php');
		break;
	case "cauta_cont":
		require_once('views/cauta_cont.php');
		break;
	case "afisare_cont":
        	require_once('views/afisare_cont.php');
        	break;	
	case "sterge_cont":
		$sql = "select username , parola , email , rol from utilizator where username ='".$_SESSION['username']."'";
      		$statement=oci_parse($db ,$sql);
      		$result=oci_execute($statement);
		require_once('views/sterge_cont.php');
		break;	
	case "vizualizare_detalii":
		require_once('views/vizualizare_detalii.php');
		break;
	case "admin_elimina_cont":
		require_once('views/admin_elimina_cont.php');
		break;
	case "update_scor_meci":
		$sql="update meciuri set rezultat1=".$_REQUEST['goluri_echipa_gazda'];
			$sql.=" ,rezultat2=".$_REQUEST['goluri_echipa_oaspete'];
			$sql.=" where id=".$_REQUEST['id_meci'];
			$statement=oci_parse($db,$sql);
		if (isset($_REQUEST['set_score']))
		{
			
			header("Location: index.php?action=update_scoruri");
			die();
		}
		require_once('views/update_scor_meci.php');
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
		}
		header('Location: index.php');

	break;
	case "update_account":
		require_once('views/update_account.php');
		break;
	case "logout":
		require_once('class/class.user.php');
		logout();
		header('Location: index.php');
		exit;
	break;
	case "users_accounts":
		require_once('views/users_accounts.php');
		break;

	default:
		require_once('views/home.php');
	break;
}
?>
