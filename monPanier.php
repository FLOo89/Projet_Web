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

<body style="background-image:url('MAIN.png'); background-size: cover;">
  <?php $index=0; ?>

  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ece_amazon";
$_SESSION['panierlivre']=array();
$_SESSION['paniermusique']=array();
$_SESSION['paniervetement']=array();
$_SESSION['paniersport']=array();
$_SESSION['paniertotal']=0;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM panier WHERE type='Livres' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $idpush = $row["idarticle"];
        array_push( $_SESSION['panierlivre'],$idpush);
    }
}
$sql = "SELECT * FROM panier WHERE type='Vetements'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $idpush = $row["idarticle"];
        array_push( $_SESSION['paniervetement'],$idpush);
    }
}
$sql = "SELECT * FROM panier WHERE type='LoisirSport'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $idpush = $row["idarticle"];
        array_push( $_SESSION['paniersport'],$idpush);
    }
}
$sql = "SELECT * FROM panier WHERE type='Musique'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $idpush = $row["idarticle"];
        array_push( $_SESSION['paniermusique'],$idpush);
    }
}
$conn->close();
function ispannierempty()
{
  if(isset($_SESSION['panierlivre'])&&isset($_SESSION['paniermusique'])&&isset($_SESSION['paniervetement'])&&isset($_SESSION['paniersport']))
  {
    if(count($_SESSION['panierlivre'])>0 || count($_SESSION['paniermusique'])>0 || count($_SESSION['paniervetement'])>0 || count($_SESSION['paniersport'])> 0)
  {
    $empty=0;
    
  }
  else
  {
    $empty=1;
  }
  }
  else
  {
    $empty=1;
  }
  return $empty;
}
echo count($_SESSION['panierlivre']);
?>


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


  <div class="container">
    <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-3">
        <div class="card" style="width:223px;">
          <div class="card-body">
            <h5 class="card-title"><?php echo 'Votre pannier:'?></h5>
            <h4 class="card-title"><?php echo isset($_SESSION['nom'])?$_SESSION['nom']:" " ?></h4>
            <p class="card-text"></p>
          </div>
          <ul class="list-group list-group-flush">
            <li id="montantpanier"class="list-group-item">Montant du panier: <?php echo $_SESSION["paniertotal"]?>€ </li>
            <li class="list-group-item">Nb article: <?php echo "12"?> </li>
          </ul>
        </div>
        
        <button id="passercommande"class="  btn btn-outline-success my-2 my-sm-0  " onclick="document.location.href='passerCommande.php';">Passer commande</button>
        <button class="  btn btn-outline-danger my-2 my-sm-0 " onclick="document.location.href='viderPanier.php';">Vider panier</button> 
            <script src="jquery.js"></script>
<script>
 var test =<?php echo ispannierempty(); ?>;
     $('document').ready(function(){
  
      if(test==1)
      {
        
        $("#passercommande").prop('disabled','true');
          $("#titrePvendeur").after("<p style='color:red; font-size:1.5em;'> Votre panier est vide <span class='fa fa-frown-o'></span></P>")
      }
     });
</script>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-9">
        <div class="row" id="titrePvendeur">Contenu de mon panier: </div>
        <div class="row">


          <?php
    $nbArticles=count($_SESSION['panierlivre']);
		for ($a=0 ;$a < $nbArticles ; $a++)
		{
            $i=0;
            $recherche = $_SESSION['panierlivre'][$a];
            $response = $bdp->query("SELECT * FROM livre WHERE id = '$recherche'");
            while($donnees = $response->fetch())
            { $_SESSION["paniertotal"]+=$donnees['prix'];
            ?>
           
          <div class=" arpanier card border-dark card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
              <p class="card-text">
                <strong>nom: </Strong> <?php echo $donnees['auteur']; ?> <br>
                <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
              </p>
              <small class="text-muted">  <a href="suppArticlePanier.php?id=<?php echo $donnees['id']; ?>&type=Livres" id="aj<?php echo $i?>" class="btn btn-primary">Supprimer </a></small>
            </div>
          </div>
          <?php
            $i++;
            }}
    ?>


          <?php
    $nbArticles=count($_SESSION['paniermusique']);
		for ($a=0 ;$a < $nbArticles ; $a++)
		{
            $i=0;
            $recherche = $_SESSION['paniermusique'][$a];
            $response = $bdp->query("SELECT * FROM musique WHERE id = '$recherche'");
            while($donnees = $response->fetch())
            {$_SESSION["paniertotal"]+=$donnees['prix'];
            ?>
          <div class=" arpanier card border-dark card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
              <p class="card-text">
                <strong>artiste: </Strong> <?php echo $donnees['artiste']; ?> <br>
                <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
              </p>
              <small class="text-muted">  <a href="suppArticlePanier.php?id=<?php echo $donnees['id']; ?>&type=Musique" id="aj<?php echo $i?>" class="btn btn-primary">Supprimer </a></small>
            </div>
          </div>
          <?php
            $i++;
            }}
    ?>


          <?php
    $nbArticles=count($_SESSION['paniersport']);
		for ($a=0 ;$a < $nbArticles ; $a++)
		{
            $i=0;
            $recherche = $_SESSION['paniersport'][$a];
            $response = $bdp->query("SELECT * FROM sportloisir WHERE id = '$recherche'");
            while($donnees = $response->fetch())
            {$_SESSION["paniertotal"]+=$donnees['prix'];
            ?>
          <div class=" arpanier card border-dark card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
              <p class="card-text">
                <strong>marque: </Strong> <?php echo $donnees['marque']; ?> <br>
                <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
              </p>
              <small class="text-muted">  <a href="suppArticlePanier.php?id=<?php echo $donnees['id']; ?>&type=LoisirSport" id="aj<?php echo $i?>" class="btn btn-primary">Supprimer </a></small>
            </div>
          </div>
          <?php
            $i++;
            }}
    ?>


    <?php
    $nbArticles=count($_SESSION['paniervetement']);
		for ($a=0 ;$a < $nbArticles ; $a++)
		{
            $i=0;
            $recherche = $_SESSION['paniervetement'][$a];
            $response = $bdp->query("SELECT * FROM vetement WHERE id = '$recherche'");
            while($donnees = $response->fetch())
            {$_SESSION["paniertotal"]+=$donnees['prix'];
            ?>
          <div class=" arpanier card border-dark card border-dark mb-3 col-sm-12 col-md-4 col-lg-4">
            <img src="<?php echo $donnees['photo'];?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?php echo $donnees['nom']; ?> </h5>
              <p class="card-text">
                <strong>marque: </Strong> <?php echo $donnees['marque']; ?> <br>
                <strong>prix: </Strong> <?php echo $donnees['prix']; ?> €
              </p>
              <small class="text-muted">  <a href="suppArticlePanier.php?id=<?php echo $donnees['id']; ?>&type=Vetements" id="aj<?php echo $i?>" class="btn btn-primary">Supprimer </a></small>
            </div>
          </div>
          <?php
            $i++;
            }}
    ?>




        </div>
      </div>
    </div>

    
</body>

<script src="jquery.js"> </script>
<script>
  $('document').ready(function(){
     $('#montantpanier').text('Montant du panier: <?php echo $_SESSION["paniertotal"]?>€ ');
  });
  </script>

</html>