<?php

if (($_SESSION['clientData']['clientLevel']) < 2) {
    header('Location: /phpmotors/');
    exit;
}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                echo "Delete $invInfo[invMake] $invInfo[invModel]";
            } elseif (isset($invMake) && isset($invModel)) {
                echo "Delete $invMake $invModel";
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

    <h1>
        <?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
            echo "Delete $invInfo[invMake] $invInfo[invModel]";
        } elseif (isset($invMake) && isset($invModel)) {
            echo "Delete $invMake $invModel";
        } ?>
    </h1>

    <?php
    if (isset($message)) {
        echo '<strong><p class="message">' . $message . '</p></strong>';
    }
    ?>

    <form action="/phpmotors/vehicles/index.php" method="post">

        <p>*Note all Fields are Required</p>

        <fieldset>
            <label class="top">Car classification</label>
            <?php echo $classifList; ?><br>

            <label class="top" for="invMake">Make</label>
            <input class="top" type="text" readonly name="invMake" id="invMake" <?php if (isset($invMake)) {
                                                                            echo "value='$invMake'";
                                                                        } elseif (isset($invInfo['invMake'])) {
                                                                            echo "value='$invInfo[invMake]'";
                                                                        } ?>>

            <label class="top" for="invModel">Model</label>
            <input class="top" type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                                echo "value='$invModel'";
                                                                            } elseif (isset($invInfo['invModel'])) {
                                                                                echo "value='$invInfo[invModel]'";
                                                                            } ?>>

            <label class="top" for="invDescription">Description</label>
            <textarea class="top" name="invDescription" id="invDescription" ><?php if (isset($invDescription)) {
                                                                                            echo $invDescription;
                                                                                        } elseif (isset($invInfo['invDescription'])) {
                                                                                            echo $invInfo['invDescription'];
                                                                                        } ?></textarea>

            

            <button class="SubmitBtn" type="submit" name="submit" id="addVBtn" value="Delete Vehicle">Delete Vehicle</button>

            <input type="hidden" name="action" value="deleteVehicle">
            <input type="hidden" name="invId" value="<?php if (isset($invInfo['invId'])) {
                                                            echo $invInfo['invId'];
                                                        } elseif (isset($invId)) {
                                                            echo $invId;
                                                        } ?>">

        </fieldset>

    </form>
    <div id="line"></div>

    <Footer>
        <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/common/footer.php'; ?>
    </Footer>



</body>

</html>