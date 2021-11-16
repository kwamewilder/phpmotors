<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($vehicleDetails['invMake']) && isset($vehicleDetails['invModel'])) {
                echo "$vehicleDetails[invMake] $vehicleDetails[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "$invMake $invModel";
            } ?> | PHP Motors</title>
    <link rel="stylesheet" media="screen" href="/phpmotors/css/style.css">
</head>

<body>
    <header>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/header.php'; ?>
    </header>

    <nav>
        <?php echo $navList; ?>
    </nav>

    <?php if (isset($vehicleDetails['invMake']) && isset($vehicleDetails['invModel'])) {
        echo "$vehicleDetails[invMake] $vehicleDetails[invModel]";
    } elseif (isset($invMake) && isset($invModel)) {
        echo "$invMake $invModel";
    } ?>


    <?php
    if (isset($_SESSION['message'])) {
        echo '<strong><p class="message">' . $_SESSION['message'] . '</p></strong>';
    }
    ?>
    <main class="main_details">


        <?php if (isset($vehicleDetails)) {
            echo $vehicleDetails;
        }    ?>
        <?php if (isset($thumbnails)) {
            echo $thumbnails;
        }
        ?>
    </main>

    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>