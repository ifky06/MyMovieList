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
                <a href="" class="btn btn-success btn-sm" onclick="showModalMovie(<?=$row['id']?>)" data-bs-toggle="modal" data-bs-target="#detailMovie"><i class="fa-solid fa-circle-info"></i></a>
            </td>
        </tr>
        
        
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
    <div class="modal fade" id="detailMovie" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content" id="modalMovie">
            </div>
        </div>
    </div>
</div>
<?php
 require 'view/footer.php';
 ?>
