<?php
    session_start();
    echo $_SESSION['nom'];

    //echo $_SESSION['nom'];
    //echo $_SESSION['user_type'];

    if($_SESSION['nom']!=" " && $_SESSION['user_type']==2){
        echo " tu vas payer grosse folle";
    }else{
        header('location:loginPage.html');
    }

?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form action='verifPaiement.php' method='POST'>
		<label>Numero de Carte :</label>
		<input type="text" name="numerocarte" placeholder="XXXX XXXX XXXX XXXX" /><br />

		<label>Cryptogramme :</label>
		<input type="text" name="crypto" placeholder="XYZ" /><br />
		<input type="submit" value="Valider le paiement" >
	</form>
</body>
</html>