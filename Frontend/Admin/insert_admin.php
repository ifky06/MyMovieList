<?php
require '../../backend/user.php';
require 'view/header.php';

if(isset($_POST["submit"])){
    // cek apakah data berhasil ditambahkan atau tidak
    if(makeAdmin($_POST)>0){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href='user.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href='user.php';
            </script>
        ";
        echo "<br>";
        echo mysqli_error($conn);
    }
}

require 'view/sidebar.php';
?>

<div class="row g-0 line-h3">
    <div class="col-sm-1">
        <a href="user.php" class="btn btn-primary fw-bold"><-</a>
    </div>
    <div class="col-sm-10">
        <h3 class="fw-bold"><i class="fa-solid fa-user me-2"></i></i>Insert User Admin</h3>
    </div>
    <div class="col-sm-2 d-flex-inline"></div>
</div>
<div class="row mt-4">
    <div class="col-12">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="judul" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambah Admin</button>
        </form>
    </div>
</div>

<?php
require 'view/footer.php';
?>

