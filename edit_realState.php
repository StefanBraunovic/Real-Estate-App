<?php
include 'db.php';


isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Id error");

$slq = "SELECT * from nekretnina WHERE id=$id";

$res = mysqli_query($dbconn, $slq);


$nekretnina = mysqli_fetch_assoc($res);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New real state</title>
</head>

<body>

    <form action="./edit_realSate_back.php" method="POST" enctype="multipart/form-data">


        <input type="hidden" name="id" value="<?= $id ?>">

        <select name="grad_id" id="" require>
            <option value="<?= $nekretnina['name'] ?>">-choose city-</option>
            <?php
            $grad_id = $nekretnina['grad_id'];
            $sql = "SELECT * FROM grad ";
            $res = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $id_temp = $row['id'];
                $name_temp = $row['name'];

                $selected = "";
                if ($grad_id == $id_temp) {
                    $selected = "selected";
                }

                echo "<option value=\"$id_temp\"$selected>$name_temp</option>";
            }

            ?>
        </select>
        <select name="tip_oglasa_id" id="" require>
            <option value="">-choose city-</option>
            <?php
            $tip_oglasa_id = $nekretnina['tip_oglasa_id'];
            $sql = "SELECT * FROM tip_oglasa ";
            $res = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $id_temp = $row['id'];
                $name_temp = $row['naziv_oglasa'];

                $selected = "";

                if ($tip_oglasa_id == $id_temp) {
                    $selected = "selected";
                }

                echo "<option value=\"$id_temp\"$selected>$name_temp</option>";
            }

            ?>
        </select>
        <select name="tip_nekretnine_id" id="" require>
            <option value="">-choose city-</option>
            <?php
            $tip_nekretnine_id = $nekretnina['tip_nekretnine_id'];
            $sql = "SELECT * FROM tip_nekretnine ";
            $res = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $id_temp = $row['id'];
                $name_temp = $row['tip'];
                if ($tip_nekretnine_id == $id_temp) {
                    $selected = "selected";
                }
                echo "<option value=\"$id_temp\"$selected>$name_temp</option>";
            }

            ?>
        </select>

        <input type="number" name="povrsina" placeholder="povrsina" value="<?= $nekretnina['povrsina'] ?>">
        <input type="date" name="godina_izgradnje" value="<?= $nekretnina['godina_izgradnje'] ?>">
        <textarea name="opis" cols="30" rows="10 " value="<?= $nekretnina['opis'] ?>"></textarea>



        <select name="nekretnina_status_id" id="" require>
            <option value="">-choose city-</option>
            <?php
            $nekretnina_status_id = $nekretnina['nekretnina_status_id'];
            $sql = "SELECT * FROM status_nekretnina ";
            $res = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $id_temp = $row['id'];
                $name_temp = $row['status_nekretnine'];

                if ($nekretnina_status_id == $id_temp) {
                    $selected = "selected";
                }


                echo "<option value=\"$id_temp\"$selected>$name_temp</option>";
            }

            ?>
        </select>
        <input type="number" name="cijena" placeholder="cijena" value="<?= $nekretnina['cijena'] ?>">

        <div class="about-product text-center mt-2"><img src="<?= $nekretnina['fotografija_id'] ?>" width="300">

            <input type="file" name="fotografija_id">


            <button>SAVE</button>
            <br>
    </form>

</body>

</html>