<?php

if(!isset($_SESSION["panier"]))
{
    $_SESSION['panier']=array();
    $_SESSION["panier"]['NomProduit']=array();
    $_SESSION["panier"]['QProduit']=array();  
    $_SESSION["panier"]["PrixProduit"]=array(); 
    

}

?>