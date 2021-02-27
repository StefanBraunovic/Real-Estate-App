<?php

include 'db.php';
include 'functions.php';

// var_dump($_POST);
// exit;


isset($_POST['id']) && is_numeric($_POST['id'])  ? $id = $_POST['id'] : exit("ID_error...");
isset($_POST['grad_id']) ? $grad_id = $_POST['grad_id'] : $grad_id = "Nepoznato";
isset($_POST['tip_oglasa_id']) ? $tip_oglasa_id = $_POST['tip_oglasa_id'] : $tip_oglasa_id = "Nepoznato";
isset($_POST['tip_nekretnine_id']) ? $tip_nekretnine_id = $_POST['tip_nekretnine_id'] : $tip_nekretnine_id = "Nepoznato";
isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : $povrsina = "Nepoznato";
isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : $godina_izgradnje = "Nepoznato";
isset($_POST['opis']) ? $opis = $_POST['opis'] : $opis = "Nepoznato";

isset($_POST['nekretnina_status_id'])  ? $nekretnina_status_id = $_POST['nekretnina_status_id'] : $nekretnina_status_id = "Nepoznato";
isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : $cijena = "Nepoznato";

if (isset($_FILES['fotografija_id']) && $_FILES['fotografija_id']['tmp_name'] != "") {
    $new_file_name = uploadPhoto('fotografija_id');
    $update_photo = ",fotografija_id = '$new_file_name'";

    // brisati staru...
    $old_photo = mysqli_fetch_row(mysqli_query($dbconn, "SELECT fotografija_id from nekretnina WHERE id = $id"))[0];
    unlink($old_photo);
} else {
    $update_photo = "";
}





// upit 

$sql_update = "UPDATE  nekretnina SET 
grad_id='$grad_id',
tip_oglasa_id='$tip_oglasa_id',
tip_nekretnine_id='$tip_nekretnine_id',
povrsina='$povrsina',
godina_izgradnje='$godina_izgradnje',
opis = '$opis',
nekretnina_status_id='$nekretnina_status_id',
cijena='$cijena'
$update_photo
WHERE id=$id

";




$res_update = mysqli_query($dbconn, $sql_update);

// ako je upit prosao
if ($res_update) {
    header("location: index.php?msg=contact_added");
} else {
    // debuging ako upit ne prodje

    exit("<pre>" . $sql_update . "</pre>");
    header("location: index.php?msg=error");
    // exit("greska pri dodavanju");
}
