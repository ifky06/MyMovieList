<?php
require '../../backend/film.php';
require '../../backend/connection.php';
$film = getAll();

// tombol cari ditekan
if(isset($_POST["cari"])){
    $film = search($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container px-5 pb-5 pt-3 mt-5 bg-secondary rounded text-light">
        <div class="row">
            <div class="col">
                <h1 class="py-1">Daftar film</h1>
            </div>
            <div class="col">
                <form action="" method="post">
                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan Keyword Pencarian" autocomplete="off" class="form-control">
                    <button type="submit" name="cari" class="btn btn-primary mt-2">Cari</button>
                </form>
            </div>
            <div class="text-right col pt-2">
                <a class="align-middle btn btn-success text-right" href="insert_film.php">Tambah Data</a>
            </div>
        </div>
        <div class="table-responsive">
    <table class="table table-striped table-dark text-center rounded">
        <thead>
        <tr>
            <th>No.</th>
            <th>Judul</th>
            <th>Sinopsis</th>
            <th>Tanggal Rilis</th>
            <th>Sutradara</th>
            <th>Karakter</th>
            <th>Pemeran</th>
            <th>Genre</th>
            <th>Trailer</th>
            <th>Rating</th>
            <th>Cover</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach($film as $row) : ?>
        <tr>
            <td class="align-middle"><?= $i; ?></td>
            <td class="align-middle"><?= $row["judul"]; ?></td>
            <td class="align-middle"><?= $row["sinopsis"]; ?></td>
            <td class="align-middle"><?= $row["tanggal_rilis"]; ?></td>
            <td class="align-middle"><?= $row["sutradara"]; ?></td>
            <td class="align-middle"><?= $row["karakter"]; ?></td>
            <td class="align-middle"><?= $row["pemeran"]; ?></td>
            <td class="align-middle"><?= $row["genre"]; ?></td>
            <td class="align-middle"><?= $row["trailer"]; ?></td>
            <td class="align-middle"><?= number_format($row["rating"],1) ; ?></td>
            <td class="align-middle">
                <img width="100px" src="../img/<?= $row["cover"]; ?>" alt="">
            </td>
            <td class="align-middle">
                <a class="btn btn-primary btn-sm"  href="edit.php?id=<?= $row['id']; ?>">edit</a> | <a class="btn btn-danger btn-sm" href="hapus.php?id=<?= $row['id']; ?>">hapus</a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>