<?php
session_start();

// si l'utilisateur n'est pas connecté le rediriger vers la page de login
// $_SESSION['loggedin'] dans authenticate.php on vérifie si la variable a été définie
if (!isset($_SESSION['connecte'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>

<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">

<html>

	<head>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="bootstrap.css" media="screen"/>
	<link rel="stylesheet" type="text/css" href="_variables.scss" media="screen"/>
	<link rel="stylesheet" type="text/css" href="_bootswatch.scss" media="screen"/>
	<link rel="stylesheet" type="text/css" href="style.css" media="screen"/>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">

	<title>Admin</title>

	</head>

	<body>

		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand happytext">Bienvenu "<?=$_SESSION['name']?>"</a>
			</div>
		</nav>

		<!-- <div>
			<p>Vous êtes connécté(e), <?=$_SESSION['name']?>!</p>
		</div> -->

		<!-- <div class="containercatsvg"> -->
		<div class="catsvg3"><img src="images/cat4.svg" alt="catsvg3"></div>
		<!-- </div> -->

	</body>

</html>