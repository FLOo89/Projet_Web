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
<body style="">
    <div class="container">
        <section class="row">
            <div calss="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <form action='verifPaiement.php' class="loginform3" method='POST'>
                        <legend>Information de Paiment</legend>
                            <label>type de carte:</label>
                        <select name="typedecarte"  class="form-control">
                            <option name="categorie" value="Master Card">Master Card</option>
                            <option name="categorie" value="Visa">Visa</option>
                        </select><br />
                        </div>

                <div class="form-group"> 
                    <label>Numero de carte</label>
                    <input type="text" class="form-control" name="nc" placeholder="ex: XXXX XXXX XXXX XXXX" /><br />
                </div>
                <div class="form-group"> 
                    <label>proprietaire</label>
                    <input type="text" class="form-control" name="proprio" placeholder="ex: Jean Dupond" /><br />
                </div>
                <div class="form-group"> 
                    <label>date d'expiration </label>
                    <input type="date" class="form-control" name="dateexpi" placeholder="ex: 2020/09/12" /><br />
                    </div>
                    <div class="form-group"> 
                        <label>cryptogramme</label>
                        <input type="text" class="form-control" name="crypto" placeholder="XXX" /><br />
                </div>

	</form>
            </div>
            <div sytyle="col-xs-6 col-sm-6 col-md-6 col-lg-6">

            </div>
        </section>
    </div>

   
</body>
</html>