<?php
    
    include('connexion.php');
    
    function inscription($nom,$dtn,$mail,$mdp,$ville,$image,$genre)
    {
        $requete='INSERT INTO examen_membre(nom,date_de_naissane,genre,email,ville,mdp,image_profil) values("%s","%s","%s","%s","%s","%s","%s")';
        $requete=sprintf($requete,$nom,$mail,$dtn,$genre,$mail,$ville,$mdp,$image);
        echo $requete;
        $insert=mysqli_query(dbconnect(),$requete);
    }

    function get_objet(){
        $requet ='SELECT DISTINCT nom_objet FROM examen_objet';
        $table=mysqli_query(dbconnect(), $requet);
        $objets=[];
        while($result=mysqli_fetch_assoc($table)){
            $object[]=$result;
        }

        return $object;
    } 

    function loggin($email, $mdp){
        $requete="SELECT * FROM examen_membre as E WHERE E.email='%s' AND E.mdp='%s'";
        $requete=sprintf($requete, $email, $mdp);
        $table = mysqli_query(dbconnect(), $requete);
        while($result=mysqli_fetch_assoc($table)){
            if($result['email']==$email && $result['mdp']==$mdp){
                return true;
            }
        }
        return false;
    }
?>
    
    