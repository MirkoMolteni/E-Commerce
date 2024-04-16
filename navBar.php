<?php
class navBar
{
    function getRender()
    {
        echo '
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">E-Commerce</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse ml-auto" id="navbarNav">
                <ul class="navbar-nav">';
        if (isset($_SESSION['username'])) {
            echo '<li class="nav-item">
                            <a class="nav-link" href="profile.php">' . $_SESSION['username'] . '</a>
                          </li>';
            echo '<li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                          </li>';
        } else {
            echo '<li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                          </li>';
        }
        echo '
                        <li class="nav-item">
                        <a class="nav-link" href="carrello.php">Carello</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>';
    }
}

?>