<?php
		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }

		$id = $_GET['id'];
		$type =$_GET['type'];
		$page=$_GET['page'];
		
		$sql = "DELETE FROM $type WHERE id='$id'";

		if(!mysqli_query($con,$sql)){
			header('Location:'.$page);
        }
        
		else{
			echo "article supprimé";
			header('Location:'.$page);
        }
?>



