<?php
include 'db.php';

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
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>

                </div>
            </nav>
            <form action="./add_new_rs.php" method="POST" class="nova-nekretnina" enctype="multipart/form-data">
                <h4 class="text-center">Dodaj novu nekretninu</h4>


                <div class="form-group">
                    <label for="Grad">Grad:</label>
                    <select class="form-control" name="grad_id" id="grad" require>
                        <option value="">izaberi grad</option>
                        <?php
                        $sql = "SELECT * FROM grad order by name ASC";
                        $res = mysqli_query($dbconn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_temp = $row['id'];
                            $name_temp = $row['name'];
                            echo "<option value=\"$id_temp\">$name_temp</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tip_oglasa_id">Tip oglasa:</label>

                    <select class="form-control" name="tip_oglasa_id" id="tip_oglasa_id" require>
                        <option value="">izaberi tip oglasa</option>
                        <?php
                        $sql = "SELECT * FROM tip_oglasa ";
                        $res = mysqli_query($dbconn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_temp = $row['id'];
                            $name_temp = $row['naziv_oglasa'];
                            echo "<option value=\"$id_temp\">$name_temp</option>";
                        }

                        ?>
                    </select>
                </div>


                <div class="form-group">
                    <label for="tip_nekretnine_id">Tip Nekretnine:</label>

                    <select class="form-control" name="tip_nekretnine_id" id="" require>
                        <option value="">-Izaberi tip nekretnine-</option>
                        <?php
                        $sql = "SELECT * FROM tip_nekretnine ";
                        $res = mysqli_query($dbconn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_temp = $row['id'];
                            $name_temp = $row['tip'];
                            echo "<option value=\"$id_temp\">$name_temp</option>";
                        }

                        ?>
                    </select>
                </div>



                <div class="form-group">
                    <label for="povrsina">Povrsina:</label>
                    <input type="number" name="povrsina" id="povrsina"> m²
                </div>


                <div class="form-group">
                    <label for="date">Datum izgradnje:</label>
                    <input id="date" type="date" name="godina_izgradnje">
                </div>


                <div class="form-group">
                    <label for="desc">Opis:</label>
                    <textarea id="desc" name="opis" cols="30" rows="10" placeholder="Opis"></textarea>
                </div>

                <div class="form-group">
                    <label for="nekretnina_status_id">Tip Nekretnine:</label>

                    <select class="form-control" name="nekretnina_status_id" id="nekretnina_status_id" require>
                        <option value="">Izaberi status nekretnine</option>
                        <?php
                        $sql = "SELECT * FROM status_nekretnina ";
                        $res = mysqli_query($dbconn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_temp = $row['id'];
                            $name_temp = $row['status_nekretnine'];
                            echo "<option value=\"$id_temp\">$name_temp</option>";
                        }

                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Cijena">Cijena:</label>
                    <input type="number" name="cijena" id="cijena"> €
                </div>


                <label for="profilna">Izaberi fotografiju nekretine</label>
                <input type="file" name="fotografija_id" id="profilna">
                <label id="ostale" for="profilna">Dodaj jos fotografija te nekretnine</label>
                <input type="file" name="naziv[]" id="ostale" multiple>






                <button>Add</button>
                <br>
            </form>
        </div>





        <?php

        include 'footer.php';

        ?>