<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Menu</title>
	<meta charset="UTF-8">
	<link href="Menu.css" rel="stylesheet" type="text/css">
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
	<div class="outil">
		<h1>Que voulez vous faire ?</h1>
		<FORM method="post" action="consultation.php">
			<libel>Consulter mes fiches de frais</libel>
			<input type="submit" name="suivant1" value="Consulter">
		</FORM>
		</br>
		<FORM method="post" action="fichefrais.php">
			<libel>Entrer une/des fiche(s) de frais</libel>
			<input class="fin" type="submit" name="suivant2" value="Fiche frais">
		</FORM>
	</div>
</body>
</html>