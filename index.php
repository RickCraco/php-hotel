<?php 
include __DIR__ . '/model/db.php';

//var_dump($hotels);

function filterHotels($hotels, $parking, $vote){
    $hotels = array_filter($hotels, fn($hotel) => $hotel['parking'] == $parking && $hotel['vote'] >= $vote);
}

if(isset($_GET['parking']) && isset($_GET['vote'])) {
    $parking = $_GET['parking'];
    $vote = $_GET['vote'];

    filterHotels($hotels, $parking, $vote);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel): ?>
                <tr>
                    <td><?= $hotel['name'] ?></td>
                    <td><?= $hotel['description'] ?></td>
                    <td><?= $hotel['parking'] ? 'Si' : 'No' ?></td>
                    <td><?= $hotel['vote'] ?></td>
                    <td><?= $hotel['distance_to_center'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <form action="index.php" method="GET">
        <label for="parking">Parcheggio : </label>
        <select name="parking" id="parking">
            <option value="all">All</option>
            <option value="yes">Si</option>
            <option value="no">No</option>
        </select>

        <label for="vote">Voto minimo: </label>
        <input type="number" name="vote">

        <button type="submit">Filtra</button>
    </form>

</body>
</html>