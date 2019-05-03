<?php
		$con = mysqli_connect('localhost','root','','ece_amazon');

		if(!$con){
			echo "Pas connecté au serveur";
        }

		$id = $_GET['id'];
		echo $id;
        $sql= array("DELETE FROM livre WHERE idvendeur='$id'","DELETE FROM musique WHERE idvendeur='$id'", "DELETE FROM vetement WHERE idvendeur='$id'",
         "DELETE FROM sportloisir WHERE idvendeur='$id'","DELETE FROM vendeur WHERE id='$id'"); 
        
        for($i=0 ; $i<5; $i++)
        {
            if(!mysqli_query($con,$sql[$i])){
            //header('Location: profilAdmin.php');
            echo mysqli_error($con); 
            echo "fail";
        }
        
		else{
			echo "article supprimé";
			//header('Location: profilAdmin.php');
        }
        }
		
?>



