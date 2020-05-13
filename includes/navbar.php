<nav class="navbar">
    <div class="logo">
        <img src="./images/ecLogo.png" alt="logo">
    </div>
    <?php

    if (isset($_SESSION['fname'])) {
        echo "<ul>
        <a href='manage-profile.php'><li >Hello, " . $_SESSION['fname'] . "</li></a>
        <span class='sm-hide'>|</span>
        <a  href='logout.php'><li>Logout</li></a>
    </ul>";
    } else if (isset($_SESSION['admin'])) {
        echo "<ul>
        <a href='manage-profile.php'><li >Hello, " . $_SESSION['admin'] . "</li></a>
        <span class='sm-hide'>|</span>
        <a  href='logout.php'><li>Logout</li></a>
    </ul>";
    } else {
        echo "<ul>
        <a  href='register.php'><li>Register</li></a>
        <span class='sm-hide'>|</span>
        <a href='index.php'><li >Login</li></a>
    </ul>";
    }
    ?>
</nav>