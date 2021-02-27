<?php


include 'db.php';


// var_dump($_POST);
// exit;

isset($_POST['tip']) ? $id = $_POST['tip'] : exit("Id error");

$slq = "UPDATE `nekretnina` SET `tip_nekretnine_id`= NUll  WHERE tip_nekretnine_id=$id";

$res = mysqli_query($dbconn, $slq);


$slq_fotke = "DELETE FROM tip_nekretnine WHERE id=$id";
$res2 = mysqli_query($dbconn, $slq_fotke);





if ($res2) {
    header("location: index.php?msg=contact_deleted");
} else {
    header("location: index.php?msg=not_deleted");
}
