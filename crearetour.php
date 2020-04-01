<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Affichage</title>
	<meta charset="UTF-8">
	<link href="crearetour.css" rel="stylesheet" type="text/css">
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
	<div class="principal">
	<p>Votre fiche a bien été créée !</p>
	<div class=retour>
		<FORM method="post" action="Menu.php">
			<input class="retour" type="submit" name="back" value="Retour au menu">
		</FORM>
	</div>
	</div>