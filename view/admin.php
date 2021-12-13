<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors</title>
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
        <?php
        //check if the user is logged in
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo "<span></span>";
        } else {
            header("Location: /phpmotors/index.php");
        } ?>
    </header>

    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main class="center">
        <?php echo "<h1>logged in " . $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] . "</h1>"; ?>
        <a href="/phpmotors/accounts/index.php?action=updateUser">Update Account</a>
        <?php echo "<ul class='adminList'>
                        <li> Firstname: " . $_SESSION['clientData']['clientFirstname'] . "</li>
                        <li> Lastname: " . $_SESSION['clientData']['clientLastname'] . "</li>
                        <li> Email: " . $_SESSION['clientData']['clientEmail'] . "</li>
                    </ul>"; ?>
        <?php
        if ($_SESSION['clientData']['clientLevel'] == 3) {
            echo "<h2>Inventory Management</h2>";
            echo "<p>Use this link to manage the inventory.</p>";
            echo "<span><a href='/phpmotors/vehicles/'>Vehicle Management</a></span>";
        }
        ?>
        <h3>Your Reviews</h3>
        <?php echo $reviewHTML; ?>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>