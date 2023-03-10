<?php
require 'connection.php';

function login($data){

    global $conn;

    $username = $data["username"];
    $password = $data["password"];
    

    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row < 1){
        echo "
        <script>
            alert('username salah');
            document.location.href='index.php';
        </script>
        ";
        return false;
    }

    if(!password_verify($password, $row["password"])){
        echo "
        <script>
            alert('password salah');
            document.location.href='index.php';
        </script>
    ";
        return false;
    }
        $_SESSION["user"]=[
            "login" => true,
            "id" => $row["id"],
            "username" => $row["username"],
            "level" => $row["level"]
        ];
        if($row["level"] == "0"){
            header("Location: Admin/index.php");
        }else{
            header("Location: index.php");
        }

}

function sessionCheckAdmin(){
    session_start();
    if($_SESSION["user"]["level"] != "0"){
        header("Location: ../index.php");
        exit;
    }
}

function register($data){
    global $conn;

    $username = $data["username"];
    $password = $data["password"];
    $confirmPassword = $data["confirmPassword"];
    $role = 1;
    
    // check password sama atau tidak
    if($password != $confirmPassword){
        echo "
            <script>
                alert('password tidak sama');
                document.location.href='index.php';
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
                document.location.href='index.php';
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

function logout(){
    session_start();
    session_destroy();
    header("Location: index.php");
}
?>