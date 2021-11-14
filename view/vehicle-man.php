
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
<header>
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
</header>

    <nav>
        <?php echo $navList; ?>
    </nav>

    <h1>
        Vehicle Management
    </h1>
    <ul>
        <li>
            <a href="/phpmotors/vehicles/index.php?action=add-classification">Add Classification</a>
        </li>
        <li>
            <a href="/phpmotors/vehicles/index.php?action=addVehicle">Add Vehicle</a>
        </li>
    </ul>

    <?php
    if (isset($_SESSION['message'])) {
        echo '<p class="message"><strong>' . $_SESSION['message'] . '</strong></p>';
    }
    if (isset($classificationList)) {
        echo '<h2>Vehicles By Classification</h2>';
        echo '<p>Choose a classification to see those vehicles</p>';
        echo $classificationList;
    }
    ?>
    <noscript>
        <p><strong>JavaScript Must Be Enabled to use this page.</strong></p>
    </noscript>
    <table id="inventoryDisplay"></table>
    <hr>

    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>

    <script src="../js/inventory.js"></script>

</body>

</html>
<?php unset($_SESSION['message']); ?>