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
    <!-- checks if user is logged in -->
    <?php
    if (!$_SESSION['loggedin'] || $_SESSION['clientData']['clientLevel'] != 3) {
        header('Location: ../index.php');
        exit;
    }
    ?>
    
    <nav>
        <?php //require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/nav.php'; 
        echo $navList; ?>
    </nav>

    <main>
        <div>
            <h1 class="center">Add Car Classification</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/phpmotors/vehicles/index.php" method="post">
                <label for="classificationName">Give a Classification Name</label><br>
                <input <?php if (isset($classificationName)) {
                            echo "value='$classificationName'";
                        } ?> name="classificationName" id="classificationName" type="text" maxlength="30">
                <p class="center">Please keep the classification under 30 characters.</p>
                <br>

                <input type="submit" value="Add Classification" id="btn">
                <input type="hidden" name="action" value="adding-classification">
            </form>
        </div>
    </main>

    <footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </footer>

    
</body>

</html>