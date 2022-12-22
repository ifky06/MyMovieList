<?php
require '../backend/film.php';
require '../backend/connection.php';
require 'View/header.php';

$top= getTopMovie(20);

?>

<p class="fw-bold fs-5 text-dark line pb-1">Top Movie List</p>
      <table class="table">
        <thead class="text-light bg-primary">
          <tr>
            <th scope="col" style="width: 7%">Rank</th>
            <th scope="col">Title</th>
            <th scope="col" class="text-center">Score</th>
          </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($top as $row) : ?>
          <tr>
            <th scope="row" class="align-middle text-center pt-4">
              <p class="fs-2"><?= $i ?></p>
            </th>
            <td class="align-middle">
              <div class="row">
                <div class="col-md-2">
                  <img src="img/<?=$row["cover"]?>" width="75px" alt="" class="img-fluid" />
                </div>
                <div class="col-md-10 fs-5 pt-4">
                  <a href="detail.php?id=<?=$row["id"]?>" class="text-decoration-none text-dark"><?=$row["judul"]?></a>
                </div>
              </div>
            </td>
            <td class="align-middle text-center fw-bold fs-3"><?= number_format($row["rating"],1) ; ?></td>
          </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
      </table>

<?php
require 'View/footer.php';
?>