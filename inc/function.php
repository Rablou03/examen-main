<?php
    
    include('connexion.php');
    
    function inscription($nom,$dtn,$mail,$mdp,$ville,$image,$genre)
    {
        $requete='INSERT INTO membre(nom,date_de_naissane,genre,email,ville,mdp,image_profil) values("%s","%s","%s","%s","%s","%s","%s")';
        $requete=sprintf($requete,$nom,$mail,$dtn,$genre,$mail,$ville,$mdp,$image);
        $insert=mysqli_query(dbconnect(),$requete);
    }

?>