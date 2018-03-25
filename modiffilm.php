
<?php
session_start();
     if($_SESSION["admin"] == true){
include "bdd.php";

$film=null;
if(!empty($_GET)){
    if (isset($_GET["film"])){
        $film=$_GET["film"];
    }
}       
$database= new Database;

$message=null;
 if (!empty($_POST['confirmer'])){
      if (isset($_POST['confirmer'])) {
if(!empty($_POST)){
    if(isset($_POST["titre2"]) && isset($_POST["realisateur2"]) && isset($_POST["categorie2"]) && isset($_POST["description2"]) && isset($_POST["url2"]))
    {
        if($_POST["titre2"]!=""){
        $titre2=$_POST["titre2"];
        $realisateur2=$_POST["realisateur2"];
        $categorie2=$_POST["categorie2"];
        $description2=$_POST["description2"];
        $url2=$_POST["url2"];
        
        

if (isset($_FILES["image2"]) AND $_FILES["image2"]["error"] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES["image2"]["size"] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES["image2"]["name"]);
                $extension_upload = $infosfichier["extension"];
                $extensions_autorisees = array("jpg", "jpeg", "gif", "png");
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES["image2"]["tmp_name"], "images/" . basename($_FILES["image2"]["name"]));
                        $affiche2="images/" . basename($_FILES["image2"]["name"]);
                        $database->miseAJour($titre2, $realisateur2, $categorie2, $description2, $url2, $affiche2, $film);
                }else{echo "l'extension du fichier doit être jpg, jpeg, gif ou png";
                $database->miseAJoursansAffiche($titre2, $realisateur2, $categorie2, $description2, $url2, $film);}
        }else{echo "votre image ne peut excéder 1Mo";
        $database->miseAJoursansAffiche($titre2, $realisateur2, $categorie2, $description2, $url2, $film);}
}
$affiche2="images/" . basename($_FILES["image2"]["name"]);

$database->miseAJoursansAffiche($titre2, $realisateur2, $categorie2, $description2, $url2, $film);
}}}}}
if (!empty($_POST['erase'])){
      if (isset($_POST['erase'])) {
       $resultat2=$database->selectIDetcomment($film);
             
            foreach($resultat2 as $rows2){
                $idComment=$rows2["IDcomment"];
                $database->effacerCommentaire($idComment);
            }
        }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FILM</title>
    </head>
    <body><h1>Modifier un film</h1>
        <form action="" method="POST" enctype="multipart/form-data">
         image actuelle:
            <img width=15% src="
            <?php $resultat=$database->selectAffiche($film);  
            $database->afficherResultat($resultat); 
            ?>"
            </img>
            <br>insérer une image <br>(max 1Mo, formats acceptés: jpg, jpeg, gif, png):
            
            <input type=file placeholder="insérer une image" name="image2"><br>
            <input type=text value="<?php $resultat=$database->selectTitre($film);
            $database->afficherResultat($resultat); 
            ?>" name="titre2"><br>
            <input type=text value="<?php $resultat=$database->selectRealisateur($film);
            $database->afficherResultat($resultat); 
            ?>" name="realisateur2">
            <input type=text value="<?php $resultat=$database->selectCategorie($film);
            $database->afficherResultat($resultat);?>" name="categorie2">
            <br>
            <textarea  cols="40" rows="5" name="description2"><?php $resultat=$database->selectdescription($film);
            $database->afficherResultat($resultat);?></textarea>
            <br>
            <textarea  cols="40" rows="2" name="url2"><?php $resultat=$database->selectURL($film);
            $database->afficherResultat($resultat);?></textarea>
            <br>
           
            
            <input type=submit name="confirmer" value="Confirmer la modification"   
        onclick="return confirm('Êtes-vous sûr(e) de vouloir modifier ce film?')">
         </form>
            <h1>Enlever un commentaire</h1>
        <table>
            <tr>
                
                <th>Commentaire</th>
                <th>N°</th>
                <th>Effacer?</th>
            </tr>
            
        <?php 
            $resultat2=$database->selectIDetcomment($film);
             
            foreach($resultat2 as $rows2){
                $idComment=$rows2["IDcomment"];
                echo "<tr><td>".$rows2["commentaire"]."</td><td>". 
                $rows2["IDcomment"]."</td><td>".
                "<form action=\"\" method=\"POST\"><input type=submit name=\"erase\" value=\"effacer ce commentaire\"   
        onclick=\"return confirm(\'Êtes-vous sûr(e) de vouloir effacer ce commentaire?\')\"></form></td><tr>";
            }
        ?></table>
       
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