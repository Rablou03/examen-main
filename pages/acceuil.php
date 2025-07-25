<?php 
    include('../inc/function.php');
    $objet = get_objet();
    $cat=get_categorie();
    $emprunt=get_emprunt_de($_SESSION['id_membre']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des objets</title>
    <style>
        body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 20px;
    color: #333;
}

h1 {
    text-align: center;
    color: #222;
    margin-bottom: 30px;
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
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    max-width: 600px;
    margin: 0 auto 40px auto;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

form p {
    margin-bottom: 10px;
    font-weight: bold;
}

form select,
form input[type="text"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 16px;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

.container {
    max-width: 1000px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

.card {
    background-color: white;
    border-radius: 8px;
    padding: 15px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.03);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
}

.nom-objet {
    font-size: 18px;
    color: #222;
    font-weight: bold;
    margin-top: 10px;
}

.card img {
    max-width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 6px;
}

.nom-objet a {
    text-decoration: none;
    color: #333;
    transition: color 0.2s ease;
}

.nom-objet a:hover {
    color: #4CAF50;
}

    </style>
</head>
<body>
    <h2>Liste de vos emprunts :</h2>
    <table>
            <tr>
                <td>Objet</td>
                <td>Emprunté le :</td>
                <td>Par :</td>
                <td>Rendu le :</td>
            </tr>
            <?php foreach($emprunt as $e){?>
                <tr>
                    <td><?php echo $e['nom_objet'] ;?></td>
                    <td><?php echo $e['date_emprunt'];?></td>
                    <td>Vous</td>
                    <td><?php echo $e['date_retour'];?></td>
                </tr>
            <?php } ?>
        </table>

<button><a href="etat.php">Voir état des objets</a></button>
    <h2>Uploader un fichier</h2>
    <form action="traitement/traitement.php" method="post" enctype="multipart/form-data">
        <label for="fichier">Choisir un fichier :</label>
        <input type="file" name="fichier" id="fichier" required>
        <br><br>
        <input type="submit" value="Uploader" name="Uploader">
    </form>
    <h1>Liste des objets disponibles</h1>
    <div class="container">
    <form action="traitement/traitement.php" method="post">
        <p>Filtrer par catégorie :</p>

        <select name="categorie" id="">
            <?php foreach($cat as $c){ ?>
            <option value="<?php echo $c['nom_categorie'];?>">
                <?php echo $c['nom_categorie'];?>
            </option>
            <?php }?>
        </select>

        <p>Rechercher par nom : </p>
        <input type="text" name="nom">
        <input type="submit" value="Filtrer">
    </form>

    </div>
     <div class="container">
        <?php if(!isset($_GET['cat'])){
        foreach($objet as $o) { ?>
            <div class="card">
                <p class="nom-objet"><a href="fiche_objet.php?id=<?php echo $o['id_objet'] ?>"><?php echo $o['nom_objet']; ?></a></p>
                <img src="../assets/images/<?php echo $o['nom_image'] ; ?>" alt="">
                <?php if($o['nom_image']==null ){ ?>
                    <img src="../assets/images/inconnu.jpg" alt="">
                <?php } ?>
                <?php if(emprunt_non($o['id_objet'])==false) {?>
                <button> Impossible d'umprunter</button>
                <?php }else{?>
                    <button> <a href="date.php">je ve emprunter</a></button>
                <?php } ?>

            </div>
        <?php } }?>

        <?php if(isset($_GET['cat'])){
            $objet=get_objet_par_cat($_GET['cat']);
            foreach($objet as $o){ 
        ?>
        <div class="card">
            <p class="nom-objet"><a href="fiche_objet.php?id=<?php echo $o['id_objet'] ?>"><?php echo $o['nom_objet']; ?></a></p>
        </div>
        <?php } }?>
    </div>
</body>
</html>
