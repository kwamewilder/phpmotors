<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/navigation.php'; ?>
    </nav>
    <main class="classifications">
        <h1>
            <?php if ($classificationName == "Trucks") {
                echo "Truck Vehicles";
            } else {
                echo "$classificationName Vehicles";
            }
            ?>
        </h1>

        <?php if (isset($message)) {
            echo $message;
        }
        ?>

        <?php if (isset($vehicleDisplay)) {
            echo $vehicleDisplay;
        } ?>

    </main>
    <div id="line"></div>

    <Footer>
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . './phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>