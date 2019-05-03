<?php
        session_start();
		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }


        $nbArticles=count($_SESSION['panierlivre']);
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
                $myid = $_SESSION['panierlivre'][$i];
                $sql = "DELETE FROM `livre` WHERE `livre`.`id` = $myid";
            }
        
        $nbArticles=count($_SESSION['paniermusique']);
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
                $myid = $_SESSION['paniermusique'][$i];
                $sql = "DELETE FROM `musique` WHERE `musique`.`id` = $myid";
            }
        
        $nbArticles=count($_SESSION['paniervetement']);
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
                $myid = $_SESSION['paniervetement'][$i];
                $sql = "DELETE FROM `vetement` WHERE `vetement`.`id` = $myid";
            }
            
        $nbArticles=count($_SESSION['paniersport']);
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
                $myid = $_SESSION['paniersport'][$i];
                $sql = "DELETE FROM `sportloisir` WHERE `sportloisir`.`id` = $myid";
            }

		if(!mysqli_query($con,$sql)){
			echo "fail";
        }
		else{
            //rajoute supp contenu panier
            header('location:monPanier.php');
        }
?>