<img src="/phpmotors/images/site/logo.png" alt="logo">
<?php
if (!isset($_SESSION['clientData'])) {
    echo "<a href='/phpmotors/accounts/'>
    <span class='cookie'> Welcome </span>
    </a>";
} else {
    echo "<a href='/phpmotors/accounts/'>
    <span class='cookie'> Welcome " .  $_SESSION['clientData']['clientFirstname'] . "</span>
    </a>";
}

?>

<?php

if (isset($_SESSION['loggedIn']) && ($_SESSION['loggedIn'] === TRUE)) {
    echo
    '<p>
        <a href="/phpmotors/accounts/index.php?action=Logout">Logout</a>
    </p>';
} else {
    echo
    '<p>
        <a href="/phpmotors/accounts/index.php?action=Login-page">My Account</a>
    </p>';
}
?>