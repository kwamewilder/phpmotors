<?php

if (!$_SESSION['loggedIn']) {
    header('Location: /phpmotors/index.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors | Admin</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/navigation.php'; ?>
    </nav>

    <main>

        <?php
        if (isset($_SESSION['clientData']['clientFirstname'])) {
            echo '<p class="message"><strong>Welcome ' . $_SESSION['clientData']['clientFirstname'] . '</strong></p>';
        }
        ?>

        <h1>
            <?php echo $_SESSION['clientData']['clientFirstname'] . ' ' . $_SESSION['clientData']['clientLastname']; ?>
        </h1>

        <?php if (isset($_SESSION['message'])) {
            echo '<p class="message"><strong>' . $_SESSION['message'] . '</strong></p>';
        }
        ?>

        <p> You are logged in.</p>
        <div class="admin_details">
            <ul>
                <li>
                    Firstname: <?php echo $_SESSION['clientData']['clientFirstname'];  ?>
                </li>
                <li>
                    Lastname: <?php echo $_SESSION['clientData']['clientLastname']; ?>
                </li>
                <li>
                    Email: <?php echo $_SESSION['clientData']['clientEmail']; ?>
                </li>

            </ul>

            <h2>Account Management</h2>
            <p>Use this link to update account information:</p>
            <p><a href="/phpmotors/accounts/index.php?action=accountMod">Update Account Information</a></p>

            <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo
                '<h2> Inventory Management </h2>
            <p class="inventory_message"> Use this link to manage the inventory <br>
            <a href="/phpmotors/vehicles/">Vehicle Management</a></p>';
            }
            ?>
        </div>



    </main>
    <div id="line"></div>

    <Footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>