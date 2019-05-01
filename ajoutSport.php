<?php
	session_start();

		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

        $idvendeur = $_SESSION['idvendeur'];
		$nom = isset($_POST['nom'])?$_POST['nom']:" ";
		$date = isset($_POST['date'])?$_POST['date']:" ";
        $prix = isset($_POST['prix'])?$_POST['prix']:" ";
        $taille = isset($_POST['taille'])?$_POST['taille']:" ";
        $photo = isset($_POST['photo'])?$_POST['photo']:" ";   
        $modele = isset($_POST['modele'])?$_POST['modele']:" ";     
        $marque = isset($_POST['marque'])?$_POST['marque']:" ";     

		$sql = "INSERT INTO sportloisir (idvendeur,date,marque,nom,taille,prix,photo,modele) VALUES ('$idvendeur','$date','$marque','$nom','$taille','$prix','$photo','$modele')";

        if(!mysqli_query($con,$sql)){
             echo "fail";
		}
		else{
			echo "inserted";
		}

?>