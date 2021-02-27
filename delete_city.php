<?php


include 'db.php';


// var_dump($_POST);
// exit;

isset($_POST['name']) ? $id = $_POST['name'] : exit("Id error");

$slq = "UPDATE `nekretnina` SET `grad_id`=NUll  WHERE grad_id=$id";

$res = mysqli_query($dbconn, $slq);


$slq_fotke = "DELETE FROM grad WHERE id=$id";
$res2 = mysqli_query($dbconn, $slq_fotke);





if ($res2) {
    header("location: index.php?msg=contact_deleted");
} else {
    header("location: index.php?msg=not_deleted");
}
