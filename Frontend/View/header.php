<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="stylesheet" href="View/style.css" />
    <!-- bootstrap css -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" /> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body style="background-color: #3b3fa7">
    <nav class="navbar navbar-expand-lg navbar-dark bg-light">
      <div class="container">
        <a class="navbar-brand fs-3 text-primary" href="#"><b>MyMovieList</b></a>
        <div class="ml-auto d-flex">
          <a href="#" class="btn btn-outline-primary btn-sm fw-bold me-3 rounded-0">Login</a>
          <a href="#" class="btn btn-primary btn-sm fw-bold rounded-0">Sign Up</a>
        </div>
      </div>
    </nav>

    <div class="container mt-5 bg-primary g-0">
      <div class="row">
        <div class="col-8 d-flex" style="height: auto">
          <a href="" class="h-100 text-decoration-none py-2 px-3 nav-con">Movie</a>
          <a href="" class="h-100 text-decoration-none py-2 px-3 nav-con">Top Movie</a>
          <a href="" class="h-100 text-decoration-none py-2 px-3 nav-con">Popular Movie</a>
        </div>
        <div class="col-4 d-flex">
          <div class="mr-auto p-1">
            <form class="d-flex">
              <div class="input-group-sm me-2">
                <input class="form-control rounded-0" type="search" placeholder="Search" aria-label="Search" />
              </div>
              <div class="input-group-sm">
                <button class="btn btn-outline-light fw-bold rounded-0" type="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container bg-light pt-2 pb-4">