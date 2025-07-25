<?php
    session_start();
    include('connexion.php');
    
    function inscription($nom,$dtn,$mail,$mdp,$ville,$image,$genre)
    {
        $requete='INSERT INTO examen_membre(nom,date_de_naissane,genre,email,ville,mdp,image_profil) values("%s","%s","%s","%s","%s","%s","%s")';
        $requete=sprintf($requete,$nom,$mail,$dtn,$genre,$mail,$ville,$mdp,$image);
        echo $requete;
        $insert=mysqli_query(dbconnect(),$requete);
    }

    function get_objet(){
        $requet ='SELECT  E.nom_objet,I.nom_image,E.id_objet FROM examen_objet as E
                join examen_images_objet as I on E.id_objet=I.id_objet';
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

    function get_id($mail)
    {
        $requete="SELECT id_membre from Examen_membre where  email='%s'";
        $requete=sprintf($requete, $mail);
        $inser=mysqli_query(dbconnect(),$requete);
        $resultat=mysqli_fetch_assoc($inser);
        return $resultat['id_membre'];
    }

    function insert_img($image)
    {
        $requete='INSERT INTO examen_images_objet(nom_image) VALUES("%s")';
        echo $requete;
        $requete=sprintf($requete,$image);
        mysqli_query(dbconnect(),$requete);
    }

     function get_categorie(){
        $requete='SELECT * FROM Examen_categorie_objet';
        $table=mysqli_query(dbconnect(), $requete);
        $cat=[];
        while($result=mysqli_fetch_assoc($table)){
            $cat[]=$result;
        }
        return $cat;
    }

    function get_objet_par_cat($cat){
        $requete ="SELECT * FROM v_cat_objet WHERE nom_categorie='%s'";
        $requete=sprintf($requete, $cat);
        $table=mysqli_query(dbconnect(), $requete);
        $objets=[];
        while($result=mysqli_fetch_assoc($table)){
            $objets[]=$result;
        }

        return $objets;
    }


    function get_info_objet($id){
        $requete="SELECT * FROM v_empr_objet WHERE id_objet='%s'";
        $requete=sprintf($requete, $id);
        $table=mysqli_query(dbconnect(), $requete);
        $info=[];
        while($result=mysqli_fetch_assoc($table)){
            $info[]=$result;
        }
        return $info;
    }

    function get_nom_membre($id){
        $requete="SELECT nom FROM Examen_membre WHERE id_membre='%s'";
        $requete=sprintf($requete, $id);
        $table=mysqli_query(dbconnect(), $requete);
        $nom=mysqli_fetch_assoc($table);
        return $nom['nom'];
    }

    function emprunt_non($id_objet)
{
    $requete = 'SELECT * FROM v_empr_objet WHERE id_objet = "%s"';
    $requete = sprintf($requete, $id_objet);
    $inser = mysqli_query(dbconnect(), $requete);
    $resultat = mysqli_fetch_assoc($inser);
   
    if ($resultat) {
       
        if ($resultat['date_retour'] === null) {
            return false; 
        } else {
            return true; 
        }
    }
    
}

    function emprunt_oui($id_objet,$id_membre,$id_retour,$id_emp)
    {
        $requete='INSERT INTO Examen_emprunt(id_objet,id_membre,date_emprunt,date_retour) 
            values("%s";"%s","%s","%s")';
        $requete=sprintf($requete);
    }

    function get_emprunt_de($id){
        $requete="SELECT * FROM v_empr_objet WHERE id_membre='%s'";
        $requete=sprintf($requete, $id);
        $table=mysqli_query(dbconnect(), $requete);
        $liste=[];
        while($result=mysqli_fetch_assoc($table)){
            $liste[]=$result;
        }
        return $liste;
    }

    function etat_des_objets_abime(){
        $requete="SELECT COUNT(id_objet), nom_objet, etat FROM v_etat_objet WHERE etat='abimé'";
        $table=mysqli_query(dbconnect(), $requete);
        $liste=[];
        while($result=mysqli_fetch_assoc($table)){
            $liste[]=$result;
        }
        return $liste;
    }

     function etat_des_objets_okey(){
        $requete="SELECT COUNT(id_objet), nom_objet, etat FROM v_etat_objet WHERE etat='okey'";
        $table=mysqli_query(dbconnect(), $requete);
        $liste=[];
        while($result=mysqli_fetch_assoc($table)){
            $liste[]=$result;
        }
        return $liste;
    }
?>
    
    