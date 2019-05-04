<?php
	// tous d'abord il faut démarrer le système de sessions
    session_start();
    $erreur=" ";
	if ($_POST) {
		require_once 'connexion.php'; 
		extract($_POST);

		//connexion pour vendeur
		if($type_user=="vendeur"){
			$sql="SELECT * FROM vendeur WHERE pseudo='$user_name' AND email='$password'";
		}
		if($type_user=="admin"){
			$sql="SELECT * FROM vendeur WHERE pseudo='$user_name' AND email='$password'";
		}
		//connexion pour acheteur
		if($type_user=="acheteur"){
			$sql="SELECT * FROM acheteur WHERE email='$user_name' AND mdp='$password'";
		}
		

		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			if(mysqli_num_rows($resultat)==0){
				$erreur='informatons saisies incorectes';
				
			}
			else{
				$row=mysqli_fetch_assoc($resultat);

			 if($type_user=="vendeur" &&  $row["admin"]==0){
				//$row=mysqli_fetch_assoc($resultat);
				//on charge dans la session toutes les données du vendeur
				$_SESSION['pseudo']=$row['pseudo'];
				$_SESSION['email']=$row['email'];
				$_SESSION['nom']=$row['nom'];
				$_SESSION['photo']=$row['photo'];
				$_SESSION['imagefond']=$row['imagefond'];
				$_SESSION['idvendeur']=$row['id'];
				$_SESSION['user_type']=4;
				
				header('Location: main.php');
				
			}
			 if($type_user=="admin" && $row["admin"]==1){
				//$row=mysqli_fetch_assoc($resultat);
				//on charge dans la session toutes les données du vendeur
				$_SESSION['pseudo']=$row['pseudo'];
				$_SESSION['email']=$row['email'];
				$_SESSION['nom']=$row['nom'];
				$_SESSION['photo']=$row['photo'];
				$_SESSION['imagefond']=$row['imagefond'];
				$_SESSION['idvendeur']=$row['id'];
				$_SESSION['user_type']=3;

				header('Location: main.php');
				
			}
			if($type_user=="acheteur")
			{	//$row=mysqli_fetch_assoc($resultat);
				$_SESSION['pseudo']=$row['email'];
				$_SESSION['nom']=$row['nom'];
				$_SESSION['email']=$row['email'];
				$_SESSION['adresse']=$row['adresse'];
				$_SESSION['telephone']=$row['telephone'];
				$_SESSION['ville']=$row['ville'];
				$_SESSION['codepostal']=$row['codepostal'];
				$_SESSION['pays']=$row['pays'];
				$_SESSION['typecarte']=$row['typecarte'];
				$_SESSION['numerocarte']=$row['numerocarte'];
				$_SESSION['proprietairecarte']=$row['proprietairecarte'];
				$_SESSION['expirationcarte']=$row['expirationcarte'];
				$_SESSION['cryptogramme']=$row['cryptocarte'];
				$_SESSION['photo']=$row['photo'];
				$_SESSION['user_type']=2;
				$_SESSION['idacheteur']=$row['id'];


        		header('Location: main.php');
			}

			
			}
		}
		mysqli_free_result($resultat);
		mysqli_close($bdd);
	}

	
?>
<!DOCTYPE html>
<html lang="fr">

		<head>
				<meta charset="utf-8">  
				<meta name="viewport" content="width=device-width, initial-scale=1">      
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="style.css">        
				<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>  
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
				<title>
				   page Login
				</title>
			</head>
<body style="background-image: url(https://www.sciencesetavenir.fr/assets/img/2018/03/19/cover-r4x3w1000-5aafe0de7c894-dsc-0225-pano-sm-0.jpg) ;background-size: cover ">

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
        <button class="  btn btn-outline-danger my-2 my-sm-0 " onclick=""><span class="fa fa-shopping-basket"></span> </button>
        </div>
    </div>
  </nav>


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
<!-- Fin navbar -->

	<form class="loginform needs-validation " action='loginPage.php' method='POST'>
		<legend style="color:white;"> Login Form</legend>
		<div class="form-group"> 
		<label style="color:gray;" >Type d'utilisateur :</label>
		<select id="selecttype" class="form-control" name="type_user">
			<option value="vendeur" selected>Vendeur</option>
			<option value="acheteur">Acheteur</option>
			<option value="admin">Admin</option>
		</select><br />
		</div>
		<div class="form-group">
		<label id="1"style="color:gray;" >Pseudo :</label>
		<input type="text" class="form-control" name="user_name" placeholder="Nom d'utilisateur" required /><br />
		<div class="invalid-feedback">
        pseudo requis
      </div>
		</div>
		<div class="form-group"> 
		<label id="2" style="color:gray;">Email :</label>
		<input type="text" class="form-control" name="password" placeholder="Mot de passe" required/><br />
		<div class="invalid-feedback">
        mot de passe requis
      </div>

		</div>
		
		<input type="submit" class="form-control btn btn-primary mb-2" value="Se connecter" >
		 <p style="color:red;"><?php echo $erreur ?><p>

		 <script src="jquery.js"></script>
		<script>
			  $('document').ready(function(){

			$("option").click(function(){ 
					if($("#selecttype").val()=="vendeur")
					{
					$("#1").text("pseudo");
					$("#2").text("email");
					
					}
					if($("#selecttype").val()=="acheteur")
					{
					$("#1").text("email");
					$("#2").text("mot de passe");
					
					}
				});

			  });
		</script>

	</form>

	
</body>

</html>







