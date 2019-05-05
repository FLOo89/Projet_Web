<?php
	// tous d'abord il faut démarrer le système de sessions
    session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1">      
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url(<?php echo $_SESSION['imagefond']?>) ;background-size: cover; ">
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
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="card" style="width: 223px;">
                    <img src="<?php echo $_SESSION['photo']?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_SESSION['nom']?></h5>
                            <p class="card-text"></p>
                        </div>
                         <ul class="list-group list-group-flush">
                        <li class="list-group-item">email: <?php echo $_SESSION['email']?> </li>
                        <li class="list-group-item">pseudo: <?php echo $_SESSION['pseudo']?> </li>
                        </ul>
                     <div class="card-body">
                       <a href="#" class="card-link">Modifier</a>
                    </div>
            </div>
            <small class="text-muted"><a href="#ajouterarticleadmin" class="btn btn-primary" style="margin-bottom:5px " data-toggle="modal">Ajouter un article</a> </small> 
            <small class="text-muted"><a href="#ajoutervendeuradmin" class="btn btn-primary" style="margin-bottom:5px " data-toggle="modal">Ajouter un vendeur</a> </small> 
            
           
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9">  
        <div class="row" id="titrePvendeur" >Les Vendeurs: </div> 
        
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">nom</th>
      <th scope="col">email</th>
    </tr>
</thead>
    <tbody>
  				<?php
  					$reponse = $bdp->query("SELECT * FROM vendeur WHERE admin = 0 ");
					while ($donnees = $reponse->fetch()){
  				?>
    			<tr>
	      			<td data-toggle="modal" data-target="#myModal">
                    <img style="width: 200px; height: 200px;"src="<?php echo $donnees['photo'];?>" ></td>
      				<td data-toggle="modal" data-target="#myModal"><?php echo $donnees['nom'];?></td>
                    <td data-toggle="modal" data-target="#myModal"><?php echo $donnees['email'];?></td>
                    <td data-toggle="modal" data-target="#myModal">  <small class="text-muted">  <a href="suppVendeur.php?id=<?php echo $donnees['id']; ?>" class="btn btn-danger">Supprimer vendeur </a></small></td>

                      
      				
    			</tr>
    			<?php
    				}
					$reponse->closeCursor();
    			?>
    </tbody>

  
</table>

            <div class="row" id="titrePvendeur" >Mes articles en vente: </div>
            <div class="row">
        <?php
    $i=0; 
    $response = $bdp->prepare('SELECT * FROM livre WHERE idvendeur=? ');
    $response->execute(array($_SESSION['idvendeur']));
    while($donnees = $response->fetch())
    {
        ?>
        
        <div class="card border-dark card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
                 <p class="card-text"> 
                     <strong>auteur: </Strong> <?php echo $donnees['auteur']; ?> <br>
                    <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
                </p>
            </div>
            <div class="card-footer">
                     <small class="text-muted">  <a href="suppArticle.php?id=<?php echo $donnees['id']; ?>&type=livre&page=profilAdmin.php" id="aj<?php echo $i?>" class="btn btn-danger">Supprimer article </a></small>        
            </div>
        </div>

        <?php
    $i++;
    }
    ?>
     <?php
    $i=0; 
    $response = $bdp->prepare('SELECT * FROM Musique WHERE idvendeur=? ');
    $response->execute(array($_SESSION['idvendeur']));
    while($donnees = $response->fetch())
    {
        ?>
        
        <div class="card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
                 <p class="card-text"> 
                     <strong>artiste: </Strong> <?php echo $donnees['artiste']; ?> <br>
                    <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
                </p>
            </div>
            <div class="card-footer">
                     <small class="text-muted">  <a href="suppArticle.php?id=<?php echo $donnees['id']; ?>&type=musique&page=profilAdmin.php" id="aj<?php echo $i?>" class="btn btn-danger">Supprimer article </a></small>        
            </div>
        </div>

        <?php
    $i++;
    }
    ?>
     <?php
    $i=0; 
    $response = $bdp->prepare('SELECT * FROM sportloisir WHERE idvendeur=? ');
    $response->execute(array($_SESSION['idvendeur']));
    while($donnees = $response->fetch())
    {
        ?>
        
        <div class="card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
                 <p class="card-text"> 
                     <strong>marque: </Strong> <?php echo $donnees['marque']; ?> <br>
                    <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
                </p>
               
               
            </div> 
            <div class="card-footer">
                     <small class="text-muted">  <a href="suppArticle.php?id=<?php echo $donnees['id']; ?>&type=sportloisir&page=profilAdmin.php" id="aj<?php echo $i?>" class="btn btn-danger">Supprimer article </a></small>        
            </div>
        </div>

        <?php
    $i++;
    }
    ?>
     <?php
    $i=0; 
    $response = $bdp->prepare('SELECT * FROM vetement WHERE idvendeur=? ');
    $response->execute(array($_SESSION['idvendeur']));
    while($donnees = $response->fetch())
    {
        ?>
        
        <div class="card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
                 <p class="card-text"> 
                     <strong>marque: </Strong> <?php echo $donnees['marque']; ?> <br>
                    <strong>prix: </Strong> <?php echo $donnees['prix']; ?> 
                </p>
               
               
            </div> 
            <div class="card-footer">
                     <small class="text-muted">  <a href="suppArticle.php?id=<?php echo $donnees['id']; ?>&type=vetement&page=profilAdmin.php" id="aj<?php echo $i?>" class="btn btn-danger">Supprimer article </a></small>        
            </div>
        </div>

        <?php
    $i++;
    }
    ?>


</div>
</div>
</div>

        
<div class="modal fade" id="ajoutervendeuradmin" role="dialog" aria-labelledby="modalTitre" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 20%;">
      <div class="modal-header">
        <h4 id="modalTitre" class="modal-title">Formulaire d'ajout vendeur</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">
        <blockquote>
       <?php include("signup_vendeur.html"); ?> 
        </blockquote>

      </div>
    </div>
  </div>
</div>
   


<div class="modal fade" id="ajouterarticleadmin" role="dialog" aria-labelledby="modalTitre" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="modalTitre" class="modal-title">Formulaire d'ajouterarticle</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <div class="modal-body">
        <blockquote>
       <?php 
            include("ajoutArticle.php");  
        ?> 
        </blockquote>

      </div>
    </div>
  </div>
</div>

</body>



</html>