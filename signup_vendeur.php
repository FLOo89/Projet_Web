<?php
		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

		$pseudo = $_POST['pseudo'];
		$email = $_POST['email'];
		$nom = $_POST['nom'];
		$photo = $_POST['photo'];
		$imagefond = $_POST['imagefond'];
		$type_user = $_POST['type_user'];

		$sql = "INSERT INTO vendeur (pseudo,email,nom,photo,imagefond,admin) VALUES ('$pseudo','$email','$nom','$photo','$imagefond','$type_user')";

		if(!mysqli_query($con,$sql)){
			echo "fail";
		}
		else{
			echo "inserted";
		}

?>