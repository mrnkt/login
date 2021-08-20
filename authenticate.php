<?php

// première chose à faire c'est démarrer la session, comme ça on pourra garder les détails des comptes sur le serveur et on pourra utiliser ça pour "se souvenir de moi" par exemple
session_start();

$LOCALHOST = 'localhost';
$ROOT = 'id17451441_mrnkt';
$PASS = '^+&nrt4}sfXs$8u8';
$DATABASENAME = 'id17451441_mrnkttest';


// ouvre une nouvelle connexion a mysql, https://www.w3schools.com/php/func_mysqli_connect.asp
$con = mysqli_connect($LOCALHOST, $ROOT, $PASS, $DATABASENAME);
if ( mysqli_connect_errno() ) {
	exit('Problème de connexion à MySQL: ' . mysqli_connect_error());
}

// isset va vérifier si la valeur existe
if ( !isset($_POST['username'], $_POST['password']) ) {
	exit("Veuillez renseigner l'adresse mail et le mot de passe!");
}

// l'instruction sql va séléctionner id et password du tableau "accounts". Ca va lier username à l'instruction. http://php.adamharvey.name/manual/fr/mysqli.prepare.php
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind paramètres (s = string, i = int, b = blob)
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// store_result stocke le résultat pour qu'on vérifie si le compte existe dans la bd.
	$stmt->store_result();
    // echo devrait sortir 1 s'il trouve l'username qui correspond à celui dans la bd. La vérification de l'username se fait là.
    // echo  $stmt->num_rows;

    // donc si l'username correspond, donc est égal à 1, donc supérieur à 0, on le lie à l'id et le password
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        // https://www.php.net/manual/fr/mysqli-stmt.fetch.php
        $stmt->fetch();

        if ($_POST['password'] === $password) {
            // on crée une session en tant qu'utilisateur connecté https://www.php.net/manual/fr/function.session-regenerate-id.php
            session_regenerate_id();
            $_SESSION['connecte'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            header('Location: admin.php');
        } else {
            echo "Mauvais nom d'utilisateur et/ou mot de passe!";
            // echo "<script>alert(\"Mauvais nom d'utilisateur et/ou mot de passe!\")</script>";
            // header('Location: index.html');
        }
    } else {
        echo "Mauvais nom d'utilisateur et/ou mot de passe!";
    }

	$stmt->close();
}
?>