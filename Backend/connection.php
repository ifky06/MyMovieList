<?php
// membuat koneksi
$conn=mysqli_connect("localhost","root","","db_rating");
// cek koneksi jika error
if(!$conn){
    die("Koneksi Error : ".mysqli_connect_errno()." - " .mysqli_connect_error());
}
?>