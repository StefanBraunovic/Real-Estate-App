<?php

include 'db.php';


isset($_POST['tip']) ? $tip = $_POST['tip'] : exit("ID error");



// upit 

$sql_insert = "INSERT INTO tip_nekretnine (tip) VALUES ('$tip')";


$res_insert = mysqli_query($dbconn, $sql_insert);

// ako je upit prosao
if ($res_insert) {
    header("location: index.php?msg=tip_added");
} else {



    header("location: index.php?msg=error");
}
