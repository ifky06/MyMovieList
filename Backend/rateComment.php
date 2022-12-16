<?php
require 'connection.php';

function rate($data , $id){
    global $conn;

    $id_film = $id;
    $id_user = $_SESSION["user"]["id"];
    $rating = $data["rating"];

    $query = "INSERT INTO rating VALUES ('', '$id_film', '$id_user', '$rating')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function comment($data,$id){
    global $conn;

    $id_film = $id;
    $id_user = $_SESSION["user"]["id"];
    $comment = $data["comment"];

    $query = "INSERT INTO komentar VALUES ('', '$id_film', '$id_user', '$comment')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function showComment($id){
    global $conn;

    $query = "SELECT k.komentar, u.username  FROM komentar k
    JOIN user u ON k.id_user = u.id
     WHERE id_film = $id";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}
?>