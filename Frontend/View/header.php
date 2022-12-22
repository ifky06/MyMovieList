<?php
require_once '../backend/auth.php';

session_start();

if(isset($_POST["login"])){
  login($_POST);
}

if(isset($_POST["register"])){
  if (register($_POST) > 0) {
    echo "
      <script>
        alert('user baru berhasil ditambahkan');
        document.location.href='index.php';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('user baru gagal ditambahkan');
        document.location.href='index.php';
      </script>
    ";
  }
}

// tombol logout ditekan
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
        <div class="ml-auto d-flex" id="auth">
          <!-- <a href="#" class="btn btn-outline-primary btn-sm fw-bold me-3 rounded-0">Login</a>
          <a href="#" class="btn btn-primary btn-sm fw-bold rounded-0">Sign Up</a> -->
        </div>
      </div>
    </nav>

    <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- add username and password input -->
            <form action="" method="post" id="authForm">
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control rounded-0" id="username" name="username" placeholder="Username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control rounded-0" id="password" name="password" placeholder="Password" required>
              </div>
              <div class="mb-3 register" id="registerLink">
              Don't have an account? Sign Up Here
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="login" class="btn btn-primary rounded-0">Login</button>
          </div>
          </form>
        </div>
      </div>
    </div>


    <div class="container mt-5 bg-primary g-0">
      <div class="row">
        <div class="col-8 d-flex" style="height: auto">
          <a href="index.php" class="h-100 text-decoration-none py-2 px-3 nav-con">Home</a>
          <a href="toplist.php" class="h-100 text-decoration-none py-2 px-3 nav-con">Top Movie</a>
          <a href="popularlist.php" class="h-100 text-decoration-none py-2 px-3 nav-con">Popular Movie</a>
          <a href="lastestlist.php" class="h-100 text-decoration-none py-2 px-3 nav-con">Latest Movie</a>
        </div>
        <div class="col-4 g-0">
          <div class="mr-auto py-1 pe-3 ps-2">
              <div class="input-group-sm">
                <input class="form-control rounded-0" id="keyword" type="search" placeholder="Search Movie" aria-label="Search" data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off"/>
                  <ul class="dropdown-menu rounded-0" id="result" style="width: 363px">
                  </ul>
              </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let login = <?php echo isset($_SESSION["user"]["login"]) ? "true" : "false" ?>;
      let username = "<?php echo isset($_SESSION["user"]["username"]) ? $_SESSION["user"]["username"] : "" ?>";

      if(login){
        $("#auth").append(`
        <div class="dropdown pt-3">
          <p class="fw-bold" data-bs-toggle="dropdown" aria-expanded="false">Hello, ${username}</p>
          <div class="dropdown-menu rounded-0">
            <form action="" method="post">
              <button type="submit" name="logout" class="text-center fw-bold rounded-0 dropdown-item text-danger">Logout</button>
            </form>
          </div>
        </div>
        `);
      }else{
        $("#auth").append(`
          <a href="login.php" id="login" class="btn btn-outline-primary btn-sm fw-bold me-3 rounded-0"data-bs-toggle="modal" data-bs-target="#authModal">Login</a>
          <a href="register.php" id="" class="btn btn-primary btn-sm fw-bold rounded-0 register" data-bs-toggle="modal" data-bs-target="#authModal">Sign Up</a>
        `);
      }

    </script>

    <div class="container bg-light pt-2 pb-4">