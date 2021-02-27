<?php

include 'db.php';

$where_arr = [];

$where_arr[] = "1=1";
if (isset($_GET['name']) && $_GET['name'] != "") {
    $city_name = strtolower($_GET['name']);
    $where_arr[] = "lower(name) LIKE '%$city_name%' ";
}
if (isset($_GET['cijena1']) && $_GET['cijena2'] != "") {
    $prvaVrijednost = ($_GET['cijena1']);
    $drugaVrijednost = ($_GET['cijena2']);
    $where_arr[] = "cijena  BETWEEN $prvaVrijednost AND $drugaVrijednost";
}

if (isset($_GET['povrsina']) && $_GET['povrsina'] != "") {
    $povrsina = strtolower($_GET['povrsina']);
    $where_arr[] = "povrsina >=$povrsina ";
}
if (isset($_GET['tip']) && $_GET['tip'] != "") {
    $tip = strtolower($_GET['tip']);
    $where_arr[] = "lower(tip) LIKE '%$tip%' ";
}


$where_str = implode(" AND ", $where_arr);
// var_dump($where_str);
// exit;




$slq = "SELECT nekretnina.*, grad.name as city_name,
tip_nekretnine.tip as tip 
from nekretnina 
left JOIN grad on nekretnina.grad_id = grad.id 
left JOIN tip_nekretnine on nekretnina.tip_nekretnine_id = tip_nekretnine.id
WHERE $where_str
 
 

";

$res = mysqli_query($dbconn, $slq);






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
        <form class="search-form" action="./index.php" method="GET">
            <input type="text" name="name" id="naziv_grada" placeholder="naziv grada">

            <input type="number" name="cijena1" placeholder="od €">
            <input type="number" name="cijena2" placeholder="do €">
            <input type="number" name="povrsina" placeholder="m²">
            <input type="text" name="tip" placeholder="tip nekretnine">
            <button class="btn btn-outline-primary btn-sm">Pretrazi</button>
        </form>

        <div class="content">
            <?php

            while ($row = mysqli_fetch_assoc($res)) {
                $id_temp = $row['id'];
                $link2 = "<a href=\"real_state.php?id=$id_temp\">detalji</a>";
                $link3 = "<a href=\"edit_realState.php?id=$id_temp\">izmjeni</a>";
                $link1 = "<a href=\"delete_realE.php?id=$id_temp\">izbrisi</a>";


                echo " <div class=\"card  text-white bg-dark\"> ";
                echo "<img  src=" . $row['fotografija_id'] . "  >";
                echo "<div class=\"card-body\">";
                echo "<h5 class=\"card-title\">" . $row['city_name'] . "</h5>";
                echo "<span>" . $row['tip'] . "</span>";
                echo "<p class=\"mt-3\">Cijena: "  . $row['cijena'] . " €</p>";
                echo "<p>Povrsina: " . $row['povrsina'] . " m²</p>";
                echo " <div class=\"dugmad\"> ";
                echo "<button class=\"btn btn-outline-light btn-sm\"> " . $link2 .  "</button>";
                echo "<button class=\"btn btn-outline-primary btn-sm\">" . $link3 .  "</button>";
                echo "<button class=\"btn btn-outline-danger btn-sm\">" . $link1 .  "</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }


            ?>

        </div>
    </div>
</div>



<?php

include 'footer.php';

?>