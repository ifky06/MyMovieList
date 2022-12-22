<?php
require '../../backend/film.php';
require 'view/header.php';

// cek apakah button submit sudah ditekan atau belum
if(isset($_POST["submit"])){
    // cek apakah data berhasil ditambahkan atau tidak
    if(add($_POST)>0){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href='movie.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href='movie.php';
            </script>
        ";
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
        <h3 class="fw-bold"><i class="fa-solid fa-film me-2"></i></i>Insert Movie</h3>
    </div>
    <div class="col-sm-2 d-flex-inline"></div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" class="form-control"></textarea>
            </div>
            <!-- tanggal rilis -->
            <div class="mb-3">
                <label for="rilis" class="form-label">Tanggal Rilis</label>
                <!-- text area -->
                <input type="date" class="form-control" id="rilis" name="rilis" required>
            </div>
            <div class="mb-3">
                <label for="sutradara" class="form-label">Sutradara</label>
                <input type="text" class="form-control" id="sutradara" name="sutradara" required>
            </div>
            <div class="mb-3">
                <label for="karakter" class="form-label">Karakter</label>
                <textarea name="karakter" id="karakter" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="pemeran" class="form-label">Pemeran</label>
                <textarea name="pemeran" id="pemeran" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <textarea name="genre" id="genre" class="form-control"></textarea>
            </div>
            <!-- trailer -->
            <div class="mb-3">
                <label for="trailer" class="form-label">Trailer</label>
                <textarea name="trailer" id="trailer" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar</label>
                <input type="file" class="form-control" id="gambar" name="gambar" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
</div>

<?php
require 'view/footer.php';
?>
