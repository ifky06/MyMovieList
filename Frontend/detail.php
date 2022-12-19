<?php
require '../backend/film.php';
require '../backend/rateComment.php';
require '../backend/connection.php';

session_start();

$id=$_GET["id"];
$film=getById($id);
$count = getCountUserFilm($id);
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

require 'View/header.php';
?>

<p class="fw-bold fs-5 text-dark line pb-1"><?= $film["judul"]; ?></p>
      <div class="row">
        <div class="col-md-4">
          <img src="img/<?= $film["cover"]; ?>" alt="" class="img-fluid text-start" />
          <p class="fw-bold text-dark line-sm mt-5">Score</p>

          <div class="container">
            <p class="fw-bold text-center g-0" style="font-size: 150px; margin-bottom: 0; padding-bottom: 0"><?= number_format($film["rating"],1) ; ?></p>
            <p class="fw-bold text-center fs-3 p-0" style="margin-top: 0; padding-top: 0"><?= $count["jumlah_user"]; ?> user</p>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-outline-primary fw-bold rounded-0" data-bs-toggle="modal" data-bs-target="#rate">Rate</button>
          </div>

          <div class="modal fade" id="rate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Rate This Movie</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $film["id"]; ?>">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio3" value="3">
                            <label class="form-check-label" for="inlineRadio2">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio4" value="4">
                            <label class="form-check-label" for="inlineRadio2">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="rating" id="inlineRadio5" value="5">
                            <label class="form-check-label" for="inlineRadio2">5</label>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" type="button" class="btn btn-primary rounded-0">Rate</button>
                </form>
                </div>
                </div>
            </div>
        </div>

        </div>
        <div class="col-md-8">
          <iframe
            width="100%"
            height="356"
            src="<?= $film["trailer"]; ?>"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>

          <p class="fw-bold text-dark line-sm pb-1 mt-4">Movie Info</p>
          <!-- div movie info -->
          <p>
          <?= $film["sinopsis"]; ?>
          </p>
          <div class="row">
            <div class="col-md-3">
              <p class="text-end text-dark line-sm pb-1">Release Date :</p>
            </div>
            <div class="col-md-9">
              <p class="text-dark"><?= $film["tanggal_rilis"]; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p class="text-end text-dark line-sm pb-1">Genre :</p>
            </div>
            <div class="col-md-9">
              <p class="text-dark"><?= $film["genre"]; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p class="text-end text-dark line-sm pb-1">Director :</p>
            </div>
            <div class="col-md-9">
              <p class="text-dark"><?= $film["sutradara"]; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p class="text-end text-dark line-sm pb-1">Character :</p>
            </div>
            <div class="col-md-9">
              <p class="text-dark"><?= $film["karakter"]; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <p class="text-end text-dark line-sm pb-1">Cast :</p>
            </div>
            <div class="col-md-9">
              <p class="text-dark"><?= $film["pemeran"]; ?></li></p>
            </div>
          </div>

          <!-- comment form -->
          <p class="fw-bold text-dark line-sm pb-1 mt-4">Comment</p>
          <form class="d-flex">
            <div class="input-group input-group-sm me-2 d-flex">
            <input type="hidden" name="id" value="<?= $film["id"]; ?>">
              <input name="comment" class="form-control rounded-0" type="search" placeholder="Comment Here" aria-label="Comment" />
              <button name="komen" class="btn btn-primary fw-bold rounded-0" type="submit">Comment</button>
            </div>
          </form>

          <!-- comment -->
          <?php foreach($comment as $c): ?>
            <div class="mt-4">
                <p class="text-dark fw-bold mb-0"><?= $c["username"]; ?></p>
                <p class="text-dark line-sm pb-2">
                    <?= $c["komentar"]; ?>
                </p>
            </div>
            <?php endforeach; ?>
        </div>
      </div>
<?php require "View/footer.php"; ?>
