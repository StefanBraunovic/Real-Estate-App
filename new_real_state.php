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
                        <span>Toggle Sidebar</span>
                    </button>

                </div>
            </nav>

        </div>


        <form action="./add_new_rs.php" method="POST" enctype="multipart/form-data">




            <select name="grad_id" id="" require>
                <option value="">-choose city-</option>
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
            <select name="tip_oglasa_id" id="" require>
                <option value="">-choose city-</option>
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
            <select name="tip_nekretnine_id" id="" require>
                <option value="">-choose city-</option>
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

            <input type="number" name="povrsina" placeholder="povrsina">
            <input type="date" name="godina_izgradnje">
            <textarea name="opis" cols="30" rows="10"></textarea>
            <select name="nekretnina_status_id" id="" require>
                <option value="">-choose city-</option>
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
            <input type="number" name="cijena" placeholder="cijena">
            <br>
            <br>
            <input type="file" name="fotografija_id">

            <input type="file" name="naziv[]" multiple>






            <button>SAVE</button>
            <br>
        </form>
        <?php

        include 'footer.php';

        ?>