<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h1, p {
            color: #333;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 12px 24px;
            font-size: 16px;
            color: white;
            background-color: #040505ff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #101010ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue</h1>
        <p>Choisissez l'une des options suivantes :</p>
        <a href="pages/inscription.php" class="btn">M'inscrire</a>
        <a href="pages/login.php" class="btn">Me connecter</a>
    </div>
</body>
</html>
