<?php
require '../../../backend/film.php';
require '../../../backend/connection.php';

$id = $_GET["id"];
$row = getById($id);

?>
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
                            <a class="btn btn-primary" href="comment.php?id=<?= $row["id"] ?> ">comment</a>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                            <button type="submit" name="hapus" class="btn btn-danger">Delete</button>
                        </form>
                            <a class="btn btn-warning" href="edit.php?id=<?= $row["id"] ?> ">Edit</a>
                        </div>