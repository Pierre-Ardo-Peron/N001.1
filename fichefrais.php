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
				<FORM method="post" action="Début.php">
					<input class=username type="submit" name="disco" value="déconnexion">
				</FORM>
		</div>
	</div>
	<div class="princ">
		<h1>Veuillez Entrer les données</h1>
	<FORM  method="post" action="creafichefrais.php">
		<label>Date d'entrée : </label>
		<input type="date" name="date">
		</br>
		<label>Quantité : </label>
		<input type="number" name="quantite">
		</br>
		<label>Type : </label>
		<select name="type">
			<option value="ETP">Forfait Etape</option>
			<option value="KM">Frais Kilométrique</option>
			<option value="NUI">Nuitée Hôtel</option>
			<option value="REP">Repas Restaurant</option>
		</select>
		</br>
		<input class="valid" type="submit" name="valid" value="Entrer">
		<input class="reset" type="reset" name="reset" value="Effacer">
	</FORM>
	</div>
	<div class=retour>
		<FORM method="post" action="Menu.php">
			<input class="retour" type="submit" name="back" value="Retour">
		</FORM>
	</div>
</body>
</html>
