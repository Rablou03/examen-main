<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="traitement/traitement.php" method="get">
        <label for="nom">Nom:</label><input type="text" name="nom">
        <label for="nom">Date de naissance:</label><input type="text" name="dtn">
        <label for="nom">Genre:</label><input type="text" name="genre" placeholder="F ou M">

        <label for="mail">Email:</label><input type="text" name="mail">
        <label for="ville">Ville:</label><input type="text" name="ville">
        <label for="mdp">Mot de passe:</label><input type="text" name="mdp">
        <label for="file">choisir </label><input type="image" name="nom">
            <input type="submit" name="uploader" id="">
        <input type="submit"  value="M'inscrire" name="inscription">
       
    </form>
</body>
</html>