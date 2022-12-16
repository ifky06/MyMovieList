<?php
require '../../backend/film.php';
require '../../backend/connection.php';

$id=$_GET["id"];
$film=getById($id);

if(isset ($_POST['submit'])){
    $_POST["id"] = $_GET["id"];
    if(update($_POST)>0){
        echo"
    <script>
        document.location.href='index.php';
    </script>
    ";
    }else{
    echo"
    <script>
    alert('data gagal ditambahkan');
        document.location.href='index.php';
    </script>";
    echo "<br>";
    echo mysqli_error($conn);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <!-- membuat form tambah film dengan bootstrap -->
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1 class="mt-3">Edit Data Film</h1>
                <form method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $film['id'];?>">
                    <input type="hidden" name="gambarLama" value="<?= $film['cover'];?>">

                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $film['judul'];?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="sinopsis" class="form-label">Sinopsis</label>
                        <textarea name="sinopsis" id="sinopsis" class="form-control"><?= $film['sinopsis'];?></textarea>
                    </div>
                    <!-- tanggal rilis -->
                    <div class="mb-3">
                        <label for="rilis" class="form-label">Tanggal Rilis</label>
                        <!-- text area -->
                        <input type="date" class="form-control" id="rilis" name="rilis" value="<?= $film['tanggal_rilis'];?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="sutradara" class="form-label">Sutradara</label>
                        <input type="text" class="form-control" id="sutradara" name="sutradara" value="<?= $film['sutradara'];?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="karakter" class="form-label">Karakter</label>
                        <textarea name="karakter" id="karakter" class="form-control"><?= $film['karakter'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="pemeran" class="form-label">Pemeran</label>
                        <textarea name="pemeran" id="pemeran" class="form-control"><?= $film['pemeran'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <textarea name="genre" id="genre" class="form-control"><?= $film['genre'];?></textarea>
                    </div>
                    <!-- trailer -->
                    <div class="mb-3">
                        <label for="trailer" class="form-label">Trailer</label>
                        <textarea name="trailer" id="trailer" class="form-control"><?= $film['trailer'];?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <img src="../img/<?= $film['cover'];?>" alt="<?= $film['cover'];?>" srcset="" width="100px">
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>