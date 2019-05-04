<?php
		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }

        $id = $_GET['id'];
		$type = $_GET['type'];
		  
		
		$sql = "INSERT INTO panier (idarticle,type) VALUES ('$id','$type')";

		if(!mysqli_query($con,$sql)){

			switch($type)
			{
				case "Livres":
				header("Location: Livres.php");
				break;
				case "Musique":
				header("Location: musique.php");
				break;
				case "LoisirSport":
				header("Location: LoisirSport.php");
				break; 
				case "Vetements":
				header("Location: Vetements.php");
				break; 
			}
        }
        
		else{
			echo "inserted";
			switch($type)
			{
				case "Livres":
				header("Location: Livres.php");
				break;
				case "Musique":
				header("Location: musique.php");
				break;
				case "LoisirSport":
				header("Location: LoisirSport.php");
				break; 
				case "Vetements":
				header("Location: Vetements.php");
				break; 
			}
        }
?>
