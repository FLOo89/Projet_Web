<?php
	// tous d'abord il faut démarrer le système de sessions
    session_start();
    
	if ($_POST) {
		require_once 'connexion.php'; 
		extract($_POST);

		//connexion pour vendeur
		if($type_user=="vendeur"){
			$sql="SELECT * FROM vendeur WHERE pseudo='$user_name' AND email='$password'";
		}
		//connexion pour acheteur
		else{
			$sql="SELECT * FROM acheteur WHERE email='$user_name' AND mdp='$password'";
		}
		

		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			if(mysqli_num_rows($resultat)==0){
				echo 'Utilisateur ou mot de passe incorrecte !!';
			}
			else if($type_user=="vendeur"){
				$row=mysqli_fetch_assoc($resultat);
				$_SESSION['pseudo']=$row['pseudo'];
				$_SESSION['email']=$row['email'];
        		echo 'Vous êtes connecté !';

			}
			else{
				$row=mysqli_fetch_assoc($resultat);
				$_SESSION['pseudo']=$row['pseudo'];
				$_SESSION['email']=$row['email'];
        		echo 'Vous êtes connecté !';
			}
		}
		mysqli_free_result($resultat);
		mysqli_close($bdd);
	}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
       page login
    </title>
</head>
<body>
	<form action='login.php' method='POST'>
		<label>Pseudo :</label>
		<input type="text" name="user_name" placeholder="Nom d'utilisateur " /><br />

		<label>Email :</label>
		<input type="text" name="password" placeholder="Mot de passe " /><br />

		<label>Type d'utilisateur :</label>
		<select name="type_user">
			<option value="vendeur" selected>Vendeur</option>
			<option value="acheteur">Acheteur</option>
		</select><br />
		<input type="submit" value="Se connecter" >
	</form>
</body>

</html>

<?php
	$_SESSION['nom'] = 'pseudo';
?>

