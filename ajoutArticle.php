<!DOCTYPE html>
<html lang="fr">

<head>
    	<meta charset="utf-8">  
				<meta name="viewport" content="width=device-width, initial-scale=1">      
				<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">    
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
				<link rel="stylesheet" href="style.css">        
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <title>page ajout d'article</title>
</head>

<body>
        <form id="selectioncategorie" action='' method='POST'>

                <div class="form-group"> 
                <label>Catégorie de l'article:</label>
                <select class="inputState"  class="form-control">
                        <option name="categorie" value="1">Livre</option>
                        <option name="categorie" value="2">Musique</option>
                        <option name=categorie value="3">Vetement</option>
                        <option name="categorie" value="4">Sport et Loisir</option>
                </select>
                
            </div>  
            </form> 

            <div class="formulairearticle">
           </div>


<script src="jquery.js"></script>
<script>

     $('document').ready(function(){
       
      $("option").click(function(){ 
          if($(".inputState").val()==1)
          {    
                $.get("ajoutLivre.html", function(data){
                $(".formulairearticle").html(data);});

          }
          if($(".inputState").val()==2)
          {     
                $.get("ajoutMusique.html", function(data){
                $(".formulairearticle").html(data);});

          }
          if($(".inputState").val()==3)
          {    
                $.get("ajoutVetement.html", function(data){
                $(".formulairearticle").html(data);});

          }
          if($(".inputState").val()==4)
          {   
                $.get("ajoutSport.html", function(data){
                $(".formulairearticle").html(data);});

          }
           
      });
      
    });                      
</script>




</body>
