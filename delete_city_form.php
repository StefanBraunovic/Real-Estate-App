<?php


include 'db.php';


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

                </button>

            </div>
        </nav>
        <h4 class="text-center mt-4">Izbrisi grad</h4>
        <div class="content">
            <form action="./delete_city.php" method="POST" class="form-control">

                <div class="form-group">
                    <label for="Grad">Grad:</label>
                    <select class="form-control" name="name" id="id" require>
                        <option value="">izaberi grad</option>
                        <?php
                        $sql = "SELECT * FROM grad order by name ASC";
                        $res = mysqli_query($dbconn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id_temp = $row['id'];
                            $name_temp = $row['name'];
                            echo "<option id=\"$id_temp\" value=\"$id_temp\">$name_temp</option>";
                        }
                        ?>

                    </select>
                </div>


                <button>Izbrisi</button>



            </form>
        </div>
    </div>





    </body>

    <?php

    include 'footer.php';

    ?>