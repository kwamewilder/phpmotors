<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . './phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList ?>
    </nav>

    <h1>
        Registration
    </h1>
    <?php
    if (isset($message)) {
        echo '<strong><p class="message">' . $message . '</p></strong>';
    }
    ?>
    <form method="POST" action="/phpmotors/accounts/index.php">

        <fieldset>
            <label class="top" for="clientFirstname">First Name</label>
            <input class="top" type="text" name="clientFirstname" id="Firstname" <?php if (isset($clientFirstname)) {
                                                                                        echo "value='$clientFirstname'";
                                                                                    } ?> placeholder="example 'Joe'" required>
            <label class="top" for="clientLastname">Last Name</label>
            <input class="top" type="text" name="clientLastname" id="Lastname" <?php if (isset($clientLastname)) {
                                                                                    echo "value='$clientLastname'";
                                                                                } ?> placeholder="example 'Bloggs'" required>
            <label class="top" for="clientEmail">Email</label>
            <input class="top" type="email" name="clientEmail" id="Email" <?php if (isset($clientEmail)) {
                                                                                echo "value='$clientEmail'";
                                                                            }  ?> placeholder="someone@email.com" required>
            <label class="top" for="clientPassword">Password</label>
            <span>Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <input class="top" type="password" name="clientPassword" id="Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
            <button class="showPassword" id="ShowPassword" type="button">Show Password</button>
            <button class="SubmitBtn" type="submit" name="submit" id="regBtn" value="register-attempt">Register</button>
            <input type="hidden" name="action" value="register-attempt">
        </fieldset>


    </form>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>


    <script src="/phpmotors/js/account.js"></script>
</body>

</html>