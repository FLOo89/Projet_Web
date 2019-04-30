<?php
	// tous d'abord il faut démarrer le système de sessions
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <h1>Profil Vendeur</h1>
</head>
<body>
    <?php
    echo "Pseudo: ".$_SESSION['pseudo']."<br>";
    echo "Email: ".$_SESSION['email']."<br>";
    echo "Nom: ".$_SESSION['nom']."<br>";
    echo "Photo: ".$_SESSION['photo']."<br>";
    echo "Image: ".$_SESSION['imagefond']."<br>";
    ?>
    <img src="<?php echo $_SESSION['photo']; ?>">
    <br>
    <a href="main.php">Retour au menu</a>
</body>
</html>