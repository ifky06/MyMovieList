<?php
require '../../backend/film.php';
require '../../backend/connection.php';

// menggunakan method GET untuk mengambil id yg telah terseleksi oleh user dan dimasukkan
// ke dalam variabel $id
$id=$_GET["id"];

if(delete($id)>0){
    echo "
        <script>
            alert('data berhasil dihapus');
            document.location.href='movie.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href='movie.php';
        </script>
    ";
    echo "<br>";
    echo mysqli_error($conn);
}
?>