<?php
require '../backend/film.php';
require '../backend/rateComment.php';
require '../backend/connection.php';

session_start();

$id=$_GET["id"];
$film=getById($id);
$comment=showComment($id);

if(isset($_POST["submit"])){
    if(rate($_POST,$id)>0){
        echo "
            <script>
                alert('rate berhasil');
                document.location.href='detail.php?id=$id';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('rate gagal');
                document.location.href='detail.php?id=$id';
            </script>
        ";
    }
}

if(isset($_POST["komen"])){
    if(comment($_POST,$id)>0){
        echo "
            <script>
                alert('comment berhasil');
                document.location.href='detail.php?id=$id';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('comment gagal');
                document.location.href='detail.php?id=$id';
            </script>
        ";
    }
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
    <ul>
        <li><img src="/img/<?= $film["cover"]; ?>" alt=""></li>
        <li><?= $film["judul"]; ?></li>
        <li><?= $film["genre"]; ?></li>
        <li><?= $film["rating"]; ?></li>
        <li><?= $film["tanggal_rilis"]; ?></li>
        <li><?= $film["sinopsis"]; ?></li>
        <li><?= $film["pemeran"]; ?></li>
        <li><?= $film["karakter"]; ?></li>
        <li><?= $film["trailer"]; ?></li>
    </ul>
    <a href="index.php">Kembali ke daftar film</a>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $film["id"]; ?>">
        <p>Rate</p>
        <input type="radio" name="rating" value="1">1
        <input type="radio" name="rating" value="2">2
        <input type="radio" name="rating" value="3">3
        <input type="radio" name="rating" value="4">4
        <input type="radio" name="rating" value="5">5
        <button type="submit" name="submit">Submit</button>
    </form>

    <!-- make comment form -->
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $film["id"]; ?>">
        <p>Comment</p>
        <input type="text" name="comment">
        <button type="submit" name="komen">Submit</button>
    </form>

    <!-- show comment -->
    <?php foreach($comment as $c): ?>
        <h3><?= $c["username"]; ?></h3>
        <p><?= $c["komentar"]; ?></p>
    <?php endforeach; ?>
</body>
</html>