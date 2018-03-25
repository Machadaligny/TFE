
   
<?php
session_start();
     if($_SESSION["admin"] == true){

include "bdd.php";

//AJOUTER UN FILM
$database= new Database();
$message=null; 
if(!empty($_POST)){
    if(isset($_POST["titre"]) && isset($_POST["realisateur"]) && isset($_POST["categorie"]) && isset($_POST["description"]) && isset($_POST["url"]))
    {
        
        if($_POST["titre"]!=""){ 
$titre=$_POST["titre"];
$realisateur=$_POST["realisateur"];
$categorie=$_POST["categorie"];
$description=$_POST["description"];
$url=$_POST["url"];


//INSERER UNE IMAGE:
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0)
{
    
    // Testons si le fichier n'est pas trop gros
    if ($_FILES["image"]["size"] <= 1000000)
    {
        // Testons si l'extension est autorisée
        $infosfichier = pathinfo($_FILES["image"]["name"]);
        $extension_upload = $infosfichier["extension"];
        $extensions_autorisees = array("jpg", "jpeg", "gif", "png");
            if (in_array($extension_upload, $extensions_autorisees)){
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . basename($_FILES["image"]["name"]));
                echo "L'envoi a bien été effectué !";
                $affiche="images/" . basename($_FILES["image"]["name"]);
            }
        }

}
 $affiche="images/" . basename($_FILES["image"]["name"]);
$database->ajouterfilm($titre, $realisateur, $categorie, $description, $url, $affiche);
}else{
    $img="<img src=images/warning.jpg width=2%/>";
    $message="<br>" .$img . "Vous devez au minimum rajouter un titre!" . "<br>";

}}}

$resultat=$database->selectfilms();

$resultat5=$database->selectID();

echo "<br>";
$film=null;
if(!empty($_GET)){
    if (isset($_GET["film"])){
        $film=$_GET["film"];
    }
} 


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>My Movie Marathon Admin</title>
        
    </head>
    <body>
        <a href=index.php>Retour en mode normal</a>
        <form method="post" action="index.php">
            <input type="submit" name="deco" value="Déconnection">
        </form>
        <?php
        if(isset($_POST["deco"])){
            session_destroy();
        }
        ?>
        <h1>Ajouter un film</h1>
      
        <form action="" method="POST" enctype="multipart/form-data" >
            <input type=text placeholder="Titre du film" name="titre">
            <input type=text placeholder="Nom du réalisateur" name="realisateur">
            <input type=text placeholder="Catégorie" name="categorie">
            <input type=text placeholder="Description" name="description">
            <input type=text placeholder="Proposer un lien" name="url">
            <br>insérer une image:
            <input type=file value="Insérer une image" name="image">
            
            <?php echo $message; ?>
            <input type=submit value="Ajouter">
        </form>
        <h1>Enlever un film</h1><p>(cliquez ci-dessous sur le film que vous souhaitez effacer)</p>
        
        <p>   <?php foreach($resultat as $row){
            
                echo  "<a href=effacerfilm.php?film=".$row["ID"].">" ."<img width=15% src=".$row["Affiche"]."></img>" . "</a>" ;
            } ?>
            
        
    </p>
        <h1>Modifier un film </h1>
        <h1>et effacer des commentaires
        </h1>
        <p>(cliquez ci-dessous sur le film que vous souhaitez modifier)</p>
        <?php
           foreach($resultat as $row){
            
                echo  "<a href=modiffilm.php?film=".$row["ID"].">" . "<img width=15% src=".$row["Affiche"]."></img>" . "</a>" ;
            }
        ?>
        
  <?php
     }else{
         echo "Cliquez <a href='index.php'>ICI</a> pour retourner sur l'index";
     }
  ?>  
  
            
    </body>
</html>