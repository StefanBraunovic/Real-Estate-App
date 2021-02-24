<?php

include 'db.php';



$slq = "SELECT nekretnina.*, grad.name as city_name,
tip_nekretnine.tip as tip 
from nekretnina
left JOIN grad on nekretnina.grad_id = grad.id
left JOIN tip_nekretnine on nekretnina.tip_nekretnine_id = tip_nekretnine.id
 

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
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>

            </div>
        </nav>
        <div class="content">
            <?php

            while ($row = mysqli_fetch_assoc($res)) {
                $id_temp = $row['id'];
                $link2 = "<a href=\"real_state.php?id=$id_temp\">detalis</a>";
                $link3 = "<a href=\"edit_realState.php?id=$id_temp\">edit</a>";
                $link1 = "<a href=\"delete_realE.php?id=$id_temp\">delete</a>";


                echo " <div class=\"card mb-4 text-white bg-dark\"> ";
                echo "<img class=card-img-top src=" . $row['fotografija_id'] . " >";
                echo "<div class=card-body>";
                echo "<h5 class=\"card-title\">" . $row['city_name'] . "</h5>";
                echo "<span>" . $row['tip'] . "</span>";
                echo "<p>Cijena: "  . $row['cijena'] . " €</p>";
                echo "<p>Povrsina: " . $row['povrsina'] . " m²</p>";

                echo "<button class=\"btn btn-outline-light btn-sm\"> " . $link2 .  "</button>";
                echo "<button class=\"btn btn-outline-primary btn-sm\">" . $link3 .  "</button>";
                echo "<button class=\"btn btn-outline-danger btn-sm\">" . $link1 .  "</button>";

                echo "</div>";
                echo "</div>";
            }


            ?>

        </div>
    </div>

</div>

</div>

<?php

include 'footer.php';

?>