<?php
	define("serveur","localhost");
	define("utilisateur","root");
	define("mot_de_passe",'root');
	define("base","ece_amazon");

	$bdd=mysqli_connect(serveur,utilisateur,mot_de_passe,base) or die(mysqli_connect_error());
?>