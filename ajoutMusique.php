<?php
	session_start();

		$con = mysqli_connect('localhost','root','root','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

        $idvendeur = $_SESSION['idvendeur'];
		$nom = isset($_POST['nom'])?$_POST['nom']:" ";
		$artiste = isset($_POST['artiste'])?$_POST['artiste']:" ";
        $prix = isset($_POST['prix'])?$_POST['prix']:" ";
        $date = isset($_POST['date'])?$_POST['date']:" ";
        $photo = isset($_POST['photo'])?$_POST['photo']:" ";   
        $modele = isset($_POST['modele'])?$_POST['modele']:" "; 
         
		

		$sql = "INSERT INTO musique (idvendeur,nom,prix,date,artiste,photo,modele) VALUES ('$idvendeur','$nom','$prix','$date','$artiste','$photo','$modele')";

        if(!mysqli_query($con,$sql)){
		 	echo "fail";
		}
		else{
			echo "inserted";
		}

?>