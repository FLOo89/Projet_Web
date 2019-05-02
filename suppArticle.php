<?php
		$con = mysqli_connect('localhost','root','root','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }

        $id = $_GET['id'];
		
		$sql = "DELETE FROM livres WHERE id='$id'";

		if(!mysqli_query($con,$sql)){
			echo "fail";
        }
        
		else{
			echo "article supprimé";
        }
?>

