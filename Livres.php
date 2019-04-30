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
<body>
<?php $index=0; ?>
<?php 
    try{
        $bdp = new PDO('mysql:host=localhost;dbname=ece_amazon;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch(Exception $e)
    {
        die('Erreur:' . $e->getMessage());
    }
    ?>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <a class="navbar-brand" href="main.php"> 
  <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">ECE Amazon</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> Ventes Flash</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">(current)</span>Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="Livres.php"><span class="sr-only">(current)</span> <span class="fa fa-book"></span> Livres</a>
          <a class="dropdown-item" href="Musique.php">  <i class="fa fa-music"></i><span> Musique</span> </a>
          <a class="dropdown-item" href="Vetements.php"> <i class="fa fa-black-tie"></i> <span> Vêtements</span> </a>
          <a class="dropdown-item" href="LoisirSport"> <i class="fa fa-bicycle"></i> <span> Sports et Loisirs</span></a>
        </div>
      </li>
      <button class="btn btn-outline-success my-2 my-sm-0" onclick="document.location.href='loginPage.html';">Sign in</button>
      <button class="  btn btn-outline-danger my-2 my-sm-0 " onclick="document.location.href='Panier.php';"><span class="fa fa-shopping-basket"></span></button>
    </ul>
  </div>
</nav>


  <header class="page-header header container-fluid">
        <script type="text/javascript">
            $('document').ready( function(){
                $('.header').height($(window).height()/2);
            })
        </script>
        <div class="overlay"></div>

        </header>        
 <div class="container produit"> 
    <section class="row">
    
<?php
    $i=0; 
    $response = $bdp->query('SELECT * FROM livre');
    while($donnees = $response->fetch())
    {
        ?>

        <div class="card border-dark mb-3 col-xs-1 col-sm-1 col-md-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
                 <p class="card-text"> 
                     <strong>auteur: </Strong> <?php echo $donnees['auteur']; ?> <br>
                    <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
                </p>
               
               
            </div> 
            <div class="card-footer">
                     <small class="text-muted">  <a href="#" id="aj<?php echo $i?>" class="btn btn-primary">ajouter au panier </a></small>
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
            <strong>style: </Strong> <?php echo $donnees['style']; ?> € <br>
            <strong>auteur: </Strong> <?php echo $donnees['auteur']; ?> <br>
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


     <script src="jquery.js"></script>
    <script>
      $(function() {
        var div = $('div')[0];
        $.data(div, 'mesValeurs', {premier: 'bonjour', deuxieme: 12, troisieme: 'http://www.siteduzero.com'});
        var val1 = $.data(div, 'mesValeurs').premier;
        var val2 = $.data(div, 'mesValeurs').deuxieme;
        var val3 = $.data(div, 'mesValeurs').troisieme;
        $('#sp1').text(val1);
        $('#sp2').text(val2);
        $('#sp3').text(val3);
        }); 
    </script>    
