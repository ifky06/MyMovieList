<?php
require '../../backend/film.php';
require 'view/header.php';

$id=$_GET["id"];
$film=getById($id);

if(isset ($_POST['submit'])){
    $_POST["id"] = $_GET["id"];
    if(update($_POST)>0){
        echo"
    <script>
        document.location.href='movie.php';
    </script>
    ";
    }else{
    echo"
    <script>
    alert('data gagal ditambahkan');
        document.location.href='movie.php';
    </script>";
    echo "<br>";
    echo mysqli_error($conn);
    }
}


require 'view/sidebar.php';
?>

<div class="row g-0 line-h3">
    <div class="col-sm-1">
        <a href="movie.php" class="btn btn-primary fw-bold"><-</a>
    </div>
    <div class="col-sm-10">
        <h3 class="fw-bold"><i class="fa-solid fa-film me-2"></i></i>Edit Movie</h3>
    </div>
    <div class="col-sm-2 d-flex-inline"></div>
</div>
<div class="row mt-4">
    <div class="col-12">
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
            <div class="mb-3">
                <label for="rating" class="form-label">Rating Usia</label>
                <input type="text" class="form-control" id="rating" name="ratingUsia" value="<?= $film['rating_usia'];?>" required>
            </div>
            <div class="mb-3">
                <label for="durasi" class="form-label">Durasi (Menit)</label>
                <input type="text" class="form-control" id="durasi" name="durasi" value="<?= $film['durasi'];?>" required>
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

<?php
require 'view/footer.php';
?>
