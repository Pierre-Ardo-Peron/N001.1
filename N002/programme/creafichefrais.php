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
	$quantiteFE=$_POST['quantiteFE'];
	$quantiteFK=$_POST['quantiteFK'];
	$quantiteNH=$_POST['quantiteNH'];
	$quantiteRR=$_POST['quantiteRR'];

	$_SESSION['verifcreafiche']=0;
	$_SESSION['verifdate']=0;
	if ($date=="" || $quantiteFE=="" || $quantiteFK=="" || $quantiteNH=="" || $quantiteRR==""){
		$_SESSION['verifcreafiche']=1;
		header('location:fichefrais.php');
	}
	else{

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
	$demandeid = $dbh -> prepare("SELECT id,dateModif FROM fichefrais Where 1");

	$demandeid -> execute();

	$IDdisp=0;
	foreach ($demandeid as $value) {
		if ($value['id']==$IDdisp){
			$IDdisp+=1;
		}
		$datephp=$value['dateModif'];
		$moisphp=($datephp[5]*10)+$datephp[6];
		if ($moisphp==$moisnum){
			$_SESSION['verifdate']=1;
		}
	}

	if ($_SESSION['verifdate']==1){
		header('location:fichefrais.php');
	}
	else{
	$IDdispligne=$IDdisp;
	$IDdispligne1=$IDdisp+1;
	$IDdispligne2=$IDdisp+2;
	$IDdispligne3=$IDdisp+3;
	$IDdisp1=$IDdisp+1;
	$IDdisp2=$IDdisp+2;
	$IDdisp3=$IDdisp+3;


	$insertfiche = $dbh -> prepare("
		INSERT INTO fichefrais VALUES (:id,:mois,:datecrea,:idvisi,'CR');
		INSERT INTO lignefraisforfait VALUES (:idligne,:quantiteRR,'REP',:idff);

		INSERT INTO fichefrais VALUES (:id1,:mois,:datecrea,:idvisi,'CR');
		INSERT INTO lignefraisforfait VALUES (:idligne1,:quantiteNH,'NUI',:idff1);

		INSERT INTO fichefrais VALUES (:id2,:mois,:datecrea,:idvisi,'CR');
		INSERT INTO lignefraisforfait VALUES (:idligne2,:quantiteFK,'KM',:idff2);

		INSERT INTO fichefrais VALUES (:id3,:mois,:datecrea,:idvisi,'CR');
		INSERT INTO lignefraisforfait VALUES (:idligne3,:quantiteFE,'ETP',:idff3);");

	$insertfiche -> execute(array(
		':idligne'=>$IDdispligne,':idligne1'=>$IDdispligne1,':idligne2'=>$IDdispligne2,':idligne3'=>$IDdispligne3,
		':id' => $IDdisp,':id1'=>$IDdisp1,':id2'=>$IDdisp2,':id3'=>$IDdisp3,
		':mois' => $mois, ':datecrea' => $date, ':idvisi' => $_SESSION['ID'],
		':quantiteRR' => $quantiteRR, ':quantiteNH'=>$quantiteNH, ':quantiteFK'=>$quantiteFK, ':quantiteFE'=>$quantiteFE,
		':idff' => $IDdisp,':idff1' => $IDdisp1,':idff2' => $IDdisp2,':idff3' => $IDdisp3));


	header('location:crearetour.php');
}
}
	?>
</body>
</html>