<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<meta charset="UTF-8">
	<link href="formulaire_connexion.css" rel="stylesheet" type="text/css">
</head>

<head>
	<div>
		<h1>CONNEXION</h1>
	<FORM method="post" action="connexion.php">
		<libel class="utili">utilisateur:</libel>
		<input type="text" name="username">
		</br>
		</br>
		<libel>mot de passe:</libel>
		<input type="password" name="password">
		</br>
		<input class="valid" type="submit" name="login" value="Connexion">
		<input class="reset" type="reset" name="reset" value="Effacer">
	</FORM>
	</div>
		<?php
		if ($_SESSION['nb_essais_connexion']==0){
			$_SESSION['faux_user']=0;
			$_SESSION['faux_mdp']=0;
			$_SESSION['nb_essais_connexion']++;			
		}
		else{
			if ($_SESSION['faux_user']==1){
			echo "<p>Ce compte n'existe pas</p>";
			}
			else{
				if ($_SESSION['faux_mdp']==1){
					echo "<p>Le mot de passe est erroné</p>";
				}
			}
		}
	?>
</head>
</html>