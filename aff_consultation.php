<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Affichage</title>
	<meta charset="UTF-8">
	<link href="aff_consultation.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="user">
		<div class="presentation">
			<?php
			echo "<p class=username>".$_SESSION['nom']." ".$_SESSION['prenom']."</p>";
			?>
				<FORM method="post" action="Début.php">
					<input class=username type="submit" name="disco" value="déconnexion">
				</FORM>
		</div>
	</div>
	<?php
	$mois=$_POST['mois'];
	echo "<p class=aff>Fiche frais du mois de : <u>".$mois."</u></p>";
	?>
	<table border='1'>
		<tr class=first>
			<td>Date de création</td>
			<td>Quantité</td>
			<td>Prix</td>
			<td>Type</td>
		</tr>
	<?php
	$dsn = 'mysql: host=127.0.0.1 ; dbname=bddgsbfrais';
	$user = 'root';
	$password = '';
	try{
		$dbh = new PDO ($dsn, $user, $password);
	}
	catch (PDOException $e){
		echo 'Connexion échouée : ' . $e->getMessage();
	}
	$demandemois = $dbh -> prepare("SELECT quantite,dateModif,montant,libelle
FROM lignefraisforfait
INNER JOIN fichefrais
ON fichefrais.id=lignefraisforfait.idFF
INNER JOIN visiteur
ON visiteur.id=fichefrais.idVisiteur
INNER JOIN fraisforfait
ON lignefraisforfait.idFraisForfait=fraisforfait.id
WHERE mois=:mmois AND visiteur.id=:iip");

	$demandemois -> execute(array(':mmois' => $mois,':iip' => $_SESSION['ID']));

	$verif=0;
	$total=0;
	foreach ($demandemois as $value){
		echo "<tr><td>".$value['dateModif']."</td><td>".$value['quantite']."</td><td>".$value['montant']*$value['quantite']."$</td><td>".$value['libelle']."</td></tr>";
		$verif=1;
		$total=$total+($value['montant']*$value['quantite']);
	}
	echo "</table>";
	if ($verif==0){
		echo "<p class=aff>Ce mois ne contient <u>aucun frais</u></p>";
	}
	else{
		echo "<p class=aff>Le prix total de ce frais est de : <u>".$total."$</u></p>";
	}
	?>
	<div class=retour>
		<FORM method="post" action="consultation.php">
			<input type="submit" name="back" value="Retour">
		</FORM>
	</div>
</body>
</html>