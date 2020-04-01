<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Exercice 1</title>
	<meta charset="UTF-8">
</head>

<body>
	<div>
<?php
	$_SESSION['username']=$_POST['username'];
	$_SESSION['password']=$_POST['password'];

	$dsn = 'mysql: host=127.0.0.1 ; dbname=bddgsbfrais';
	$user = 'root';
	$password = '';
	try{
		$dbh = new PDO ($dsn, $user, $password);
	}
	catch (PDOException $e){
		echo 'Connexion échouée : ' . $e->getMessage();
	}

	$demande = $dbh -> prepare("SELECT * FROM visiteur Where login=?");

	$demande -> execute(array($_SESSION['username']));

	$username='si_faux';
	foreach ($demande as $value){  //on récupère le login et le mdp de la base de donnée
		$username=$value['login'];
		$motdepasse=$value['mdp'];
		$_SESSION['nom']=$value['nom'];
		$_SESSION['prenom']=$value['prenom'];
		$_SESSION['ID']=$value['id'];
	}
	if ($username==$_SESSION['username']){  //login correct
		if ($motdepasse==$_SESSION['password']){  //mdp correct
			header('location:Menu.php');
		}
		else{  //mdp incorrect
			$_SESSION['faux_mdp']=1;
			$_SESSION['faux_user']=0;
			header('location:formulaire_connexion.php');
		}
	}
	else{ //login inconnu
		$_SESSION['faux_user']=1;
		$_SESSION['faux_mdp']=0;
		header('location:formulaire_connexion.php');
	}
	?>
	</div>
</body>
</html>