<?php
require 'connection.php';

// get all user
function getAll()
{
    global $conn;

    $query = "SELECT * FROM user
    ORDER BY level";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// search user
function search($keyword)
{
    global $conn;

    $query = "SELECT * FROM user
    WHERE username LIKE '%$keyword%'
    ORDER BY level";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// make user admin
function makeAdmin($data)
{
    global $conn;

    $username = $data["username"];
    $password = $data["password"];
    $confirmPassword = $data["confirmPassword"];
    $role = 0;
    
    // check password sama atau tidak
    if($password != $confirmPassword){
        echo "
            <script>
                alert('password tidak sama');
                document.location.href='user.php';
            </script>
        ";
        return false;
    }

    // check username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('username sudah terdaftar');
                document.location.href='user.php';
            </script>
        ";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO user VALUES ('','$username','$password','$role')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// delete user
function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM komentar WHERE id_user = $id");
    mysqli_query($conn, "DELETE FROM rating WHERE id_user = $id");
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}

?>