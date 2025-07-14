<?php 
    include('../../inc/function.php');

     if(isset($_GET['inscription'])){
        inscription($_GET['nom'],$GET['dtn'],$_GET['mail'],$_GET['mdp'],$_GET['ville'],null,$_GET['genre']);
        header('location:../acceuil.php');
    }
   





?>