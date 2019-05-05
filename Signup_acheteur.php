<?php
$con = mysqli_connect('localhost','root','root','ece_amazon');

if(!$con){
    echo "Pas connecté au serveur";
}

$nom = $_POST['nom'];
$email = $_POST['email'];
$password = $_POST['password'];
$ville = $_POST['ville'];
$pays = $_POST['pays'];
$telephone = $_POST['telephone'];
$typecarte = $_POST['typedecarte'];
$nc = $_POST['nc'];
$proprio = $_POST['proprio'];
$dateexpi = $_POST['dateexpi'];
$crypto = $_POST['crypto'];
$photo = $_POST['photo'];
$adresse = $_POST['adresse'];
$cd = $_POST['cd'];




$sql = "INSERT INTO acheteur (nom,adresse,email,mdp,ville,codepostal,pays,telephone,typecarte,numerocarte,proprietairecarte,expirationcarte,cryptocarte,photo) VALUES ('$nom','$adresse','$email','$password','$ville','$cd','$pays','$telephone','$typecarte','$nc','$proprio','$dateexpi','$crypto','$photo')";

if(!mysqli_query($con,$sql)){
    echo "fail";
    echo mysqli_error($con); 
}
else{
    echo "inserted";
    header('Location: main.php');
}

?>