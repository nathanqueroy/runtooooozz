<?php
$pdo = new PDO("mysql:host=localhost;dbname=sakila;charset=utf8", "root", "", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
$stmt = $pdo->prepare("SELECT * FROM actor");
$stmt->execute();
$actors = $stmt->fetchAll(PDO::FETCH_ASSOC);
?><!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste d'acteur</title>
    </head>
    <body>
        <h1>Tous les acteurs</h1>
        <table border=1>
            <tr>
                <th>Acteur id</th>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Détails</th>
            </tr>
            <?php foreach($actors as $actor): ?>
            <tr>
                <td><?= $actor["actor_id"] ?></td>
                <td><?= ucwords(strtolower($actor["first_name"])) ?></td>
                <td><?= $actor["last_name"] ?></td>
                <td><a href="voir-acteur.php?actorid=<?= $actor["actor_id"]?>">Voir les détails</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>