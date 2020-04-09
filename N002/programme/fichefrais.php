<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Entrée frais</title>
	<meta charset="UTF-8">
	<link href="fichefrais.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="user">
		<div class="presentation">
			<?php
			echo "<p class=username>".$_SESSION['nom']." ".$_SESSION['prenom']."</p>";
			?>
				<FORM method="post" action="formulaire_connexion.php">
					<input class=username type="submit" name="disco" value="déconnexion">
				</FORM>
		</div>
	</div>
	<div class="princ">
		<h1>Veuillez Entrer les données</h1>
	<FORM  method="post" action="creafichefrais.php">
		<label>Date d'entrée : </label>
		<input type="date" name="date">
		<div class="central">
			<div class="type">
				<label>Quantité pour Forfait Etape :</label>
				</br>
				<input type="number" name="quantiteFE">
			</div>
			<div class="type">
				<label>Quantité pour Frais Kilométrique :</label>
				</br>
				<input type="number" name="quantiteFK">
			</div>
			<div class="type">
				<label>Quantité pour Nuitée Hôtel :</label>
				</br>
				<input type="number" name="quantiteNH">
			</div>
			<div class="type">
				<label>Quantité pour Repas Restaurant :</label>
				</br>
				<input type="number" name="quantiteRR">
			</div>
		</div>
		</br>
		<input class="valid" type="submit" name="valid" value="Entrer">
		<input class="reset" type="reset" name="reset" value="Effacer">
	</FORM>
	<?php
		if ($_SESSION['verifcreafiche']==1){
			echo "<p class=verif>Vous devez reseigner TOUTES les entrées !</p>";
		}
		elseif ($_SESSION['verifdate']==1){
			echo "<p class=verif>Il existe déjà une fiche à ce mois !</p>";
		}
		?>
	</div>
	<div class=retour>
		<FORM method="post" action="Menu.php">
			<input class="retour" type="submit" name="back" value="Retour">
		</FORM>
	</div>
</body>
</html>
