<?php 
    include('../inc/function.php');
    $abime=etat_des_objets_abime();
    $okey=etat_des_objets_okey();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etat des objets</title>
    <style>
         table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
        background-color: #fff;
    }

    th, td {
        padding: 12px 15px;
        border: 1px solid #ccc;
        text-align: center;
    }

    th {
        background-color: #f0f0f0;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #fafafa;
    }
    </style>
</head>
<body>
    <h2>Liste des objets okey</h2>
<table>
       <tr>
           <td>Nom :</td>
           <td>Etat :</td>
       </tr>
       <?php foreach($okey as $o){?>
           <tr>
               <td><?php echo $o['nom_objet'];?></td>
               <td><?php echo $o['etat'];?></td>
           </tr>
       <?php } ?>
   </table>

    <h2>Liste des objets abimés</h2>
    <table>
            <tr>
                <td>Nom :</td>
                <td>Etat :</td>
            </tr>
            <?php foreach($abime as $a){?>
                <tr>
                    <td><?php echo $a['nom_objet'];?></td>
                    <td><?php echo $a['etat'];?></td>
                </tr>
            <?php } ?>
        </table>

</body>
</html>