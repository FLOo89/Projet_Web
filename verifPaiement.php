<?php
    // tous d'abord il faut démarrer le système de sessions
    session_start();
    echo $_SESSION['nom'];

	if ($_POST) {
		require_once 'connexion.php'; 
        extract($_POST);
        
        $sql="SELECT * FROM acheteur WHERE numerocarte='$numerocarte' AND cryptocarte='$crypto'";

        $resultat=mysqli_query($bdd,$sql);
        echo mysqli_error($bdd);
		if($resultat){
            echo 'denzonfozeo';
			if(mysqli_num_rows($resultat)==0){
				echo 'Coordonées bancaires incorrectes !!';
			}
			else{
				$row=mysqli_fetch_assoc($resultat);
                echo "C'est payé !";
                header('location:suppArticleBDD.php');
			}
		}
		mysqli_free_result($resultat);
		mysqli_close($bdd);
    }
?>
