<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>

    <title>PHP Motors</title>
</head>

<body>
    <?php
    //check if the user is logged in
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<span></span>";
    } else {
        header("Location: /phpmotors/index.php");
    }
    ?>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main>
        <h3>Update your account information</h3>
        <?php if (isset($_SESSION['account-message'])) {
            echo $_SESSION['account-message'];
        } ?>
        <form method="POST" action="/phpmotors/accounts/index.php">
            <label for="clientFirstname">First Name: </label>
            <input type="text" id="clientFirstname" name="clientFirstname" required <?php if (isset($clientFirstname)) {
                                                                                        echo "value='$clientFirstname'";
                                                                                    } else if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                        echo "value='" . $_SESSION['clientData']['clientFirstname'] . "'";
                                                                                    } ?>><br>

            <label for="clientLastname">Last Name: </label>
            <input type="text" id="clientLastname" name="clientLastname" required <?php if (isset($clientLastname)) {
                                                                                        echo "value='$clientLastname'";
                                                                                    } else if (isset($_SESSION['clientData']['clientLastname'])) {
                                                                                        echo "value='" . $_SESSION['clientData']['clientLastname'] . "'";
                                                                                    } ?>><br>

            <label for="clientEmail">Email: </label>
            <input type="email" id="clientEmail" name="clientEmail" required <?php if (isset($clientEmail)) {
                                                                            echo "value='$clientEmail'";
                                                                        } else if (isset($_SESSION['clientData']['clientEmail'])) {
                                                                            echo "value='" . $_SESSION['clientData']['clientEmail'] . "'";
                                                                        } ?>><br>

            <input type="hidden" name="clientId" value="<?php $_SESSION['clientData']['clientId']; ?>">
            <input type="hidden" name="action" value="update">
            <input type="submit" name="Update" value="update">
        </form>

        <h3>Change your password</h3>
        <?php if (isset($_SESSION['password-message'])) {
            echo $_SESSION['password-message'];
        } ?>
        <form method="POST" action="/phpmotors/accounts/index.php">
            <span>Make sure the new password is at least 8 characters and has at least 1 uppercase character,
                1 number and 1 special character.</span><br>
            <label for="clientPassword">Change password: </label>
            <input type="password" id="clientPassword" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

            <input type="hidden" name="clientId" value="<?php $_SESSION['clientData']['clientId']; ?>">
            <input type="hidden" name="action" value="changePassword">
            <input type="submit" name="Change Password" value="change password">
        </form>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/scripts/scripts.php'; ?>
</body>

</html>