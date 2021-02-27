<?php

include 'db.php';


isset($_POST['name']) ? $name = $_POST['name'] : exit("Greska 1 - morate unijeti ime");



// upit 

$sql_insert = "INSERT INTO grad (name) VALUES ('$name')";

$res_insert = mysqli_query($dbconn, $sql_insert);

// ako je upit prosao
if ($res_insert) {
    header("location: index.php?msg=city_added");
} else {
    // debuging ako upit ne prodje

    // exit("<pre>" . $sql_insert . "</pre>");
    header("location: index.php?msg=error");
    // exit("greska pri dodavanju");
}
