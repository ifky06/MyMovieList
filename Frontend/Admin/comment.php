<?php
require '../../backend/rateComment.php';
require '../../backend/film.php';
require 'view/header.php';

$id=$_GET["id"];
$film=getById($id);
$comment = showComment($id);

if(isset($_POST["hapus"])){
    if(deleteComment($_POST["id"]) > 0){
        echo "
            <script>
                alert('comment berhasil dihapus');
                document.location.href='comment.php?id= $id ';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('comment gagal dihapus');
                document.location.href='comment.php?id= $id ';
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
        <h3 class="fw-bold"><i class="fa-solid fa-comment"></i> List Comment <?= $film["judul"]?></h3>
    </div>
    <div class="col-sm-2 d-flex-inline"></div>
</div>
<div class="row mt-4">
    <div class="col-12">
            <?php foreach($comment as $c): ?>
            <div class="row line-sm">
                <div class="mt-4 col-11">
                    <p class="text-dark fw-bold mb-0"><?= $c["username"]; ?></p>
                    <p class="text-dark  pb-2">
                        <?= $c["komentar"]; ?>
                    </p>
                </div>
                <div class="col-1 d-flex  align-items-center">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $c["id"]; ?>">
                        <button type="submit" name="hapus" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
    </div>
</div>

<?php
require 'view/footer.php';
?>

