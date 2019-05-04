
<?php
  session_start();
?>
<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body style="padding-top:0px;">
<?php $index=0; ?>
<?php 
    try{
        $bdp = new PDO('mysql:host=localhost;dbname=ece_amazon;charset=utf8','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur:' . $e->getMessage());
    }
    ?>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"> 
    <img src="ECE_Amazon.png" width="40" height="40" class="d-inline-block align-top" alt="">ECE Amazon</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> Ventes Flash<span class="sr-only">(current)</span></a>
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

      if(utilisateur_type==4)
      {
        $("#navitem2").after('<a class="nav-link" href="profilVendeur.php">Compte Vendeur</a>');
        $("#signin").hide();
        $("#disconect").show();  
      }
      if(utilisateur_type==2)
      {
        $("#navitem2").after('<a class="nav-link" href="profilAcheteur.php">Mon Compte </a>');
        $("#signin").hide(); 
        $("#disconect").show(); 
      }
      if(utilisateur_type==3)
      {
        $("#navitem2").after('<a class="nav-link" href="profilAdmin.php">Admin </a>');
        $("#signin").hide(); 
        $("#disconect").show(); 
      }

    });

                         
</script>


  <header class="page-header clothes container-fluid">
        <script type="text/javascript">
            $('document').ready( function(){
                $('.clothes').height($(window).height()/2);
            })
        </script>
        <div class="overlay"></div>

        </header>        
 <div class="container produit"> 
    <section class="row">
    
<?php
    $i=0; 
    $response = $bdp->query('SELECT * FROM vetement');
    while($donnees = $response->fetch())
    {
        ?>

        <div class="card border-dark mb-3 col-xs-1 col-sm-1 col-md-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
                 <p class="card-text"> 
                     <strong>marque: </Strong> <?php echo $donnees['marque']; ?> <br>
                    <strong>prix: </Strong> <?php echo $donnees['prix']; ?> 
                </p>
               
               
            </div> 
            <div class="card-footer">
                     <small class="text-muted">  <a href="remplirPanier.php?id=<?php echo $donnees['id']; ?>&type=Vetements" id="aj<?php echo $i?>" class="btn btn-primary">ajouter au panier </a></small>
                     <small class="text-muted"><a href="#infos<?php echo $i?>" class="btn btn-secondary" data-toggle="modal">infos</a> </small>
            </div>
 
        </div>

        
<div class="modal fade" id="infos<?php echo $i?>" role="dialog" aria-labelledby="modalTitre" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modalTitre" class="modal-title"><?php echo $donnees['nom']; ?> </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">
        <blockquote>
        <img src="<?php echo $donnees['photo'];?>" class="img-fluid" alt="Responsive image">
        <p > 
            <strong>date: </Strong> <?php echo $donnees['date']; ?> <br>
            <strong>taille: </Strong> <?php echo $donnees['taille']; ?>  <br>
            <strong>marque: </Strong> <?php echo $donnees['marque']; ?> <br>
        </p>
        </blockquote>

      </div>
    </div>
  </div>
</div>
         
        
    <?php
    $i++;
    }
    ?>

</section>

</div>
  </body>

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

