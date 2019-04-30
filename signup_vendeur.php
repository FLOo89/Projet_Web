<?php
		$con = mysqli_connect('localhost','root','root','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
		}

		$pseudo = $_POST['pseudo'];
		$email = $_POST['email'];
		$nom = $_POST['nom'];
		$photo = $_POST['photo'];
		$imagefond = $_POST['imagefond'];

		$sql = "INSERT INTO vendeur (pseudo,email,nom,photo,imagefond) VALUES ('$pseudo','$email','$nom','$photo','$imagefond')";

		if(!mysqli_query($con,$sql)){
			echo "fail";
		}
		else{
			echo "inserted";
		}

?>