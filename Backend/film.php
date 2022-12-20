<?php
require 'connection.php';

// get all movies
function getAll()
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
     FROM film f
     LEFT JOIN rating r ON f.id = r.id_film
     GROUP BY f.id";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// get 5 popular movies
function getPopular($count)
{
    global $conn;

    $query = "SELECT f.* , IFNULL(count(r.rating),0) AS jumlah_rating
     FROM film f
     LEFT JOIN rating r ON f.id = r.id_film
     GROUP BY f.id
     ORDER BY jumlah_rating DESC
     LIMIT $count";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function get10()
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
     FROM film f
     LEFT JOIN rating r ON f.id = r.id_film
     GROUP BY f.id
     LIMIT 10";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function getTopMovie($count)
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
     FROM film f
     LEFT JOIN rating r ON f.id = r.id_film
     GROUP BY f.id
     ORDER BY rating DESC LIMIT $count";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// get latest movies
function getLastest($count)
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
     FROM film f
     LEFT JOIN rating r ON f.id = r.id_film
     GROUP BY f.id
     ORDER BY tanggal_rilis DESC
     LIMIT $count";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// get film by id
function getById($id)
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
    FROM film f
    LEFT JOIN rating r ON f.id = r.id_film
    WHERE f.id = $id
    GROUP BY f.id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// get count user film by id
function getCountUserFilm($id)
{
    global $conn;

    $query = "SELECT COUNT(*) AS jumlah_user
    FROM rating
    WHERE id_film = $id";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

// search film
function search($keyword)
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
                FROM film f
                LEFT JOIN rating r ON f.id = r.id_film
                WHERE
                judul LIKE '%$keyword%' OR
                sutradara LIKE '%$keyword%' OR
                genre LIKE '%$keyword%' OR
                karakter LIKE '%$keyword%' OR
                pemeran LIKE '%$keyword%'
                GROUP BY f.id";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

// search film user
function searchUser($keyword)
{
    global $conn;

    $query = "SELECT f.* , IFNULL(AVG(r.rating),0) AS rating
                FROM film f
                LEFT JOIN rating r ON f.id = r.id_film
                WHERE
                judul LIKE '%$keyword%'
                GROUP BY f.id
                LIMIT 5";
    $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
}

// add film
function add($data)
{
    global $conn;

    $judul = htmlspecialchars($data["judul"]);
    $sinopsis = htmlspecialchars($data["sinopsis"]);
    $tanggal_rilis = htmlspecialchars($data["rilis"]);
    $sutradara = htmlspecialchars($data["sutradara"]);
    $karakter = htmlspecialchars($data["karakter"]);
    $pemeran = htmlspecialchars($data["pemeran"]);
    $genre = htmlspecialchars($data["genre"]);
    $trailer = htmlspecialchars($data["trailer"]);
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO film VALUES
                ('', '$judul', '$sinopsis', '$tanggal_rilis', '$sutradara', '$karakter', '$pemeran', '$genre', '$trailer', '$gambar')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// upload gambar
function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4){
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script>
                alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if($ukuranFile > 1000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
    return $namaFileBaru;
}

// delete image from folder
function deleteImage($id)
{
    $film = getById($id);
    // if($film["cover"] != "default.jpg"){
    //     unlink('../img/' . $film["cover"]);
    // }
    unlink('../img/' . $film["cover"]);
}

// update film
function update($data)
{
    global $conn;

    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $sinopsis = htmlspecialchars($data["sinopsis"]);
    $tanggal_rilis = htmlspecialchars($data["rilis"]);
    $sutradara = htmlspecialchars($data["sutradara"]);
    $karakter = htmlspecialchars($data["karakter"]);
    $pemeran = htmlspecialchars($data["pemeran"]);
    $genre = htmlspecialchars($data["genre"]);
    $trailer = htmlspecialchars($data["trailer"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        deleteImage($id);
        $gambar = upload();
    }

    $query = "UPDATE film SET
                judul = '$judul',
                sinopsis = '$sinopsis',
                tanggal_rilis = '$tanggal_rilis',
                sutradara = '$sutradara',
                karakter = '$karakter',
                pemeran = '$pemeran',
                genre = '$genre',
                trailer = '$trailer',
                cover = '$gambar'
            WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// delete film
function delete($id)
{
    global $conn;
    deleteImage($id);
    mysqli_query($conn, "DELETE FROM rating WHERE id_film = $id");
    mysqli_query($conn, "DELETE FROM komentar WHERE id_film = $id");
    mysqli_query($conn, "DELETE FROM film WHERE id = $id");
    return mysqli_affected_rows($conn);
}

// count film in database
function countFilm()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) AS jumlah FROM film");
    $row = mysqli_fetch_assoc($result);
    return $row["jumlah"];
}

?>