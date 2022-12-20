<?php
require '../backend/film.php';
require '../backend/auth.php';
require '../backend/connection.php';
$film = get10();
$top= getTopMovie(8);
$popular = getPopular(5);
$lastest = getLastest(5);

require 'View/header.php';
?>
      <div class="row">
        <div class="col-md-8">
          <h3 class="text-center text-dark fw-bold my-4">The best place to find your favorite movies</h3>

          <p class="fw-bold text-dark line-sm pb-1">Top Movie</p>

          <div class="swiper swiper-one">
            <div class="swiper-wrapper text-light">
                <?php foreach($top as $row) : ?>
              <a href="detail.php?id=<?=$row["id"]?>" class="swiper-slide text-decoration-none text-light" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url(img/<?=$row["cover"]?>); background-size: cover; background-position: center">
                <div class="fs-6 pb-4"><?=$row["judul"]?></div>
              </a>
                <?php endforeach; ?>
            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev" style="color: #f8f9fa"></div>
            <div class="swiper-button-next" style="color: #f8f9fa"></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
          </div>

          <p class="fw-bold text-dark line-sm pb-1 mt-4">Movie</p>
          <div class="swiper swiper-two">
            <div class="swiper-wrapper text-light">
                <?php foreach($film as $row) : ?>
              <a href="detail.php?id=<?=$row["id"]?>" class="swiper-slide text-decoration-none text-light" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8)), url(img/<?=$row["cover"]?>); background-size: cover; background-position: center">
                <div class="pb-2" style="font-size: 12px"><?=$row["judul"]?></div>
              </a>
                <?php endforeach; ?>
            </div>
            <!-- If we need pagination -->
            <!-- <div class="swiper-pagination"></div> -->

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev" style="color: #f8f9fa"></div>
            <div class="swiper-button-next" style="color: #f8f9fa"></div>

            <!-- If we need scrollbar -->
            <!-- <div class="swiper-scrollbar"></div> -->
          </div>

        </div>




        <div class="col-md-4">
          <ul class="list-group rounded-0 pt-3">
            <li class="list-group-item bg-secondary text-light fw-bold">Most Popular Movie</li>
            <?php $i=1; ?>
            <?php foreach($popular as $row) : ?>
            <li class="list-group-item">
              <a href="detail.php?id=<?=$row["id"]?>" class="text-decoration-none text-dark d-flex g-0">
                <div class="col-1 text-center pt-3"><?=$i?></div>
                <div class="col-2">
                  <img src="img/<?=$row["cover"]?>" alt="" width="50px" class="img-fluid" />
                </div>
                <div class="col-9 pt-3"><?=$row["judul"]?></div>
              </a>
            </li>
            <?php $i++; ?>
            <?php endforeach; ?>
          </ul>

          <ul class="list-group rounded-0 mt-4">
            <li class="list-group-item bg-secondary text-light fw-bold">Latest Movie</li>
            <?php $i=1; ?>
            <?php foreach($lastest as $row) : ?>
            <li class="list-group-item">
              <a href="detail.php?id=<?=$row["id"]?>" class="text-decoration-none text-dark d-flex g-0">
                <div class="col-1 text-center pt-3"><?=$i?></div>
                <div class="col-2">
                  <img src="img/<?=$row["cover"]?>" alt="" width="50px" class="img-fluid" />
                </div>
                <div class="col-9 pt-3"><?=$row["judul"]?></div>
              </a>
            </li>
            <?php $i++; ?>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

<?php
require 'View/footer.php';
?>
