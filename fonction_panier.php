<?php

    $Ajout_panier = isset($_POST["code"])?strip_tags($_POST["code"]):"";
    function CreationPanier(){
        
        if(!isset($_SESSION["panier"]))
        {
            $_SESSION["panier"]=array(); 
        $_SESSION["panier"]["IDProduit"]=array();
        $_SESSION["panier"]["nomProduit"]=array();
        $_SESSION["panier"]["PrixProduit"]=array();
        $_SESSION["panier"]["QuantiteProduit"]=array();
        $_SESSION["panier"]["CatégorieProduit"]=array();
        }
        
        return true; 

    }

    function AjouterProduit($id,$nom,$Q,$prix,$Categorie){

        if(CreationPanier)
        {
            $Pos_Produit = array_search($nom, $_SESSION["panier"]["nomProduit"]);
            
            if($Pos_Produit !== false){
                $_SESSION["panier"]["QuantiteProduit"][$Pos_Produit]+=$Q;

            }
            else{
                array_push($_SESSION["panier"]["IDProduit"],$id);
                array_push($_SESSION["panier"]["nomProduit"],$nom); 
                array_push($_SESSION["panier"]["PrixProduit"],$prix);
                array_push($_SESSION["panier"]["QuantiteProduit"],$Q);
                array_push($_SESSION["panier"]["CategorieProduit"],$Categorie);
            }
        }
        else 
        echo "erreur veuillez contacter l'administration"; 
    }

    if($Ajout_panier==1)
    {
        AjouterProduit($_POST["id"],$_POST["nom"],$_POST["quantite"],$_POST["prix"],$_POST["categorie"]);
      
    }


?> 
 <span> <?php echo $_SESSION["panier"]["nomProduit"] ?> nnnn </span>