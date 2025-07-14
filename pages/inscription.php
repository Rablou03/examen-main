<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="password"],
        form input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            background-color: #212721ff;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #d9bddaff;
        }
    </style>
</head>

<body>
    <form action="traitement/traitement.php" method="get">
        <label for="nom">Nom:</label><input type="text" name="nom">
        <label for="nom">Date de naissance:</label><input type="date" name="dtn">
        <label for="nom">Genre:</label><input type="text" name="genre" placeholder="F ou M">
        <label for="mail">Email:</label><input type="text" name="mail">
        <label for="ville">Ville:</label><input type="text" name="ville">
        <label for="mdp">Mot de passe:</label><input type="password" name="mdp">
             
        <input type="submit" value="S'inscrire" name="inscription">
    </form>
</body>
</html>