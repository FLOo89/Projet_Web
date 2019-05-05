<?php
	session_start();

		$con = mysqli_connect('localhost','root','root','ece_amazon');

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
        $description = isset($_POST['description'])?$_POST['description']:" ";        
echo $description;
		$sql = "INSERT INTO sportloisir (idvendeur,date,marque,nom,taille,prix,photo,modele,description) VALUES ('$idvendeur','$date','$marque','$nom','$taille','$prix','$photo','$modele','$description')";

        if(!mysqli_query($con,$sql)){
             echo "fail";
             echo mysqli_error($con); 
		}
		else{
			echo "inserted";
		}

?>