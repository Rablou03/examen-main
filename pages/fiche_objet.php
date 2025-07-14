<?php 
    include("../inc/function.php");
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $infos_objet=get_info_objet($id);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f8;
        padding: 40px;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    img {
        display: block;
        max-width: 300px;
        margin: 0 auto 20px auto;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.2);
    }

    h1, h2 {
        text-align: center;
        color: #222;
    }

    p {
        font-size: 16px;
        margin: 10px 0;
        text-align: center;
    }

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

    .no-data {
        text-align: center;
        font-style: italic;
        color: #888;
    }
</style>

</head>
<body>
    <?php foreach($infos_objet as $io){?>
        <img src="../assets/images/<?php ?>" alt="">
        <p>Nom : <?php echo $io['nom_objet'];?></p>
        <p>Catégorie : <?php echo $io['nom_categorie'];?></p>
        <?php }?>
        <h2>Historique des emprunts</h2>
        <table>
            <tr>
                <td>Emprunté le :</td>
                <td>Par :</td>
                <td>Rendu le :</td>
            </tr>
            <?php foreach($infos_objet as $io){?>
                <tr>
                    <td><?php echo $io['date_emprunt'];?></td>
                    <td><?php echo $io['nom'];?></td>
                    <td><?php echo $io['date_retour'];?></td>
                </tr>
            <?php } ?>
        </table>
        <img>
</body>
</html>