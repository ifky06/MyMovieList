<?php
require '../../backend/film.php';
require '../../backend/connection.php';

$keyword=$_GET["keyword"];
$film = searchUser($keyword);

if (
    !$keyword == ""
) {
foreach($film as $row) : ?>
    <li class="d-flex py-1">
        <img src="img/<?=$row["cover"]?>" alt="" width="50px" class="img-fluid">
        <a class="dropdown-item pt-3" href="detail.php?id=<?=$row["id"]?>"><?= $row["judul"]?></a>
    </li>
<?php endforeach;

}
?>

