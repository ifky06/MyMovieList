<?php
require '../../backend/user.php';
require 'view/header.php';

$user = getAll();

// tombol hapus ditekan
if(isset($_POST["hapus"])){
    if(delete($_POST["id"]) > 0){
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href='user.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href='user.php';
            </script>
        ";
        echo "<br>";
        echo mysqli_error($conn);
    }
}

// tombol cari ditekan
if(isset($_POST["cari"])){
    $user = search($_POST["keyword"]);
}


require 'view/sidebar.php';
?>
<div class="row g-0 line-h3">
    <div class="col-sm-10">
        <h3 class="fw-bold"><i class="fa-solid fa-user me-2"></i>User List</h3>
    </div>
    <div class="col-sm-2 d-flex-inline">
        <div class="text-end">
            <a class="btn btn-primary" href="insert_admin.php"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
</div>
<div class="mt-4">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" width="5%">No</th>
            <th scope="col">Username</th>
            <th scope="col" class="" width="10%">Level</th>
            <th scope="col" width="10%">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach($user as $row) : ?>
        <tr>
            <th scope="row"><?= $i ?></th>
            <td class="align-middle"><?= $row["username"]; ?></td>
            <td class="align-middle text-center">
                <?php if($row["level"] == 0) : ?>
                    <span class="badge bg-success">Admin</span>
                <?php else : ?>
                    <span class="badge bg-primary">User</span>
                <?php endif; ?>
            </td>
            <td class="text-center">
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                    <button type="submit" name="hapus" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
        
        
        <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
    </table>
</div>
<?php
 require 'view/footer.php';
 ?>
