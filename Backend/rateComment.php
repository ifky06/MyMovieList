<?php
require 'connection.php';

function rate($data , $id , $id_user){
    global $conn;

    $id_film = $id;
    $id_user = $id_user;
    $rating = $data["rating"];

    $query = "INSERT INTO rating VALUES ('', '$id_film', '$id_user', '$rating')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function comment($data,$id, $id_user){
    session_start();
    global $conn;

    $id_film = $id;
    $id_user = $id_user;
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

// check if user already rate the movie
function checkRate($id_film, $id_user){
    global $conn;

    $query = "SELECT * FROM rating WHERE id_film = $id_film AND id_user = $id_user";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        return 1;
    }else{
        return 0;
    }
}
?>