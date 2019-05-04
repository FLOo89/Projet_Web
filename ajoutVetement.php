<?php
	session_start();

		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

        $idvendeur = $_SESSION['idvendeur'];
		$nom = isset($_POST['nom'])?$_POST['nom']:" ";
		$sexe = isset($_POST['sexe'])?$_POST['sexe']:" ";
        $prix = isset($_POST['prix'])?$_POST['prix']:" ";
        $taille = isset($_POST['taille'])?$_POST['taille']:" ";
        $photo = isset($_POST['photo'])?$_POST['photo']:" ";   
        $modele = isset($_POST['modele'])?$_POST['modele']:" ";     
        $marque = isset($_POST['marque'])?$_POST['marque']:" ";    
        $description = isset($_POST['description'])?$_POST['description']:" ";      

		$sql = "INSERT INTO vetement (idvendeur,nom,prix,marque,taille,sexe,photo,modele,description) VALUES ('$idvendeur','$nom','$prix','$marque','$taille','$sexe','$photo','$modele','$description')";

        if(!mysqli_query($con,$sql)){
		 	echo "fail";
		}
		else{
			echo "inserted";
		}

?>