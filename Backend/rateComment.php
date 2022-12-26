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
    global $conn;

    $id_film = $id;
    $id_user = $id_user;
    $comment = $data["comment"];
    $date = date("Y-m-d");

    $query = "INSERT INTO komentar VALUES ('', '$id_film', '$id_user', '$comment', '$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function showComment($id){
    global $conn;

    $query = "SELECT k.id, k.komentar, u.username, k.tanggal_komentar FROM komentar k
    JOIN user u ON k.id_user = u.id
     WHERE id_film = $id";
    $result = mysqli_query($conn, $query);

    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;
}

// delete comment
function deleteComment($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM komentar WHERE id = $id");
    return mysqli_affected_rows($conn);
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