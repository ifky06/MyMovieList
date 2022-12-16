<?php
require '../backend/film.php';
require '../backend/auth.php';
require '../backend/connection.php';
$film = getAll();

// tombol cari ditekan
if(isset($_POST["cari"])){
    $film = search($_POST["keyword"]);
}

// tombol logout ditekan
if(isset($_POST["submit"])){
    logout();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <button type="submit" name="submit">Logout</button>
    </form>
    <table>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Rating</th>
            <th>Link</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($film as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><img src="/img/<?= $row["cover"]; ?>" alt=""></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["genre"]; ?></td>
            <td><?= number_format($row["rating"],1) ; ?></td>
            <td><a href="detail.php?id=<?= $row["id"]; ?>">Lihat Detail</a></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>