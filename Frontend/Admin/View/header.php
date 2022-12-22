<?php
require '../../Backend/auth.php';
require '../../Backend/connection.php';

sessionCheckAdmin();
// logout if button logout is clicked



if(isset($_POST["logout"])){
    logout();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="view/style.css" />
    <!-- bootstrap css -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/2333fa2981.js" crossorigin="anonymous"></script>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">WELCOME ADMIN | <b>MyMovieList</b></a>
        <div class="ml-auto d-flex">
            <div class="me-3">
                <form class="d-flex" method="post" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword" />
                    <button class="btn btn-outline-light" type="submit" name="cari">Search</button>
                </form>
            </div>
            <div class="icon">
                <form action="" method="post">
                    <button type="submit" name="logout" class="btn btn-outline-light">
                        <i class="fa-solid fa-sign-out-alt"></i>
                    </button>
                </form>
<!--                <h5 class="text-white">-->
<!--                    <i class="fa-solid fa-right-from-bracket"></i>-->
<!--                </h5>-->
            </div>
        </div>
    </div>
</nav>
