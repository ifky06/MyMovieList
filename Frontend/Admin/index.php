<?php
require '../../backend/film.php';
require 'view/header.php';
require 'view/sidebar.php';
?>
<div class="row g-0 line-h3">
    <div class="col-sm-10">
        <h3 class="fw-bold"><i class="fa-solid fa-gauge me-2"></i>DASHBOARD</h3>
    </div>
    <div class="col-sm-2 d-flex-inline"></div>
</div>
<div class="row text-white mt-4">
    <div class="col-sm-6">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa-solid fa-film"></i>
                </div>
                <h5 class="card-title">Movie Count</h5>
                <div class="display-4 fw-bold"><?= countFilm() ?></div>
                <a href="movie.php" class="text-decoration-none"
                ><p class="card-text text-white">
                        Show Detail
                        <i class="fas fa-angle-double-right m-2"></i></p
                    ></a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card bg-dark">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fa-solid fa-user"></i>
                </div>
                <h5 class="card-title">User Count</h5>
                <div class="display-4 fw-bold">10000</div>
                <a href="user.php" class="text-decoration-none"
                ><p class="card-text text-white">
                        Show Detail
                        <i class="fas fa-angle-double-right m-2"></i></p
                    ></a>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'view/footer.php';
?>