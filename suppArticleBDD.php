<?php
        session_start();
		$con = mysqli_connect('localhost','root','root','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }


        $nbArticles=count($_SESSION['panierlivre']);
			for ($i=0 ;$i < $nbArticles ; $i++)
			{
                $myid = $_SESSION['panierlivre'][$i];    

                $sql = "SELECT * FROM livre WHERE id='$myid'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $modelechange = $row["modele"];
                }
                }
                $sql = "UPDATE historique SET qtn+=1 WHERE modele='$modelechange'";
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