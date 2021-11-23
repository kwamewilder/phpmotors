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
    <title>Account Update | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList ?>
    </nav>

    <h1>
        Account Update
    </h1>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<p class="message">' . $_SESSION['message'] . '</p>';
    }
    ?>

    <!-- Update Information form -->

    <form method="POST" action="/phpmotors/accounts/">

        <fieldset>

            <label class="top" for="clientFirstname">First Name</label>
            <input class="top" type="text" name="clientFirstname" id="clientFirstname" <?php if (isset($clientFirstname)) {
                                                                                            echo "value='$clientFirstname'";
                                                                                        } elseif (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                            echo "value=" . $_SESSION['clientData']['clientFirstname'];
                                                                                        } ?> placeholder="example 'Joe'" required>
            <label class="top" for="clientLastname">Last Name</label>
            <input class="top" type="text" name="clientLastname" id="clientLastname" <?php if (isset($clientLastname)) {
                                                                                            echo "value='$clientLastname'";
                                                                                        } elseif (isset($_SESSION['clientData']['clientLastname'])) {
                                                                                            echo "value=" . $_SESSION['clientData']['clientLastname'];
                                                                                        } ?> placeholder="example 'Bloggs'" required>
            <label class="top" for="clientEmail">Email</label>
            <input class="top" type="email" name="clientEmail" id="clientEmail" <?php if (isset($clientEmail)) {
                                                                                    echo "value='$clientEmail'";
                                                                                } elseif (isset($_SESSION['clientData']['clientEmail'])) {
                                                                                    echo "value=" . $_SESSION['clientData']['clientEmail'];
                                                                                }  ?> placeholder="someone@email.com" required>

            <button class="SubmitBtn" type="submit" name="submit" id="AcctBtn" value="accountUpdate">Update Account</button>

            <input type="hidden" name="action" value="accountUpdate">
            <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                            echo $_SESSION['clientData']['clientId'];
                                                        } ?>">

        </fieldset>


    </form>

    <?php
    if (isset($message)) {
        echo '<strong><p class="message">' . $message . '</p></strong>';
    }
    ?>

    <!-- Update Password Form -->

    <form method="POST" action="/phpmotors/accounts/">

        <fieldset>

            <label class="top" for="clientPassword">Password</label>
            <span>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character.</span>

            <span>Note: Your original password will be changed.</span>

            <input class="top" type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <button class="SubmitBtn" type="submit" name="submit" id="PWBtn" value="passwordUpdate">Update Password</button>
            <input type="hidden" name="action" value="passwordUpdate">
            <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                            echo $_SESSION['clientData']['clientId'];
                                                        } ?>">
        </fieldset>


    </form>
    <div id="line"></div>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>


    <script src="/phpmotors/js/account.js"></script>
</body>

</html>