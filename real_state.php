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

<?php
include 'header.php';
?>
<div class="wrapper">

    <!-- Sidebar -->
    <?php

    include 'sidebar.php';

    ?>

    <!-- Page Content -->
    <div id="content">

        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span></span>
                </button>

            </div>


        </nav>


        <div class="details">
            <div class=" container ml-6  ">
                <div class="card p-3 text-white bg-dark"><i class="fa fa-apple"></i>
                    <div class="about-product text-center mt-2"><img src="<?= $nekretnina['fotografija_id'] ?>" width="300">
                        <div>
                            <h4><?= $nekretnina['city_name'] ?></h4>
                            <h6 class="mt-0 text-black-50"><?= $nekretnina['tip'] ?></h6>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between font-weight-bold mt-2">Opis: <?= $nekretnina['opis'] ?></div>

                    <div class="d-flex justify-content-between p-price mt-2">Tip oglasa: <?= $nekretnina['tipO'] ?></div>
                    <div class="d-flex justify-content-between p-price mt-2"><span>Status oglasa: <?= $nekretnina['stats'] ?></span></div>
                    <div class="d-flex justify-content-between p-price mt-2">Povrsina: <?= $nekretnina['povrsina'] ?> m²</div>

                    <div class="d-flex justify-content-between  font-weight-bold mt-2">Godina izgradnje: <?= $nekretnina['godina_izgradnje'] ?></div>
                    <p class="d-flex justify-content-between total font-weight-bold mt-2">Cijena:<?= $nekretnina['cijena'] ?> € </p>

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
        </div>
    </div>
</div>


<?php

include 'footer.php';

?>