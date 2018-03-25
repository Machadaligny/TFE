

<?php

include "bdd.php";

$film=null;
if(!empty($_GET)){
    if (isset($_GET["film"])){
        $film=$_GET["film"];
    }
}       
$database= new Database;
if(!empty($_POST)){
    if(!empty($_POST["soumettre"])){
        if(isset($_POST["commentaire"]) && $_POST["commentaire"]!=""){
        $commentaire=$_POST["commentaire"];
        $database->ajouterCommentaire($commentaire, $film);
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style2.css">
        <title>FILM</title>
    </head>
    <body>
             <p id="titre">Your Perfect Movie Marathon</p>
              <nav>
        <a href=index.php>Retour<a>
        </nav>
        
<table>
    <tr>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <td id="img"><img src="
            <?php $resultat=$database->selectAffiche($film);  
            $database->afficherResultat($resultat); 
            ?>" >
        </img>
        </td>
        
        <td id="else">
        <text>
            <?php $resultat=$database->selectTitre($film);
            $database->afficherResultat($resultat); 
            ?>
            
        </text>
        <text id="real">by
            <?php $resultat=$database->selectRealisateur($film);
            $database->afficherResultat($resultat); 
            ?><br>
        <p><?php $resultat=$database->selectCategorie($film);
            $database->afficherResultat($resultat);?>
        </p>
        <p id="description">
            <?php $resultat=$database->selectdescription($film);
            $database->afficherResultat($resultat); 
            ?>
            <br>
            <a id="url" href="<?php $resultat=$database->selectURL($film);
            $database->afficherResultat($resultat); 
            ?>">Voir <?php $resultat=$database->selectTitre($film);
            $database->afficherResultat($resultat); 
            ?></a>
            <br>
            </p>
       </text><br>
       
       </td>
       </table>
        
        <table>
            <tr>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <td><form action="" method="POST">
        <textarea  cols="40" rows="5" name="commentaire" placeholder="Commentaire"></textarea></td>
            <td><input type="submit" name="soumettre" value="envoyer commentaire">
        </form></td>
            <td>Commentaires des autres utilisateurs:
        <p >
        <?php $resultat=$database->selectComment($film);
        foreach($resultat as $row){
            echo "<p id=\"commentaire\">".$row["commentaire"]."</p>";
        }
            
            ?></p>
            </td>
        </table>
        
       
    </body>
</html>