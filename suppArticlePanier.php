<?php
		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }

        $id = $_GET['id'];
        $type = $_GET['type'];

		if($type=='Livres'){
            $sql = "DELETE FROM panier WHERE idarticle='$id' AND type='$type'";
        }
        if($type=='Musique'){
            $sql = "DELETE FROM panier WHERE idarticle='$id' AND type='$type'";
        }
        if($type=='Vetements'){
            $sql = "DELETE FROM panier WHERE idarticle='$id' AND type='$type'";
        }
        if($type=='LoisirSport'){
            $sql = "DELETE FROM panier WHERE idarticle='$id' AND type='$type'";
        }

		if(!mysqli_query($con,$sql)){
			echo "fail";
        }
		else{
            echo "article supprimé";
            header('location:monPanier.php');
        }
?>