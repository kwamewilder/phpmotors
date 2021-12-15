<!DOCTYPE html>
<html lang="en">

<head>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/head.php'; ?>
    <title>PHP Motors</title>
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main>

        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>

        <form method="post" action="/phpmotors/accounts/index.php">
                <fieldset>
                    <legend>Enter your information</legend>
                    <label for="firstName"><span>First Name:</span></label>
                    <input <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> placeholder="First Name" type="text" id="firstName" name="clientFirstname" required>

                    <label for="lastName"><span>Last name:</span></label>
                    <input <?php if(isset($clientLastname)){echo "value='$clientLastname'";} ?>placeholder="Last Name" type="text" id="lastName" name="clientLastname" required>

                    <label for="email"><span>Email:</span></label>
                    <input <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> placeholder="Email" type="email" id="email" name="clientEmail" required>

                    <label for="password"><span>Password: </span></label>
                    <input type="password" id="password" name="clientPassword" placeholder="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <span class="passwordInfo">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>

                    <input type="submit" name="submit" id="regBtn" class="sign-in" value="Register">
                    <input type="hidden" name="action" value="register">
                </fieldset>
            </form>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    
</body>

</html>