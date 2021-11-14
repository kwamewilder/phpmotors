<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | PHP Motors</title>
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
        PHP Motors Login
    </h1>
    <?php
    if (isset($_SESSION['message'])) {
        echo '<strong><p class="message">' . $_SESSION['message'] . '</p></strong>';
    }
    ?>

    <form action="/phpmotors/accounts/" method="post">


        <fieldset>
            <label class="top" for="clientEmail">Email</label>
            <input class="top" type="email" name="clientEmail" <?php if (isset($clientEmail)) {
                                                                    echo "value='$clientEmail'";
                                                                } ?> id="clientEmail" placeholder="someone@email.com" required>
            <label class="top" for="clientPassword">Password</label>
            <input class="top" type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <button class="SubmitBtn" type="submit">Sign In</button>
            <input type="hidden" name="action" value="Login">
            <a href="../accounts/index.php?action=registration">Create a new account?</a>
        </fieldset>
    <?php ?>

    </form>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>