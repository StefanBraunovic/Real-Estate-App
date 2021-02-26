<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Bootstrap Sidebar</h3>
    </div>

    <ul class="list-unstyled components">
        <p>Dummy Heading</p>
        <li class="active">
            <a href="./index.php">Pocetna</a>


        </li>

        <li>
            <a href=" #pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>

                    <a href="new_city.php"> Dodaj novi grad
                    </a>
                </li>
                <li>
                    <a href="new_tip.php"> Dodaj novi tip nekretnine
                    </a>
                </li>
                <li>
                    <a href="new_real_state.php"> Dodaj novu nekretninu
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href=" #page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Izbrisi/Izmjeni</a>
            <ul class="collapse list-unstyled" id="page">
                <li>

                    <a href="new_city.php"> Obrisi grad
                    </a>
                </li>
                <li>
                    <a href="new_tip.php">Izmjeni grad
                    </a>
                </li>
                <li>
                    <a href="new_tip.php">Obrisi tip nekretnine
                    </a>
                </li>
                <li>
                    <a href="new_real_state.php"> Izmjeni tip nekretnine
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>