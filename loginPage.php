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
				//on charge dans la session toutes les données du vendeur
				$_SESSION['pseudo']=$row['pseudo'];
				$_SESSION['email']=$row['email'];
				$_SESSION['nom']=$row['nom'];
				$_SESSION['photo']=$row['photo'];
    			$_SESSION['imagefond']=$row['imagefond'];

				echo 'Vous êtes connecté !';
				//header('location:profilVendeur.php');
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
