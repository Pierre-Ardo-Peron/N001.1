<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Création fiche frais</title>
	<meta charset="UTF-8">
</head>

<body>
	<?php
	$date=$_POST['date'];
	$moisnum=($date[5]*10)+$date[6];
	$quantite=$_POST['quantite'];
	$type=$_POST['type'];

	switch ($moisnum){
		case 1:
			$mois='Janvier';
			break;
		case 2:
			$mois='Fervrier';
			break;
		case 3:
			$mois='Mars';
			break;
		case 4:
			$mois='Avril';
			break;
		case 5:
			$mois='Mai';
			break;
		case 6:
			$mois='Juin';
			break;
		case 7:
			$mois='Juillet';
			break;
		case 8:
			$mois='Août';
			break;
		case 9:
			$mois='Septembre';
			break;
		case 10:
			$mois='Octobre';
			break;
		case 11:
			$mois='Novembre';
			break;
		case 12:
			$mois='Decembre';
			break;
	}

	$dsn = 'mysql: host=127.0.0.1 ; dbname=bddgsbfrais';
	$user = 'root';
	$password = '';
	try{
		$dbh = new PDO ($dsn, $user, $password);
	}
	catch (PDOException $e){
		echo 'Connexion échouée : ' . $e->getMessage();
	}
	$demandeid = $dbh -> prepare("SELECT id FROM fichefrais Where 1");

	$demandeid -> execute();

	$IDdisp=0;
	foreach ($demandeid as $value) {
		if ($value['id']==$IDdisp){
			$IDdisp+=1;
		}
	}

	$insertfiche = $dbh -> prepare("INSERT INTO fichefrais VALUES (:id,:mois,:datecrea,:idvisi,'CR');
		INSERT INTO lignefraisforfait (quantite, idFraisForfait, idFF) VALUES (:quantite,:type,:idff);");
	$insertfiche -> execute(array(':id' => $IDdisp,':mois' => $mois, ':datecrea' => $date, ':idvisi' => $_SESSION['ID'],':quantite' => $quantite, 'type' => $type, ':idff' => $IDdisp));

	header('location:crearetour.php');
	?>
</body>
</html>