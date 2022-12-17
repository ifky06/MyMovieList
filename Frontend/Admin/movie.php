<?php
require '../../backend/film.php';
require '../../backend/connection.php';
$film = getAll();

// tombol cari ditekan
if(isset($_POST["cari"])){
    $film = search($_POST["keyword"]);
}

require 'view/header.php';
require 'view/sidebar.php';
?>
<div class="row g-0 line-h3">
    <div class="col-sm-10">
        <h3 class="fw-bold"><i class="fa-solid fa-film me-2"></i></i>Movie List</h3>
    </div>
    <div class="col-sm-2 d-flex-inline">
        <div class="text-end">
            <a class="btn btn-primary" href="insert_film.php"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
</div>
<div class="mt-4">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Tanggal Rilis</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach($film as $row) : ?>
        <tr>
            <th scope="row"><?= $i ?></th>
            <td class="align-middle"><?= $row["judul"]; ?></td>
            <td class="align-middle"><?= $row["tanggal_rilis"]; ?></td>
            <td class="text-center">
                <a href="" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $row["id"]?>"><i class="fa-solid fa-circle-info"></i></a>
            </td>
        </tr>
            <div class="modal fade" id="exampleModal<?= $row["id"]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $row["judul"]; ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="../img/<?= $row["cover"]; ?>" alt="" class="img-fluid">
                                </div>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Judul</p>
                                            <p><?= $row["judul"]; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Tanggal Rilis</p>
                                            <p><?= $row["tanggal_rilis"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Genre</p>
                                            <p><?= $row["genre"]; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Karakter</p>
                                            <p><?= $row["karakter"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Sutradara</p>
                                            <p><?= $row["sutradara"]; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Pemeran</p>
                                            <p><?= $row["pemeran"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Sinopsis</p>
                                            <p><?= $row["sinopsis"]; ?></p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="fw-bold">Trailer</p>
                                            <p><?= $row["trailer"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-danger" href="hapus.php?id=<?= $row["id"] ?> ">Delete</a>
                            <a class="btn btn-warning" href="edit.php?id=<?= $row["id"] ?> ">Edit</a>
                        </div>
                    </div>
                </div>
            </div>


            <?php $i++; ?>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
 require 'view/footer.php';
 ?>
