
<?php
session_start();
     if($_SESSION["admin"] == true){
include "bdd.php";

$database= new Database();
$film=null;
if(!empty($_GET)){
    if (isset($_GET["film"])){
        $film=$_GET["film"];
    }
} 
  if (!empty($_POST['Effacer'])){
      if (isset($_POST['Effacer'])) {
      
      $resultat=$database->effacerfilm($film);
      echo "le film a bien été effacé";
  }
  }


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Effacer un film</title>
</head>
<body>
    <p>  
     <?php $resultat=$database->selectTitre($film);
            $database->afficherResultat($resultat); 
            ?>
            <br>
    <img width=15% src="
            <?php $resultat=$database->selectAffiche($film);  
            $database->afficherResultat($resultat); 
            ?>"
    </img>
        
            
        
    </p>

    <form action="" method="POST">
        <input type="submit" name="Effacer" 
        value="Effacer ce film"  
        onclick="return confirm('Êtes-vous sûr(e) de vouloir effacer ce film?')">
    </form>
    <br>
    <nav>
        <a href=admin.php>Retour vers page admin<a><br>
        <a href=index.php>Retour en mode normal<a>
    </nav>
              
  <?php
     }else{
         echo "Cliquez <a href='index.php'>ICI</a> pour retourner sur l'index";
     }
  ?>  
</body>
</html>