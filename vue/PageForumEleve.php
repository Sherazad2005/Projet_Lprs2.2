<?php
session_start();
include '../src/bdd/Bdd.php';
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM `forum` WHERE canal ="generale" OR canal = "eleve/professeur"');
$req->execute(array());
$res = $req->fetchAll();

?>
<!DOCTYPE html>
<html lang="fr">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header {
            background-color: #203586;
            color: white;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
        }
        .search-bar {
            display: flex;
            align-items: center;
        }
        .search-bar input {
            padding: 0.5rem;
            border: none;
            border-radius: 4px;
        }
        .main-content {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 1rem;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .category {
            margin-bottom: 2rem;
        }
        .category h2 {
            color: #203586;
            margin-bottom: 0.5rem;
        }
        .topic-list {
            list-style: none;
            padding: 0;
        }
        .topic-list li {
            padding: 1rem;
            border-bottom: 1px solid #ddd;
        }
        .topic-list li:last-child {
            border-bottom: none;
        }
        .topic-list a {
            text-decoration: none;
            color: #333;
        }
        .topic-list a:hover {
            text-decoration: underline;
        }
        footer {
            text-align: center;
            padding: 1rem;
            background: #203586;
            color: white;
            margin-top: 2rem;
        }
    </style>
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #f5f5f5;
            }
            header {
                background-color: #203586;
                color: white;
                padding: 1rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            header a {
                color: white;
                text-decoration: none;
                margin: 0 1rem;
            }
            .search-bar {
                display: flex;
                align-items: center;
            }
            .search-bar input {
                padding: 0.5rem;
                border: none;
                border-radius: 4px;
            }
            .main-content {
                max-width: 1200px;
                margin: 2rem auto;
                padding: 1rem;
                background: white;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
            }
            .category {
                margin-bottom: 2rem;
            }
            .category h2 {
                color: #203586;
                margin-bottom: 0.5rem;
            }
            .topic-list {
                list-style: none;
                padding: 0;
            }
            .topic-list li {
                padding: 1rem;
                border-bottom: 1px solid #ddd;
            }
            .topic-list li:last-child {
                border-bottom: none;
            }
            .topic-list a {
                text-decoration: none;
                color: #333;
            }
            .topic-list a:hover {
                text-decoration: underline;
            }
            footer {
                text-align: center;
                padding: 1rem;
                background: #203586;
                color: white;
                margin-top: 2rem;
            }
        </style>
    </head>
    <body>
    <header>
        <div>
            <a href="pageaccueil.php">Accueil</a>
            <a href="#">Catégories</a>
            <a href="#">Derniers messages</a>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Rechercher...">
        </div>
    </header>
    <main class="main-content">
        <table class="table table-success table-striped">
            <tr>
                <th>Titre</th>
                <th>Sujet</th>
            </tr>
            <?php
            foreach ($res as $forum){
                ?>
                    <tr>
                <td><a href="PageReponse.php?id=<?= $forum['id_forum'] ?>"> <?= htmlspecialchars($forum["titre"]) ?></a></td>
                <td><?= htmlspecialchars($forum["messages"]) ?></td>
                    </tr>
                <?php
            }
            ?>

            <?php
            foreach ($res as $forum){
                if ($forum->canal == "generale"){
                    ?>
                    <td><a href="PageReponse.php"><?=$forum["titre"] ?></a></td>
                    <td><?=$forum["messages"] ?></td>
                    <?php
                }
            }
            ?>
        </table>
    </main>

    </body>
    </html>


