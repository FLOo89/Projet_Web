<?php
		$con = mysqli_connect('localhost','root','root','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

        $idvendeur = '11';
		$nom = $_POST['nom'];
		$auteur = $_POST['auteur'];
        $prix = $_POST['prix'];
        $date = $_POST['date'];
        $photo = $_POST['photo'];        
		$style = $_POST['style'];

		$sql = "INSERT INTO livre (idvendeur,photo,prix,nom,auteur,style) VALUES ('$idvendeur','$photo','$prix','$nom','$auteur','$style')";

        if(!mysqli_query($con,$sql)){
		 	echo "fail";
		}
		else{
			echo "inserted";
		}

?>