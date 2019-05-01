<?php
	session_start();

		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

		$idvendeur = $_SESSION['idvendeur'];
		$nom = isset($_POST['nom'])?$_POST['nom']:" ";
		$auteur = isset($_POST['auteur'])?$_POST['auteur']:" ";
        $prix = isset($_POST['prix'])?$_POST['prix']:" ";
        $date = isset($_POST['date'])?$_POST['date']:" ";
        $photo = isset($_POST['photo'])?$_POST['photo']:" ";   
        $modele = isset($_POST['modele'])?$_POST['modele']:" "; 
		$style = isset($_POST['style'])?$_POST['style']:" "; 
		
		$sql = "INSERT INTO livre (idvendeur,photo,prix,nom,date,auteur,style,modele) VALUES ('$idvendeur','$photo','$prix','$nom','$date','$auteur','$style',$modele)";

        if(!mysqli_query($con,$sql)){
		 	echo "fail";
		}
		else{
			echo "inserted";
		}

?>