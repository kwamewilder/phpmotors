<img src="/phpmotors/images/site/logo.png" alt="Logo for PHP Motors">
<a href="/phpmotors/accounts/index.php?action=login" title="LOGIN FOR YOUR ACCOUNT">My Account</a>
<?php if (isset($_SESSION['loggedin'])) {
            echo "<span class='welcome'><a href='/phpmotors/accounts/index.php?action=Loggedin'>Welcome " . $_SESSION['clientData']['clientFirstname'] . "</a></span>";
            echo "<span class='welcome'><a href='/phpmotors/accounts/index.php?action=Logout'> | Logout </a></span>";
        } ?>