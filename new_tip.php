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
            <form action="./add_new_tip.php" method="POST" class="form-control">
                <h4 class="text-center  mb-2">Dodaj novi tip nekretnine</h4>


                <input type="text" name="tip" placeholder="Name">


                <button>dodaj</button>


            </form>
        </div>
    </div>





    </body>

    <?php

    include 'footer.php';

    ?>