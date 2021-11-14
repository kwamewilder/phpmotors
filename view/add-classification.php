<?php
if (!$_SESSION['loggedIn'] || $_SESSION['clientData']['clientLevel'] != 3) {
    header('Location: ../index.php');
    exit;
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Classification | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList ?>
    </nav>

    <h1>
        Add Classification
    </h1>

    <?php
    if (isset($message)) {
        echo '<strong><p class="message">' . $message . '</p></strong>';
    }
    ?>

    <form action="/phpmotors/vehicles/index.php" method="post">
        <fieldset>
            <label class="top" for="Name">Classification Name</label>
            <input class="top" type="text" name="classificationName" 
            <?php if (isset($classificationName))
            {                                                               
            echo "value='$classificationName'";
            } 
            ?> 
            id="Name" required>
            <button type="submit" value="addclassificationName">Add Classification</button>
            <input type="hidden" name="action" value="addclassificationName">
        </fieldset>
    </form>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>