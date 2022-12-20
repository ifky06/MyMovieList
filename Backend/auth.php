<?php
require 'connection.php';

function login($data){
    session_start();

    global $conn;

    $username = $data["username"];
    $password = md5($data["password"]);

    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if($row){
        $_SESSION["user"]=[
            "login" => true,
            "id" => $row["id"],
            "username" => $row["username"],
            "password" => $row["password"],
            "level" => $row["level"]
        ];
        if($row["level"] == "0"){
            header("Location: ../admin/movie.php");
        }else{
            header("Location: index.php");
        }
    }else{
        echo "
            <script>
                alert('username atau password salah');
                document.location.href='index.php';
            </script>
        ";
    }
}

function sessionCheckAdmin(){
    session_start();
    if($_SESSION["user"]["level"] != "0"){
        header("Location: index.php");
        exit;
    }
}

function sessionCheckUser(){
    session_start();
    if($_SESSION["user"]["level"] != "1"){
        header("Location: index.php");
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
    $password = md5($password);

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