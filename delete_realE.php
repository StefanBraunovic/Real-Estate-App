<?php


include 'db.php';


isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Id error");

$slq_fotke = "DELETE FROM fotografije WHERE nekretnina_id=$id";
$res2 = mysqli_query($dbconn, $slq_fotke);


$slq = "DELETE FROM nekretnina WHERE id=$id";

$res = mysqli_query($dbconn, $slq);



if ($res) {
    header("location: index.php?msg=contact_deleted");
} else {
    header("location: index.php?msg=not_deleted");
}
