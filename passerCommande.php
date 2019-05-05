<?php
    session_start();
    echo $_SESSION['nom'];

    //echo $_SESSION['nom'];
    //echo $_SESSION['user_type'];
    
    if($_SESSION['nom']!=" " && $_SESSION['user_type']==2){
        echo "";
    }else{
        header('location:loginPage.php');
    }

?>


<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>  
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background-image:url('MAIN.png'); background-size: cover; background-position:center;">

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"> 
    <img src="ECE_Amazon.png" width="40" height="40" class="d-inline-block align-top" alt="">ECE Amazon</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="ventesFlash.php"> Ventes Flash<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown" id="navitem2">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Categories
          </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Livres.php"><span> <span class="fa fa-book"></span> Livres</span></a>
          <a class="dropdown-item" href="Musique.php">  <i class="fa fa-music"></i><span> Musique</span> </a>
          <a class="dropdown-item" href="Vetements.php"> <i class="fa fa-black-tie"></i> <span> Vêtements</span> </a>
          <a class="dropdown-item" href="LoisirSport.php"> <i class="fa fa-bicycle"></i> <span> Sports et Loisirs</span></a>
        </div>
        </li>
        <div><?php //echo $_SESSION['pseudo']; ?></div>

      </ul>
        <div class="nav pull-right"> 
        <button id="signin" class="  btn btn-outline-success my-2 my-sm-0  " onclick="document.location.href='loginPage.php';"> Sign in </button>
        <button id="signup" class="  btn btn-outline-primary my-2 my-sm-0  " onclick="document.location.href='Signup_acheteur.html';"> Sign up </button> 
        <button id="disconect" class="btn btn-outline-primary my-2 my-sm-0" onclick="document.location.href='logout.php';">Disconnect </button>
        <button class="  btn btn-outline-danger my-2 my-sm-0 " onclick="document.location.href='monPanier.php';"><span class="fa fa-shopping-basket"></span> </button>
        </div>
    </div>
  </nav>
<!-- Fin navbar -->

<?php 
    $user_type=isset($_SESSION["user_type"])?$_SESSION["user_type"]:0;   
  ?>


<script src="jquery.js"></script>
<script>

     $('document').ready(function(){
      var utilisateur_type =<?php echo $user_type ?>;
      $("#disconect").hide(); 
      $("#signup").show();

      if(utilisateur_type==4)
      {
        $("#navitem2").after('<a class="nav-link" href="profilVendeur.php">Compte Vendeur</a>');
        $("#signin").hide();
        $("#signup").hide();
        $("#disconect").show();  
      }
      if(utilisateur_type==2)
      {
        $("#navitem2").after('<a class="nav-link" href="profilAcheteur.php">Mon Compte </a>');
        $("#signin").hide(); 
        $("#signup").hide();
        $("#disconect").show(); 
      }
      if(utilisateur_type==3)
      {
        $("#navitem2").after('<a class="nav-link" href="profilAdmin.php">Admin </a>');
        $("#signin").hide(); 
        $("#signup").hide();
        $("#disconect").show(); 
      }

    });

                         
</script>



<div class="container">
      
    <form action='verifPaiement.php' class="form-horizontal col-lg-12" method='POST'>
        <section class="row">
             
          <div class=" infopaiment col-lg-5">
            <legend> Information de livraison </legend>
            <div class="form-group"> 
                    <label>ville:</label>
                    <input type="text" value="<?php echo$_SESSION["ville"];?>" class="form-control" name="ville" placeholder="ex Paris " /><br />
                    </div>

                    <div class="form-group"> 
                            <label>adresse:</label>
                            <input type="text" value="<?php echo$_SESSION["adresse"];?>" class="form-control" name="adresse" placeholder="ex Paris " /><br />
                     </div>
                    <div class="form-group"> 
                            <label>code postal</label>
                                <input type="text" value="<?php echo $_SESSION["codepostal"];?>" class="form-control" name="cd" placeholder="ex Paris " /><br />
                    </div>

                    <div class="form-group"> 
                        <label>pays</label>
                        <input type="text" value="<?php echo $_SESSION["pays"]; ?>" class="form-control" name="pays" placeholder="ex: France " /><br />
                    </div>

                    <div class="form-group"> 
                        <label>telephone</label>
                        <input type="text" value="<?php echo$_SESSION["telephone"];?>" class="form-control" name="telephone" placeholder=" " /><br />
                    </div>  
                </div>

            <div class=" infopaiment col-lg-5">

            <div class="form-group"> 
            <legend> Information de Paiment </legend>
          <label>type de carte:</label>
          <select name="typedecarte"  class="form-control">
              <option name="categorie" value="Master Card">Master Card</option>
              <option name="categorie" value="Visa">Visa</option>
      </select> <br/>

      <div class="form-group"> 
            <label>Numero de carte</label>
             <input type="text" class="form-control" name="nc" placeholder="XXXX XXXX XXXX" /><br />
          </div>
          <div class="form-group"> 
              <label>proprietaire</label>
               <input type="text" class="form-control" name="proprio" placeholder="ex:Jean Dupond" /><br />
          </div>
          <div class="form-group"> 
              <label>date d'expiration </label>
               <input type="date" class="form-control" name="dateexpi" placeholder="ex:2020/09/16" /><br />
            </div>
            <div class="form-group"> 
                <label>cryptogramme</label>
                 <input type="text" class="form-control" name="crypto" placeholder="ex:XXX" /><br />
              </div>
              <input type="submit" class="form-control btn btn-primary" value="Valider le commande">
        </div>

        </section>
    </form>
</div>


    <footer class="page-footer"> 
         <div class="container">
             <div class="row">
                 <div class="col-lg-8 col-md-8 col-sm-12">
                        <h6 class="text-uppercase font-weight-bold">Information additionnelle</h6> 
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
                           Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque interdum quam odio, quis placerat ante luctus eu.
                           Sed aliquet dolor id sapien rutrum, id vulputate quam iaculis.
                        </p>
                </div>
             

             <div class="col-lg-4 col-md-4 col-sm-12">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6> 
                    <p>            
                            37, quai de Grenelle, 75015 Paris, France <br>             
                            info@webDynamique.ece.fr <br>             
                            +33 01 02 03 04 05 <br>             
                            +33 01 03 02 05 04       
                       </p> 
             </div>
            </div>
         </div>
         <div class="footer-copyright text-center">&copy; 2019 Copyright | Droit d'auteur: webDynamique.ece.fr</div> 
     </footer>
   
</body>
</html>