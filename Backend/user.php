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

// make user admin
function makeAdmin($id)
{
    global $conn;

    $username = $data["username"];
    $password = md5($data["password"]);
    $role = 0;

    $query = "INSERT INTO user VALUES
    ('', '$username', '$password', '$role')";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// delete user
function delete($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM rating WHERE id_user = $id");
    mysqli_query($conn, "DELETE FROM user WHERE id = $id");
    return mysqli_affected_rows($conn);
}
?>