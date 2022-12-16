<?php
require '../../backend/auth.php';
require '../../backend/connection.php';

if(isset($_POST["submit"])){
    // cek apakah data berhasil ditambahkan atau tidak
    if(register($_POST)>0){
        echo "
            <script>
                alert('Register berhasil');
                document.location.href='login.php';
            </script>
        ";
    }else{
        echo "
            <script>
                alert('Register gagal');
                document.location.href='login.php';
            </script>
        ";
        echo "<br>";
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
