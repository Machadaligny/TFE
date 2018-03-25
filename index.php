
<?php include "bdd.php";
session_start();

$message = null;
$_SESSION["admin"] = false;
    if(!empty($_POST)) {
        if(isset($_POST["login"]) && isset($_POST["password"])){
            $validLogin = "Admin";
            $validPassword = "Startcode";
            if($_POST["login"] == $validLogin){
                if($_POST["password"] == $validPassword) {
                    $_SESSION["admin"] = true;
                    header("location:admin.php");
                }else{
                    $message = "Le mot de passe est incorrect";
                }
            } else {
                $message = "Le login est incorrect";
            }
        }
    } 
$database= new Database();

$resultat=$database->selectfilms();

echo "<br>";
?>
<!DOCTYPE html>
    <html>
        <html>
    <head>
        <meta charset=utf-8>
        <title>Your Perfect Movie Marathon</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        
    </head>
    <body>
      
        <header>
            <nav>
            
            <form action="" method="POST">
                <text>se connecter en tant qu'admin:</text>
                <input type="text" value="Admin" name="login">
                <input type="password" value="Startcode" name="password">
                <input type="submit" value="Log in">
            </form>
      
            
                
            </nav>
     
        </header>
        <p id="titre">Your Perfect Movie Marathon</p>
    <br>
    <p class=image>
    <?php $resultat=$database->selectfilms();
        foreach($resultat as $row){
            
                echo  "<a  href=films.php?film=".$row["ID"].">" . "<img width=19% src=".$row["Affiche"]."></img>" . "</a>" ;
            
            } 
    ?>
    </p>
    </body>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"> </script>
    <script src="menu.js"></script>
<html>