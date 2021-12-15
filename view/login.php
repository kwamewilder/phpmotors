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
            if (isset($_SESSION['message'])){
                echo $_SESSION['message'];
            }
        ?>
        <form action="/phpmotors/accounts/" method="post">
            <fieldset>
            <legend>Enter your Information</legend>
                
            <label for="email" class="test"><span>Email:</span></label>
            <input <?php if(isset($clientEmail)){echo "value='$clientEmail'";} ?> placeholder ="Email" type="email" id="email" name="clientEmail" required>
            <label for="password" class="test"><span>Password:</span></label>
            <input placeholder ="Password" type="password" id="password" name="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
            <span class="passwordInfo">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
            <input type="submit" value="SIGN IN" class="sign-in">
            <input type="hidden" name="action" value=Login>
            </fieldset>
        </form>

        <p>Don't have an account <a href="/phpmotors/accounts/index.php/?action=registration" title="CREATE ACCOUNT" class="accountCreate">Click Here</a></p>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>
</body>

</html>