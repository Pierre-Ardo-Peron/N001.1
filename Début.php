<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Début</title>
</head>
<body>
	<?php
		$_SESSION['nb_essais_connexion']=0;
		header('location:formulaire_connexion.php');
	?>
</body>
</html>