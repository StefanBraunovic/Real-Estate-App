<?php
include 'db.php';


isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Id error");

$slq = "SELECT * from nekretnina WHERE id=$id";

$res = mysqli_query($dbconn, $slq);


$nekretnina = mysqli_fetch_assoc($res);

?>


<?php

include 'header.php';

?>

<body>
    <div class="wrapper">

        <!-- Sidebar -->
        <?php

        include 'sidebar.php';

        ?>
        <!-- Page Content -->
        <div class="details">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>

                </div>
            </nav>

            <form action="./edit_realSate_back.php" method="POST" enctype="multipart/form-data" class="form-control">
                <h4 class="text-center">Izmjeni nekretninu</h4>

                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="Grad">Grad:</label>
                    <select class="form-control" name="grad_id" id="" require>

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
                </div>
                <div class="form-group">
                    <label for="tip_oglasa_id">Tip oglasa:</label>
                    <select class="form-control" name="tip_oglasa_id" id="" require>

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
                </div>
                <div class="form-group">
                    <label for="tip_nekretnine_id">Tip Nekretnine:</label>
                    <select class="form-control" name="tip_nekretnine_id" require>

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
                </div>
                <div class="form-group">
                    <label for="povrsina">Povrsina:</label>
                    <input type="number" name="povrsina" placeholder="povrsina" value="<?= $nekretnina['povrsina'] ?>">
                </div>
                <div class="form-group">
                    <input type="date" name="godina_izgradnje" value="<?= $nekretnina['godina_izgradnje'] ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Opis:</label>
                    <textarea name="opis" cols="30" rows="10 " value="<?= $nekretnina['opis'] ?>"></textarea>

                </div>
                <div class="form-group">
                    <label for="nekretnina_status_id">Tip Nekretnine:</label>
                    <select name="nekretnina_status_id" id="" require>
                        <option value=""></option>
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
                </div>
                <div class="form-group">
                    <label for="Cijena">Cijena:</label>
                    <input type="number" name="cijena" placeholder="cijena" value="<?= $nekretnina['cijena'] ?>">
                </div>

                <div class="about-product text-center mt-2"><img src="<?= $nekretnina['fotografija_id'] ?>" width="300">
                </div>
                <label for="profilna">Izaberi fotografiju nekretine</label>

                <input type="file" name="fotografija_id">





                <button>SAVE</button>
                <br>
            </form>
        </div>
    </div>
</body>




<?php

include 'footer.php';

?>