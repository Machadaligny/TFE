<?php

    class Database{
    public $db;
    public function __construct(){
      
        $this->db= new PDO("mysql:host=localhost;dbname=TFE;charset=utf8", "root", "");
    }

    public function selectfilms($condition="1"){
        $statement= $this->db->prepare("SELECT * FROM films WHERE $condition");
        $statement->execute();

        $rows= $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function ajouterfilm($titre, $realisateur, $categorie, $description, $url, $affiche){
        $statement2= $this->db->prepare("INSERT INTO films(Titre, Réalisateur, Catégorie, Description, URL, Affiche) VALUES (?,?,?,?,?,?)");
        $statement2->execute(array($titre, $realisateur, $categorie, $description, $url, $affiche));
        }
    public function miseAJour($titre2, $realisateur2, $categorie2, $description2, $url2, $affiche2, $id){
        $statement3= $this->db->prepare("UPDATE films SET Titre=?, Réalisateur=?, Catégorie=?, Description=?, URL=?, Affiche=? WHERE id=$id");
        $statement3->execute(array($titre2, $realisateur2, $categorie2, $description2, $url2, $affiche2));
    }
    public function miseAJoursansAffiche($titre2, $realisateur2, $categorie2, $description2, $url2, $id){
        $statement6= $this->db->prepare("UPDATE films SET Titre=?, Réalisateur=?, Catégorie=?, Description=?, URL=? WHERE id=$id");
        $statement6->execute(array($titre2, $realisateur2, $categorie2, $description2, $url2));
    }
    
    public function effacerfilm($id){
        $statement4=$this->db->prepare("DELETE FROM films WHERE id=$id");
        $statement4->execute();
    
    }
    public function effacerCommentaire($idComment){
        $statement4=$this->db->prepare("DELETE FROM commentaires WHERE IDcomment=$idComment");
        $statement4->execute();
    
    }
    public function selectAffiche($film){
        $statement5= $this->db->prepare("SELECT Affiche FROM films WHERE ID=$film");
        $statement5->execute();

        $rows2= $statement5->fetchAll(PDO::FETCH_ASSOC);
        return $rows2;
    }
    public function selectLoginetpass($IDutilisateur){
        $statement5= $this->db->prepare("SELECT login, password FROM utilisateurs WHERE ID=$IDutilisateur");
        $statement5->execute();

        $rows2= $statement5->fetchAll(PDO::FETCH_ASSOC);
        return $rows2;
    }
    public function selectComment($film){
        $statement7=$this->db->prepare("SELECT commentaire FROM commentaires WHERE IDfilm=$film");
        $statement7->execute();

        $rows2= $statement7->fetchAll(PDO::FETCH_ASSOC);
        return $rows2;
    }
    public function selectIDetComment($film){
        $statement8=$this->db->prepare("SELECT IDcomment, commentaire FROM commentaires WHERE IDfilm=$film");
        $statement8->execute();

        $rows2= $statement8->fetchAll(PDO::FETCH_ASSOC);
        return $rows2;
    }
     public function selectRealisateur($film){
        $statement3= $this->db->prepare("SELECT Réalisateur FROM films WHERE ID=$film");
        $statement3->execute();
        $rows3= $statement3->fetchAll(PDO::FETCH_ASSOC);
        return $rows3;
    }
    
    public function selectCategorie($film){
        $statement4= $this->db->prepare("SELECT Catégorie FROM films WHERE ID=$film");
        $statement4->execute();
        $rows4= $statement4->fetchAll(PDO::FETCH_ASSOC);
        return $rows4;
    }
    
    public function selectdescription($film){
        $statement5= $this->db->prepare("SELECT Description FROM films WHERE ID=$film");
        $statement5->execute();
        $rows5= $statement5->fetchAll(PDO::FETCH_ASSOC);
        return $rows5;
    }
    public function selectTitre($film){
        $statement2= $this->db->prepare("SELECT Titre FROM films WHERE ID=$film");
        $statement2->execute();
        $rows2= $statement2->fetchAll(PDO::FETCH_ASSOC);
        return $rows2;
    }
    public function selectURL($film){
        $statement6= $this->db->prepare("SELECT URL FROM films WHERE ID=$film");
        $statement6->execute();
        $rows6= $statement6->fetchAll(PDO::FETCH_ASSOC);
        return $rows6;
    }
    public function selectID($condition="1"){
        $statement6= $this->db->prepare("SELECT ID FROM films WHERE $condition");
        $statement6->execute();

        $rows2= $statement6->fetchAll(PDO::FETCH_ASSOC);
        return $rows2;
    }
    public function ajouterCommentaire($commentaire, $IDfilm){
        $statement2= $this->db->prepare("INSERT INTO commentaires(commentaire, IDfilm) VALUES (?,?)");
        $statement2->execute(array($commentaire, $IDfilm));
        } 
        
    public function afficherCommentaire($liste){
        foreach($liste as $row){
            foreach($row as $key => $value){
                echo  $value;
            }
        }
    }
    public function afficherResultat($liste){
        foreach($liste as $row){
            foreach($row as $key => $value){
                echo  $value ;
            }
            
        }
    }
    
    
}

?>