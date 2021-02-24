<?php

include 'db.php';
include 'functions.php';
// var_dump($_POST);
// 

isset($_POST['grad_id']) ? $grad_id = $_POST['grad_id'] : $grad_id = "Nepoznato";
isset($_POST['tip_oglasa_id']) ? $tip_oglasa_id = $_POST['tip_oglasa_id'] : $tip_oglasa_id = "Nepoznato";
isset($_POST['tip_nekretnine_id']) ? $tip_nekretnine_id = $_POST['tip_nekretnine_id'] : $tip_nekretnine_id = "Nepoznato";
isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : $povrsina = "Nepoznato";
isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : $godina_izgradnje = "Nepoznato";
isset($_POST['opis']) ? $opis = $_POST['opis'] : $opis = "Nepoznato";

isset($_POST['nekretnina_status_id'])  ? $nekretnina_status_id = $_POST['nekretnina_status_id'] : $nekretnina_status_id = "Nepoznato";
isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : $cijena = "Nepoznato";

if (isset($_FILES['fotografija_id'])) {
    $new_file_name = uploadPhoto('fotografija_id');
} else {
    $new_file_name = "";
}

// upit 

$sql_insert = "INSERT INTO nekretnina (
grad_id,
tip_oglasa_id,
tip_nekretnine_id,
povrsina,
godina_izgradnje,
opis,
nekretnina_status_id,
cijena,
fotografija_id
)
VALUES
(
'$grad_id',
'$tip_oglasa_id',
'$tip_nekretnine_id',
'$povrsina',
'$godina_izgradnje',
'$opis',
'$nekretnina_status_id',
'$cijena',
'$new_file_name'




)";



$res_insert = mysqli_query($dbconn, $sql_insert);


if (isset($_FILES['naziv'])) {

    $nekretnina_id_sql = "SELECT * FROM nekretnina ORDER BY id DESC LIMIT 1;";
    $nekretnina_id = mysqli_query($dbconn, $nekretnina_id_sql);
    $id = mysqli_fetch_row($nekretnina_id);
    $id = $id[0];
    foreach ($_FILES['naziv']['tmp_name'] as $key => $tmp_name) {
        $file_name = $key . $_FILES['naziv']['name'][$key];
        $temp_arr = explode(".", $file_name);
        $ekstenzija = $temp_arr[count($temp_arr) - 1];
        $new_file = "./uploads/" . uniqid() . "." . $ekstenzija;

        // var_dump($tmp_name);
        // exit;
        copy($tmp_name, $new_file);
        $query = "insert into fotografije (naziv, nekretnina_id) VALUES('$new_file', '$id')";
        $result = mysqli_query($dbconn, $query);
    }
} else {
    $new_file = "";
}


// ako je upit prosao
if ($res_insert) {
    header("location: index.php?msg=contact_added");
} else {
    // debuging ako upit ne prodje

    exit("<pre>" . $sql_insert . "</pre>");
    header("location: index.php?msg=error");
    // exit("greska pri dodavanju");
}
