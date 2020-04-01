<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Consultation</title>
	<meta charset="UTF-8">
	<link href="consultation.css" rel="stylesheet" type="text/css">
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
		<h1>Quel est le mois voulu ?</h1>
		<FORM method="post" action="aff_consultation.php">
			<select name="mois">
				<option value="Janvier">Janvier</option>
				<option value="Fevrier">Fevrier</option>
				<option value="Mars">Mars</option>
				<option value="Avril">Avril</option>
				<option value="Mai">Mai</option>
				<option value="Juin">Juin</option>
				<option value="Juillet">Juillet</option>
				<option value="Août">Août</option>
				<option value="Septempbre">Septembre</option>
				<option value="Octobre">Octobre</option>
				<option value="Novembre">Novembre</option>
				<option value="Decembre">Decembre</option>
			</select>
			<input class="valid" type="submit" name="valid" value="Afficher">
			</br>
		</FORM>
	</div>
	<div class=retour>
		<FORM method="post" action="Menu.php">
			<input class="back" type="submit" name="back" value="Retour">
		</FORM>
	</div>
</body>
</html>