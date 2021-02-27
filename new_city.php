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
        <div class="content">
            <form action="./add_new_city.php" method="POST" class="form-control">
                <h4 class="text-center mt-4">Dodaj novi grad</h4>
                <br>


                <input type=" text" name="name" placeholder="Name">


                <button>dodaj</button>


            </form>
        </div>
    </div>





    </body>

    <?php

    include 'footer.php';

    ?>