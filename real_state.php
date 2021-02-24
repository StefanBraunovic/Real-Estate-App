<?php


include 'db.php';


isset($_GET['id']) ? $id = $_GET['id'] : exit("Id error");


$slq = "SELECT nekretnina.*, grad.name as city_name,
tip_oglasa.naziv_oglasa as tipO,
tip_nekretnine.tip as tip,
status_nekretnina.status_nekretnine as stats,
fotografije.naziv as ostale_fotke

from nekretnina

left JOIN grad on nekretnina.grad_id = grad.id
left JOIN tip_nekretnine on nekretnina.tip_nekretnine_id = tip_nekretnine.id
left JOIN tip_oglasa on nekretnina.tip_oglasa_id=tip_oglasa.id
left JOIN fotografije on nekretnina.id=fotografije.nekretnina_id
LEFT JOIN status_nekretnina ON nekretnina_status_id=status_nekretnina.id
WHERE nekretnina.id=$id

";
// exit($slq);

$res = mysqli_query($dbconn, $slq);





$nekretnina = mysqli_fetch_assoc($res);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Estate details <?= $id ?></title>
</head>

<body>



    <div class="d-flex justify-content-center container mt-5">
        <div class="card p-3 bg-white"><i class="fa fa-apple"></i>
            <div class="about-product text-center mt-2"><img src="<?= $nekretnina['fotografija_id'] ?>" width="300">
                <div>
                    <h4><?= $nekretnina['city_name'] ?></h4>
                    <h6 class="mt-0 text-black-50"><?= $nekretnina['tip'] ?></h6>
                </div>
            </div>
            <div class="stats mt-2">
                <div class="d-flex justify-content-between p-price"><span>Tip oglasa:<?= $nekretnina['tipO'] ?></div>
                <div class="d-flex justify-content-between p-price"><span>Status oglasa:<span></span> <?= $nekretnina['stats'] ?></span></div>
                <div class="d-flex justify-content-between p-price"><span><?= $nekretnina['povrsina'] ?></div>
            </div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">Opis: <?= $nekretnina['opis'] ?></div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">Godina izgradnje:<?= $nekretnina['godina_izgradnje'] ?></div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">naziv fotke <?= $nekretnina['ostale_fotke'] ?></div>
            <div class="d-flex justify-content-between total font-weight-bold mt-4">Cijena:<?= $nekretnina['cijena'] ?>$ </div>

            <div>
                <?php
                $sql = "SELECT * FROM nekretnina  
                    left JOIN fotografije on nekretnina.id=fotografije.nekretnina_id
                    WHERE nekretnina.id=$id
                     ";
                // var_dump($sql);
                // exit;
                $res = mysqli_query($dbconn, $sql);
                while ($row = mysqli_fetch_assoc($res)) {
                    $id_temp = $row['id'];
                    $name_temp = $row['naziv'];
                    echo "<img src=\"$name_temp\" id=\"$id_temp\" width=200px;>";
                }

                ?>
            </div>
        </div>
    </div>

</body>

</html>