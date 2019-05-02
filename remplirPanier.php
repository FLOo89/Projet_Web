<?php
		$con = mysqli_connect('localhost','root','root','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }

        $id = $_GET['id'];
        $type = $_GET['type'];
		
		$sql = "INSERT INTO panier (idarticle,type) VALUES ('$id','$type')";

		if(!mysqli_query($con,$sql)){
			echo "fail";
        }
        
		else{
			echo "inserted";
        }
?>
