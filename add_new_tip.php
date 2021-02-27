<?php

include 'db.php';


isset($_POST['tip']) ? $tip = $_POST['tip'] : exit("Greska 1 - morate unijeti ime");



// upit 

$sql_insert = "INSERT INTO tip_nekretnine (tip) VALUES ('$tip')";


$res_insert = mysqli_query($dbconn, $sql_insert);

// ako je upit prosao
if ($res_insert) {
    header("location: index.php?msg=city_added");
} else {
    // debuging ako upit ne prodje

    exit("<pre>" . $sql_insert . "</pre>");
    header("location: index.php?msg=error");
    // exit("greska pri dodavanju");
}
