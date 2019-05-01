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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body style="background-image: url(https://cdn.pixabay.com/photo/2016/06/17/06/04/background-1462755_960_720.jpg); background-size: cover"> 

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
        <li class="nav-item dropdown">
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
        <div><?php echo $_SESSION['pseudo']; ?></div>

      </ul>
          <div class="nav pull-right"> 
        <button class="  btn btn-outline-success my-2 my-sm-0  " onclick="document.location.href='loginPage.html';">Sign in</button>
        <button class="btn btn-outline-primary my-2 my-sm-0" onclick="document.location.href='signup_vendeur.html';">Sign up</button>
        <button class="btn btn-outline-primary my-2 my-sm-0" onclick="document.location.href='logout.php';">Disconnect</button>
        <button class="  btn btn-outline-danger my-2 my-sm-0 " onclick=""><span class="fa fa-shopping-basket"></span></button>
        </div>
    </div>
  </nav>

  <div class="container"> 
        <div class="row">
            <div class="col-sm-3 col-lg-12">
                <div class="card user" style="width: 30rem;">
                    <img src="<?php echo $_SESSION['photo']?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_SESSION['nom']?></h5>
                            <p class="card-text"></p>
                        </div> 
                        <div class="card-body">
                        <h4 class="card-title">infomations general</h4>
                         <ul class="list-group list-group-flush">
                        <li class="list-group-item">email: <?php echo $_SESSION['email']?> </li>
                        <li class="list-group-item">pays: <?php echo $_SESSION['pays']?> </li>
                        <li class="list-group-item">adresse: <?php echo $_SESSION['adresse']?> </li>
                        <li class="list-group-item">telephone: <?php echo $_SESSION['telephone']?> </li>
                        <li class="list-group-item">ville: <?php echo $_SESSION['ville']?> </li>
                        <li class="list-group-item">codepostale: <?php echo $_SESSION['codepostal']?> </li>
                        </ul>
                        </div>

                        <div class="card-body">
                        <h4 class="card-title">infomations paiment</h4>
                        <button class="btn btn-primary" id="infopaiments">plus de details</button>
                        <div id="listeinfopaiment" >
                        <ul class="list-group list-group-flush">
                        <li class="list-group-item">type de carte: <?php echo $_SESSION['typecarte']?> </li>
                        <li type="password" class="list-group-item"> numero de carte: <?php echo $_SESSION['numerocarte']?> </li>
                        <li type="password" class="list-group-item"> propriétaire carte: <?php echo $_SESSION['proprietairecarte']?> </li>
                        <li type="password" class="list-group-item"> expiration carte: <?php echo $_SESSION['expirationcarte']?> </li>
                        <li type="password" class="list-group-item"> cryptogramme carte: <?php echo $_SESSION['proprietairecarte']?> </li>
                        </ul>
                        </div> 
                    </div>
                     <div class="card-body">
                       <a href="#" class="card-link">Modifier</a>
                    </div>
            </div>
          
        </div>
</div>


</body>


<script src="jquery.js"></script>
<script>

     $('document').ready(function(){

         
        $("#listeinfopaiment").hide();
         $('#infopaiments').click(function()
         {
         $("#listeinfopaiment").toggle();
         $('#infopaiments').text("mois de détail");  
         if( !$("#listeinfopaiment").is(":visible"))  
         {
            $('#infopaiments').text("plus de détails");  
         }                            
        });
    });

                         
</script>
